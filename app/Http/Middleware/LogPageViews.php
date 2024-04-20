<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\PageView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogPageViews
{
    public function handle(Request $request, Closure $next)
    {
        $customer = Auth::guard("customer"); // Get the authenticated user

        // Log the page view
        PageView::create([

            'customer_id' => $customer ? $customer->id() : null,
            'url' => $request->url(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
