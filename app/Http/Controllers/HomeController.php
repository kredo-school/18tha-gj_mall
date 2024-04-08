<?php

namespace App\Http\Controllers;

use App\Models\Products\Ad;
use App\Models\Products\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with('reviews')
                        ->get()
                        ->map(function ($product) {
                            return $this->calculateRatingProperties($product);
                        })
                        ->sortByDesc('weightedRating');
    
        $favorites = $this->getFavoriteItems($products);
        // Convert $favorites array to a Collection
        $favoritesCollection = new Collection($favorites);
        
        $lastMonthDate = Carbon::now()->subMonth();

        $ads = Ad::where('created_at', '>=', $lastMonthDate)
                ->inRandomOrder()
                ->limit(5)
                ->get();
    
        return view('home')
            ->with('products', $products)
            ->with('favorites', $favoritesCollection)
            ->with('ads', $ads);
    }
    
    private function getFavoriteItems($products)
    {
        $favoriteItems = [];
    
        foreach ($products as $product) {
            if ($product->isFavorite()) {
                $favoriteItems[] = $this->calculateRatingProperties($product);
            }
        }
    
        return $favoriteItems;
    }
    
    private function calculateRatingProperties($product)
    {
        $totalReviews = $product->reviews->count();
        $averageRating = $product->reviews->avg('rating');
    
        // Calculate weighted average
        $weightedRating = ($totalReviews > 0) ? ($averageRating * $totalReviews) : 0;
    
        // Add properties to product object
        $product->averageRating = $averageRating;
        $product->totalReviews = $totalReviews;
        $product->weightedRating = $weightedRating;
    
        return $product;
    }
}
