<?php

namespace App\Http\Middleware;

use App\Models\Users\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        if (Auth::guard('admin')->check()) {
            // Get the authenticated user's email
            $email = Auth::guard('admin')->user()->email;

            // Check if the email exists in the Admin table
            $admin = Admin::where('email', $email)->first();

            if ($admin) {
                // User's email exists in the Admin table
                return $next($request);
            }
        }

        return redirect()->route('home')->with('error', 'Please Login as Admin user!');
    }
}
