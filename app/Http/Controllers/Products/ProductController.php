<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Products\OrderLine;
use App\Models\Products\Product;
use App\Models\Products\ProductDetail;
use App\Models\Products\ProductImage;
use App\Models\Products\ProductImages;
use App\Models\Products\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Database\Eloquent\Builder;


class ProductController extends Controller

{

    const LOCAL_FOLDER_PATH = 'public/images/items/';
    private $product;
    private $product_detail;
    private $product_image;
    private $product_images;
    private $category;
    private $order_line;

    public function __construct(Product $product, Category $category, ProductDetail $product_detail, ProductImage $product_image, ProductImages $product_images, OrderLine $order_line)
    {
        $this->product = $product;
        $this->product_detail = $product_detail;
        $this->product_image = $product_image;
        $this->product_images = $product_images;
        $this->category = $category;
        $this->order_line = $order_line;
    }

    public function show()
    {
        $products = $this->product->where('seller_id', Auth::guard('seller')->id())->paginate(5);

        $products->withPath('/seller/products/dashboard');

        $products_ranking = $this->getProductsTotalOrderRank();

        return view('seller.products.dashboard')
            ->with('products', $products)
            ->with('products_ranking', $products_ranking);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        if(!empty($search)){
            $products = $this->product
            ->where('seller_id', Auth::guard('seller')->id())
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%')
                      ->orWhere('description', 'LIKE', '%'.$search.'%');
            })
            ->orderBy('created_at','desc')
            ->paginate(5);

            $products->withPath('/seller/products/dashboard');
            $products->appends($request->all());
        } else {
            $products = $this->product->where('seller_id', Auth::guard('seller')->id())->orderBy('created_at', 'desc')->paginate(5);
            $products->withPath('/seller/products/dashboard');
            $products->appends($request->all());
        }


        $products_ranking = $this->getProductsTotalOrderRank();

        return view('seller.products.dashboard')
            ->with('products', $products)
            ->with('products_ranking', $products_ranking);

    }

    private function getProductsTotalOrderRank()
    {
        $products_sales = $this->order_line
        ->select('product_id', DB::raw('SUM(qty) as total_sales'))
        ->groupBy('product_id');

        $products_ranking = $this->product
            ->joinSub($products_sales, 'products_sales', function (JoinClause $join) {
                $join->on('products.id', '=', 'products_sales.product_id');
            })
            ->select('products.*', 'products_sales.total_sales')
            ->where('seller_id', Auth::guard('seller')->id())
            ->orderBy('total_sales','desc')
            ->take(5)
            ->get();

        return $products_ranking;
    }

    public function showProductDetail($id) {
        $product = $this->product->findOrFail($id);
        $product = $this->calculateRatingProperties($product);

        return view('customer.productDetail')->with('product', $product);
    }

    public function create()
    {
        $categories = $this->category->orderBy('id', 'asc')->get();

        return view('seller.products.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|regex:/^[0-9]+(\.[0-9][0-9]?)?$/', //two demical
            'stock' => 'required|integer',
            'desc' => 'required',
            'category' => 'required',
            'size' => 'required',
            'weight' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Product Table
        $this->product->name = $request->name;
        $this->product->price = $request->price;
        $this->product->qty_in_stock = $request->stock;
        $this->product->description = $request->desc;
        $this->product->status_id = 2; // ('1:Exhibit request -> 2:Waiting for valuation -> 3:Evaluation -> (7:Suspended ->) 4:Waiting for display(Coming Soon) -> 5:Exhibited -> 6:Sold out')
        $this->product->seller_id = Auth::guard('seller')->id();
        $this->product->category_id = $request->category;

        // Product Detail Table
        $this->product_detail->size = $request->size;
        $this->product_detail->weight = $request->weight;

        if ($request->fragile) {
            $this->product_detail->is_fragile = 1;
        }
        $this->product_detail->save();

        // get product_detail_id and save product table
        $this->product->product_detail_id = $this->product_detail->id;
        $this->product->save();

        // store images to product_images table and pivot product_image tables
        $imageNames = [];
        $product_image_ids = [];

        $cnt = 0;
        foreach ($request->images as $image) {
            $imageName = time() . $cnt . '.' . $image->extension();
            $imageNames[] =
                [
                    "image" => $imageName,
                    "created_at" => now(),
                    "updated_at" => now(),
                ];
            $image->storeAs(self::LOCAL_FOLDER_PATH, $imageName);
            $cnt++;
        }

        ProductImages::insert($imageNames);

        // get the image_id from the product_images table and define the number of data from the image name array
        $max_image_id = ProductImages::orderBy('id', 'desc')->first()->id;

        $length = count($imageNames);

        for ($i =  $max_image_id - $length + 1; $i <= $max_image_id; $i++) {
            $product_image_ids[] =
                [
                    "product_id" => $this->product->id,
                    "image_id" => $i,
                ];
        }

        ProductImage::insert($product_image_ids);

        return redirect()->route('seller.products.dashboard');
    }

    public function edit($id)
    {
        $product = $this->product->findOrFail($id);
        $categories = $this->category->orderBy('id', 'asc')->get();

        return view('seller.products.edit')
            ->with('product', $product)
            ->with('categories', $categories);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|regex:/^[0-9]+(\.[0-9][0-9]?)?$/', //two demical
            'stock' => 'required|integer',
            'desc' => 'required',
            'category' => 'required',
            'size' => 'required',
            'weight' => 'required',
            // 'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = $this->product->findOrfail($id);

        // Product Table
        $product->name = $request->name;
        $product->price = $request->price;
        $product->qty_in_stock = $request->stock;
        $product->description = $request->desc;
        $product->status_id = 2; // ('1:Exhibit request -> 2:Waiting for valuation -> 3:Evaluation -> (7:Suspended ->) 4:Waiting for display(Coming Soon) -> 5:Exhibited -> 6:Sold out')
        $product->seller_id = Auth::guard('seller')->id();
        $product->category_id = $request->category;

        // Product Detail Table
        $product->productDetail->size = $request->size;
        $product->productDetail->weight = $request->weight;

        if ($request->fragile) {
            $product->productDetail->is_fragile = 1;
        }
        $product->productDetail->save();

        // get product_detail_id and save product table
        $product->product_detail_id = $product->productDetail->id;
        $product->save();

        // store images to product_images table and pivot product_image tables


        if ($request->images) {
            $imageNames = [];
            $product_image_ids = [];
            $cnt = 0;
            foreach ($request->images as $image) {
                $imageName = time() . $cnt . '.' . $image->extension();
                $imageNames[] =
                    [
                        "image" => $imageName,
                        "created_at" => now(),
                        "updated_at" => now(),
                    ];
                $image->storeAs(self::LOCAL_FOLDER_PATH, $imageName);
                $cnt++;
            }

            ProductImages::insert($imageNames);

            // get the image_id from the product_images table and define the number of data from the image name array
            $max_image_id = ProductImages::orderBy('id', 'desc')->first()->id;

            $length = count($imageNames);

            for ($i =  $max_image_id - $length + 1; $i <= $max_image_id; $i++) {
                $product_image_ids[] =
                    [
                        "product_id" => $id,
                        "image_id" => $i,
                    ];
            }

            ProductImage::insert($product_image_ids);
        }



        return redirect()->route('seller.products.dashboard');
    }


    public function delete($id)
    {
        $product = $this->product->findOrfail($id);

        return view('seller.products.dashboard')
            ->with('product', $product);
    }

    public function destroy($id)
    {
        $product = $this->product->findOrfail($id);

        foreach ($product->productImage as $image) {
            $filePath = self::LOCAL_FOLDER_PATH . $image->productImages->image;
            if (Storage::disk('local')->exists($filePath)) {
                Storage::disk('local')->delete($filePath);
            }
        }

        $product->delete();

        return redirect()->route('seller.products.dashboard');
    }


    public function imageDestroy($i_id, $p_id)
    {
        // new $image();

        $image = $this->product_images->findOrfail($i_id);

        $filePath = self::LOCAL_FOLDER_PATH . $image->image;

        // delete the file itself

        if (Storage::disk('local')->exists($filePath)) {

            if (Storage::disk('local')->delete($filePath)) {
                Log::info("File $filePath deleted successfully.");
            } else {
                Log::error("Failed to delete file $filePath.");
            }
            // Delete the file from storage

        } else {
            Log::warning("File $filePath does not exist.");
        }
        // delete the record in product_image
        $this->product_image
            ->where('product_id', $p_id)
            ->where('image_id', $i_id)
            ->delete();
        // delete the record in product_images
        $image->delete();

        // or set the ondeletecascade to the migration file

        return redirect()->back();
    }

    private function calculateRatingProperties($product)
    {
        $totalReviews = $product->reviews->count();
        $averageRating = $totalReviews > 0 ? number_format($product->reviews->avg('rating'), 1) : 0;

        $product->averageRating = $averageRating;
        $product->totalReviews = $totalReviews;

        return $product;
    }

}
