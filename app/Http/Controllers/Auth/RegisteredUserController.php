<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming vendor registration request.
     */
    public function vendorRegister(Request $request)
    {
        $vendorUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'vendor',
        ]);

        Vendor::create([
            'user_id' => $vendorUser->id,
            // 'store_name' => $request->store_name, 
            // 'store_logo' => $request->store_logo,
            'status' => 'pending',
        ]);

        session()->flash('message', 'Your registration is pending approval by an admin.');
        session()->flash('alert-type', 'info');

        return redirect()->route('vendor.login');
    }

    /**
     * Handle an incoming customer registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function customerRegister(Request $request)
    {
        $customer = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'customer',
        ]);

        Auth::login($customer);

        session()->flash('message', 'Welcome! Your account is successfully created.');
        session()->flash('alert-type', 'success');

        return redirect()->route('customer.product.list');
    }
}
