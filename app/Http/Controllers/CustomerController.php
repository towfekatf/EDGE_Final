<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DeliveryAddress;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Setting;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CustomerController extends Controller
{
    private function settings(): Collection
    {
        return new Collection(Setting::pluck('value', 'setting_name'));
    }



    public function login(): View|RedirectResponse
    {
        $settings =  $this->settings();

        if (Auth::guard('customer')->check()) {
            return redirect()->route('website.customer.profile');
        }

        return view('website.customer.login',compact('settings'));
    }
    public function loginCheck(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                "email" => ["required", "email"],
                "password" => ["required"],
            ]);

            $credentials = [
                "email" => $request->input("email"),
                "password" => $request->input("password"),
            ];

            if (Auth::guard("customer")->attempt($credentials)) {
                $request->session()->regenerate();
                sleep(1);

                if ($request->input('redirect')) {
                    return redirect($request->input('redirect'));
                } else {
                    return redirect()->route("website.customer.profile")->withInput();
                }
            } else {
                return back()->with("error", "Email or Password is not valid.")->onlyInput();
            }
        } catch (ValidationException $exception) {
            return back()->withErrors($exception->errors())->withInput();
        } catch (Exception $exception) {
            return back()->with("error", "An unexpected error occurred.")->withInput();
        }
    }

    public function dashboard()
    {
        $settings =  $this->settings();
        return view('website.customer.dashboard', compact('settings'));
    }

    public function order()
    {
        $settings = $this->settings();
        $deliveryAddresses = DeliveryAddress::with('order')
            ->whereHas('order', function($query) {
                $query->where('customer_id', '=', Auth::guard('customer')->id());
            })->get();

        return view('website.customer.order', compact('settings', 'deliveryAddresses'));
    }





    public function orderShow(Order $order)
    {
        $settings = $this->settings();
        // Eager load related data
        $order->load('orderItems', 'deliveryAddress', 'payment');

        // Calculate total amount
        $totalAmount = $order->orderItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        // Pass the order, total amount, and related data to the view
        return view('website.orderShow', compact('settings','order', 'totalAmount'));
    }



    public function profile(): View
    {
        $settings =  $this->settings();
        $customerId = Auth::guard('customer')->id();
        $customer = Customer::query()->find($customerId);
        return view('website.customer.profile', compact('customer','settings'));
    }


    public function profileUpdate(Request $request): RedirectResponse
    {
        $customerId = Auth::guard('customer')->id();

        $validatedData = $request->validate([
            "name" => "required",
            "email" => [
                "required",
                "email",
                Rule::unique('customers')->ignore($customerId)
            ],
            "address" => "nullable|string",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/uploads/customers', $imageName);
            $validatedData['image'] = $imageName;
        }

        Customer::query()
            ->where('id', '=', $customerId)
            ->update($validatedData);

        return redirect()->route('website.customer.profile')->with('success', 'Customer updated successfully.');
    }

    public function passwordChange()
    {
        $settings =  $this->settings();
        return view('website.customer.password_change', compact('settings'));
    }

    public function passwordUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'password' => [
                'nullable',
                'string',
                Password::min(6),
            ],
        ]);

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $customerId = Auth::guard('customer')->id();

        Customer::query()
            ->where('id', '=', $customerId)
            ->update($validatedData);

        return redirect()->route('website.customer.profile')->with('success', 'Password updated successfully.');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('website.customer.login');
    }

    public function forgotPassword(): View
    {
        $settings =  $this->settings();
        return view('website.customer.forgot_password',compact('settings'));
    }

    public function sendResetLinkEmail(Request $request): RedirectResponse
    {
        $request->validate([
            "email" => "required|email|exists:customers,email_address"
        ]);

        try {
            $token = Str::random(64);

            DB::table("password_reset_tokens")
                ->where("email", $request->input("email"))
                ->delete();

            DB::table("password_reset_tokens")->insert([
                "email" => $request->input("email"),
                "token" => $token,
                "created_at" => Carbon::now()
            ]);

            Mail::send("website.customer.email_templates.forgot_password",
                ["token" => $token],
                function ($message) use ($request) {
                    $message->to($request->input("email"));
                    $message->subject("Reset Password");
                });

            return back()->with("success", "We have e-mailed your password reset link!");
        } catch (Exception $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", $exception->getMessage());
        }
    }

    public function newPassword(string $token): View|RedirectResponse
    {
        $exist = DB::table("password_reset_tokens")
            ->where("token", $token)
            ->first();

        if (!$exist) {
            return redirect()->route("website.customer.login");
        }

        return view("website.customer.new_password", compact("token"));
    }

    /**
     * @param Request $request
     * @param string $token
     * @return RedirectResponse
     */
    public function newPasswordSave(Request $request, string $token): RedirectResponse
    {
        $request->validate([
            "password" => [
                "required",
                "string",
                Password::min(6),
                "confirmed",
            ],
        ]);

        $exist = DB::table("password_reset_tokens")
            ->where("token", $token)
            ->first();

        if (!$exist) {
            return redirect()->route('website.customer.login')->with("error", "Invalid token.");
        }

        try {
            $validatedData = [
                "password" => Hash::make($request->input("password"))
            ];

            Customer::query()
                ->where("email_address", $exist->email)
                ->update($validatedData);

            DB::table("password_reset_tokens")
                ->where("token", $token)
                ->delete();

            return redirect()
                ->route('website.customer.login')
                ->with("success", "Your password change is successful. Log in now.");

        } catch (Exception $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", $exception->getMessage());
        }
    }

}
