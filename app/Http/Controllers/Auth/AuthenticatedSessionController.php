<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            // Get the authenticated user
            $user = $request->user();

            // Check if the user is trying to log in to the correct page based on their role
            if ($this->isLoginPageForRole($user, $request)) {
                // Role-based redirection
                switch ($user->role) {
                    case 'admin':
                        // Flash success message for toastr
                        $request->session()->flash('message', 'Welcome, Admin! You are successfully logged in.');
                        $request->session()->flash('alert-type', 'success');
                        return redirect()->route('admin.dashboard');  // Redirect to the admin dashboard

                    case 'vendor':
                        // Flash success message for toastr
                        $request->session()->flash('message', 'Welcome, Vendor! You are successfully logged in.');
                        $request->session()->flash('alert-type', 'success');
                        return redirect()->route('vendor.dashboard');  // Redirect to the vendor dashboard

                    case 'customer':
                        // Flash success message for toastr
                        $request->session()->flash('message', 'Welcome! You are successfully logged in.');
                        $request->session()->flash('alert-type', 'success');
                        return redirect()->route('home');  // Redirect to the customer home page

                    default:
                        // Flash error message for toastr if the role is unexpected
                        $request->session()->flash('message', 'Access Denied. Invalid role.');
                        $request->session()->flash('alert-type', 'error');
                        Auth::logout();
                        return redirect()->route('login');  // Redirect back to login
                }
            } else {
                // Role mismatch: show an error message if the user is not trying to log in with the correct role
                $request->session()->flash('message', 'You are trying to log in with the wrong credentials for this page.');
                $request->session()->flash('alert-type', 'error');
                Auth::logout();
                return redirect()->route('login');  // Redirect back to login page
            }
        }

        // Flash error message for toastr if authentication fails
        $request->session()->flash('message', 'These credentials do not match our records.');
        $request->session()->flash('alert-type', 'error');

        // Redirect back with toast message only
        return redirect()->back();  // No withInput(), just redirect
    }

    /**
     * Check if the user is logging into the correct page based on their role
     * @param  \App\Models\User  $user
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    private function isLoginPageForRole($user, $request)
    {
        // Check if the user is logging in as an admin, vendor, or customer
        // You can add a check to match the role with the specific login page.
        if ($request->routeIs('admin.login') && $user->role !== 'admin') {
            return false;
        }
        if ($request->routeIs('vendor.login') && $user->role !== 'vendor') {
            return false;
        }
        if ($request->routeIs('login') && $user->role !== 'customer') {
            return false;
        }

        return true;
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Get the authenticated user
        $user = Auth::user();

        // Logout the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Flash success message
        $request->session()->flash('message', 'You have been logged out successfully.');
        $request->session()->flash('alert-type', 'success');

        // Redirect based on the role
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.login');
            case 'vendor':
                return redirect()->route('vendor.login');
            case 'customer':
                return redirect()->route('login');
            default:
                return redirect('/');
        }
    }

}
