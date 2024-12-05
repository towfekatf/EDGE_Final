<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(Request $request):view
    {
        $customers = Customer::all();
        return view('admin.customers.index',compact('customers'));
    }

    public function create():view
    {
        return view('admin.customers.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate request data
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

        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Process image upload if exists
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/uploads/customers', $imageName);
            $validatedData['image'] = $imageName;
        }

        // Create customer
        Customer::query()->create($validatedData);

        // Redirect with success message
        return redirect()->route('admin.customers.index')->with('success', 'Customer created successfully.');
    }

    public function show(Customer $customer)
    {
        return view('admin.customers.show', compact('customer'));
    }
    public function edit(Customer $customer):view

    {
        return view('admin.customers.edit', compact('customer'));
    }
    public function update(Request $request, Customer $customer): RedirectResponse
    {
        $validatedData = $request->validate([
            "name" => "required",
            "email" => "required|email|unique:customers,email," . $customer->id,
            "password" => [
                "nullable",
                "string",
                Password::min(6),
                "confirmed",
            ],
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/uploads/customers', $imageName);
            $validatedData['image'] = $imageName;
        }


        if (empty($validatedData['password'])) {
            unset($validatedData['password']);
        }

        $customer->update($validatedData);

        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully.');
    }


    public function destroy(Customer $customer): RedirectResponse
    {
        try {
            $imagePath = $customer->image;

            if ($imagePath && Storage::exists("public/uploads/customers/" . $imagePath)) {
                Storage::delete("public/uploads/customers/" . $imagePath);
            }



            $customer->delete();
        } catch (Exception $exception) {
            return redirect()->back()->with("error", $exception->getMessage());
        }

        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully.');
    }




}
