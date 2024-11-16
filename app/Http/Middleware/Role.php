<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the user has the required role
            if ($user->role === $role) {
                return $next($request);
            } else {
                // Flash error message for toastr
                $request->session()->flash('message', 'Access Denied. You do not have the required permissions.');
                $request->session()->flash('alert-type', 'error'); // Set alert type for toastr

                // Redirect based on the user's role (You can change these routes based on your application)
                if ($user->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                } elseif ($user->role === 'vendor') {
                    return redirect()->route('vendor.dashboard');
                } else {
                    return redirect()->route('home'); // Default redirect for other roles
                }
            }
        } else {
            // Flash error message if the user is not authenticated
            $request->session()->flash('message', 'Please log in to access this page.');
            $request->session()->flash('alert-type', 'error');

            // Redirect to a role-specific login page based on the requested role
            if ($role === 'admin') {
                return redirect()->route('admin.login'); // Redirect to admin login
            } elseif ($role === 'vendor') {
                return redirect()->route('vendor.login'); // Redirect to vendor login
            } else {
                return redirect()->route('login'); // Redirect to general login for other roles
            }
        }
    }
}
