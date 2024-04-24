<?php

namespace App\Http\Controllers\Products;

use Exception;
use Illuminate\Http\Request;
use App\Models\Products\Product;
use App\Models\Products\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Products\ProductDetail;
use App\Models\Products\ProductStatus;

class EvaluationController extends Controller
{
    private $product;

    public function __construct(Product $product, Category $category, ProductDetail $product_detail, ProductStatus $product_status)
    {
        $this->product = $product;
        $this->product_detail = $product_detail;
        $this->category = $category;
        $this->product_status = $product_status;
    }

    public function index()
    {
        $products = Product::select('id', 'name', 'price', 'description', 'status_id', 'seller_id', 'category_id', 'product_detail_id')->latest()->paginate(5);
        return view('admin.assessor.evaluation')->with('products', $products);
    }

    public function edit($id)
    {
        $product = $this->product->findOrFail(Product::product()->id);

        return view('admin.assessor.modal.status')->with('products', $products);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        $validateData = $request->validate([
            'status_id' => 'required|integer'
        ]);

        try {
            // Find the products record by its ID
            $product = Product::findOrFail($id);
            $product->status_id = $validateData['status_id'];
            
            // Save the changes
            $product->save();

            // Commit the transaction
            DB::commit();

            // Redirect back with a success message
            Log::info('Product updated successfully.');

            return redirect()->back()->with('success', 'Product updated successfully.');
        } catch (Exception $e) {
            // Rollback the transaction
            DB::rollback();
            
            // Log the error
            Log::error('Error updating producty: ' . $e->getMessage());

            // Redirect back with an error message
            return back()->withInput()->withErrors(['error' => 'Error updating product. Please try again.']);
        }
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
            $products->withPath('/admin/evaluation');
            $products->appends($request->all());
    
        } elseif (!empty($status)) {
            $product_status = $this->product_status->findOrFail($status);
            $products = $product_status->getSeller(Auth::guard('seller')->id())->paginate(5);
            $products->withPath('/admin/evaluation');
            $products->appends($request->all());
        } elseif (!empty($category)) {
            $category = $this->category->findOrFail($category);
            $products = $category->getSeller(Auth::guard("seller")->id())->paginate(5);
            $products->withPath('/admin/evaluation');
            $products->appends($request->all());
        } else {
            $products = $this->product->where('seller_id', Auth::guard('seller')->id())->orderBy('created_at', 'desc')->paginate(5);
            $products->withPath('/admin/evaluation');
            $products->appends($request->all());
        }

        $categories = $this->category->orderBy('id', 'asc')->get();
        $product_statuses = $this->product_status->orderBy('id', 'asc')->get();

        return view('admin.assessor.evaluation', compact("products", "categories", "product_statuses"));
    }

}
