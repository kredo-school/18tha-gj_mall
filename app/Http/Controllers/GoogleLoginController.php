<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\Users\Customer;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
                ->with(['hd' => 'gmail.com'])
                ->redirect();
    }

    public function handleGoogleCallback()
    {
        $customer = Socialite::driver('google')->user();

        $existingCustomer = Customer::where('google_id', $customer->id)->first();

        if ($existingCustomer) {
            // Log in the existing user.
            auth()->login($existingCustomer);
        } else {
            // Create a new user.
            $newCustomer = new Customer();
            $newCustomer->first_name  = $customer->name;
            $newCustomer->last_name  = $customer->user['given_name'];
            $newCustomer->email     = $customer->email;
            $newCustomer->google_id = $customer->id;
            $newCustomer->password  = Hash::make('password');

            $newCustomer->save();
            // Log in the new user.
            auth()->login($newCustomer);
        }

         // Redirect to url as requested by user, if empty use /dashboard page as generated by Jetstream
        return redirect()->route('home');
    }
}
