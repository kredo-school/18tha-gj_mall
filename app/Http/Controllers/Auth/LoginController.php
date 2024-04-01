<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // protected $redirectTo = '/home';
    protected function redirectTo()
    {
        if (Auth::guard('seller')->check()) {
            return '/seller/dashboard';
        } elseif (Auth::guard('admin')->check()) {
            return '/admin/dashboard';
        } else {
            return '/home';
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Override the attemptLogin method to handle multiple guards
    protected function attemptLogin(Request $request)
    {
        // Attempt login for customer
        if (Auth::guard('customer')->attempt($this->credentials($request), $request->filled('remember'))) {
            return true;
        }
        
        // Attempt login for seller
        if (Auth::guard('seller')->attempt($this->credentials($request), $request->filled('remember'))) {
            return true;
        }

        // Attempt login for admin
        if (Auth::guard('admin')->attempt($this->credentials($request), $request->filled('remember'))) {
            return true;
        }
        
        return false;
    }
}

