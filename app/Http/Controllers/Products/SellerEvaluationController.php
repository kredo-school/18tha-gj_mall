<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products\Product;
use App\Models\Products\ProductDetail;
use App\Models\Products\Category;
use App\Models\Products\ProductStatus;
use Illuminate\Support\Facades\Auth;

class SellerEvaluationController extends Controller
{

    private $product, $product_detail, $category, $product_status;

    public function __construct(Product $product, Category $category, ProductDetail $product_detail, ProductStatus $product_status)
    {
        $this->product = $product;
        $this->product_detail = $product_detail;
        $this->category = $category;
        $this->product_status = $product_status;
    }

    public function show()
    {
        $products = $this->product->where('seller_id', Auth::guard('seller')->id())
            ->orderBy('created_at', 'desc')
            ->paginate(5);


        $categories = $this->category->orderBy('id', 'asc')->get();
        $product_statuses = $this->product_status->orderBy('id', 'asc')->get();

        return view('seller.evaluation.show', compact("products", "categories", "product_statuses"));
    }

    public function search(Request $request)
    {

        $search = $request->input('search');
        $status = $request->input('status');
        $category = $request->input('category');

        if (!empty($search)) {
            $products = $this->product
                ->where('seller_id', Auth::guard('seller')->id())
                ->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('description', 'LIKE', '%' . $search . '%');
                })
                ->orderBy('created_at', 'desc')
                ->paginate(5);
            $products->withPath('/seller/evaluation');
            $products->appends($request->all());
        } elseif (!empty($status)) {
            $product_status = $this->product_status->findOrFail($status);
            $products = $product_status->getSeller(Auth::guard('seller')->id())->paginate(5);
            $products->withPath('/seller/evaluation');
            $products->appends($request->all());
        } elseif (!empty($category)) {
            $category = $this->category->findOrFail($category);
            $products = $category->getSeller(Auth::guard("seller")->id())->paginate(5);
            $products->withPath('/seller/evaluation');
            $products->appends($request->all());
        } else {
            $products = $this->product->where('seller_id', Auth::guard('seller')->id())->orderBy('created_at', 'desc')->paginate(5);
            $products->withPath('/seller/evaluation');
            $products->appends($request->all());
        }

        $categories = $this->category->orderBy('id', 'asc')->get();
        $product_statuses = $this->product_status->orderBy('id', 'asc')->get();

        return view('seller.evaluation.show', compact("products", "categories", "product_statuses"));
    }
}
