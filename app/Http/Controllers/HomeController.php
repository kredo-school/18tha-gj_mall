<?php

namespace App\Http\Controllers;

use App\Models\Products\Ad;
use App\Models\Products\Category;
use App\Models\Products\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

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
    
    public function search(Request $request)
    {
        $categories = Category::all();
    
        // Retrieve input parameters
        $searchTerm = $request->input('search_term', '');
        $selectedCategory = $request->input('category', '');
        $sort = $request->input('sort', '');

        $query = $this->buildProductQuery($selectedCategory, $searchTerm, $sort);
        $results = $query->get(); 
    
        // Transform the raw results into the desired format
        $transformedResults = $this->transformResults($results);
    
        // Paginate the transformed results manually
        $perPage = 12; // Number of items per page
        $page = Paginator::resolveCurrentPage('page');
        $pageData = collect($transformedResults)->slice(($page - 1) * $perPage, $perPage);
        $totalItems = count($transformedResults);
    
        $paginator = new LengthAwarePaginator(
            $pageData,
            $totalItems,
            $perPage,
            $page,
            [
                'path' => Paginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]
        );
    
        return view('customer.search', [
            'categories' => $categories,
            'results' => $paginator,
            'search' => $searchTerm,
            'selectedCategory' => $selectedCategory,
            'sort' => $sort,
        ]);
    }    

    private function buildProductQuery($selectedCategory, $searchTerm, $sort)
    {
        $query = Product::query();

        // Search filters
        if (!empty($searchTerm)) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('seller', function ($q) use ($searchTerm) {
                      $q->where('first_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('last_name', 'like', '%' . $searchTerm . '%');
                  });
            });
        }

        // Filter by category - option
        if (!empty($selectedCategory)) {
            if ($selectedCategory !== 'All') {
                $query->whereHas('category', function ($q) use ($selectedCategory) {
                    $q->where('name', $selectedCategory);
                });
            }
        }

        // Sort - option
        switch ($sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                break;
        }

        return $query;
    }

    private function transformResults($results)
    {
        return $results->map(function ($product) {
            return $this->calculateRatingProperties($product);
        });
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