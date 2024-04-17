<?php

namespace App\Http\Controllers\Products;

use Exception;
use Illuminate\Http\Request;
use App\Models\Products\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Products\ProductStatus;

class EvaluationController extends Controller
{
    private $product;

    public function __construct(Product $product, ProductStatus $product_status)
    {
        $this->product = $product;
        $this->product_status = $product_status;
    }

    public function index()
    {
        $products = Product::select('id', 'name', 'price', 'description', 'status_id', 'seller_id', 'category_id', 'product_detail_id')->latest()->paginate(5);
        $product_statuses = ProductStatus::select('id','status')->latest()->paginate(5);

        return view('admin.assessor.evaluation')->with('products', $products);
    }

    public function edit($id)
    {
        $product = $this->product->findOrFail(Product::product()->id);
        $produc_status = $this->product_status->findOrFail(ProductStatus::product_status()->id);

        return view('admin.assessor.modal.status')->with('products', $products)->with('product_statuses', $product_statuses);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        
        $validateData = $request->validate([
            'status_id' => 'required|integer',
            'status'    => 'integer'
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

}
