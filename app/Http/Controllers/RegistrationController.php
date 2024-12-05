<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    private function settings(): Collection
    {
        return new Collection(Setting::pluck('value', 'setting_name'));
    }

    public function index(): View
    {
        $settings =  $this->settings();
        return view('website.registration', compact('settings'));
    }


    public function create(Request $request): RedirectResponse
    {
        try {
            $validatedData = $request->validate([
                "name" => "required",
                "email" => "required|email|unique:customers",
                "password" => [
                    "required",
                    "string",
                    Password::min(6),
                    "confirmed",
                ],
            ]);

            $validatedData['password'] = Hash::make($validatedData['password']);
            Customer::query()->create($validatedData);
            return redirect()
                ->route('website.customer.login')
                ->with("success", "Registration successfully.");
        } catch (QueryException $exception) {
            Log::error($exception->getMessage());

            return redirect()
                ->back()
                ->withInput()
                ->with("error", "QueryException code: " . $exception->getCode() . ". Please contact the administrator.");
        }
    }
}
