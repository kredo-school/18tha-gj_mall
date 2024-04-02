<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerLoginController extends Controller
{
    public function showLoginPage()
    {
        return view('auth.sellerlogin');
    }

    public function signIn(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('seller')->attempt($credentials)) {
            return redirect()->route('seller.dashboard');
        }

        return back()->withErrors([
            'login' => ['Failed Login. Email or Password are incorect.'],
        ]);
    }
}
