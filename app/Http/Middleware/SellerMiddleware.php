<?php

namespace App\Http\Middleware;

use App\Models\Users\Seller;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SellerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('seller')->user()) {
            // Get the authenticated user's email
            $email = Auth::guard('seller')->user()->email;

            // Check if the email exists in the Admin table
            $seller = Seller::where('email', $email)->first();

            if ($seller) {
                // User's email exists in the Admin table
                return $next($request);
            }
        }

        return redirect()->route('home')->with('error', 'Please Login as Seller user!');
    }
}
