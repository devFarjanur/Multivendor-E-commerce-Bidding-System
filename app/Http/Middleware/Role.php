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
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role === $role) {
                return $next($request);
            } else {
                $request->session()->flash('message', 'Access Denied. You do not have the required permissions.');
                $request->session()->flash('alert-type', 'error');
                if ($user->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                } elseif ($user->role === 'vendor') {
                    return redirect()->route('vendor.dashboard');
                } else {
                    return redirect()->route('customer.product.list');
                }
            }
        } else {
            $request->session()->flash('message', 'Please log in to access this page.');
            $request->session()->flash('alert-type', 'error');
            if ($role === 'admin') {
                return redirect()->route('admin.login');
            } elseif ($role === 'vendor') {
                return redirect()->route('vendor.login');
            } else {
                return redirect()->route('login');
            }
        }
    }
}
