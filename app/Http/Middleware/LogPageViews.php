<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\PageView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class LogPageViews
{
    public function handle(Request $request, Closure $next)
    {

        // Get the last visited URL from the session
        $lastVisitedUrl = Session::get('last_visited_url');

        // Proceed with the request
        $response = $next($request);

        // Get the current URL
        $currentUrl = $request->url();

        if ($lastVisitedUrl !== $currentUrl) {

            $customer = Auth::guard("customer"); // Get the authenticated user

            // Log the page view
            PageView::create([

                'customer_id' => $customer ? $customer->id() : null,
                'url' => $currentUrl ,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Update the last visited URL in the session
        Session::put('last_visited_url', $currentUrl);

        return $response;
    }
}
