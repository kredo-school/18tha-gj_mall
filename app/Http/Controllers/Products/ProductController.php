<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use App\Models\Products\ProductDetail;
use App\Models\Products\ProductImage;
use App\Models\Products\ProductImages;
use App\Models\Products\Category;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    private $product;
    private $product_detail;
    private $product_image;
    private $product_images;
    private $category;

    public function __construct(Product $product, Category $category, ProductDetail $product_detail, ProductImage $product_image, ProductImages $product_images)
    {
        $this->product = $product;
        $this->product_detail = $product_detail;
        $this->product_image = $product_image;
        $this->product_images = $product_images;
        $this->category = $category;
    }

    public function show()
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
        $this->product->seller_id = Auth::seller()->id;
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

        foreach ($request->images as $image) {
            $imageName = time() . '.' . $image->extension();
            $imageNames[] =
                [
                    "image" => $imageName,
                    "created_at" => now(),
                    "updated_at" => now(),
                ];
            $image->move(public_path('images/items/'), $imageName);
        }

        ProductImages::insert($imageNames);

        // get the image_id from the product_images table and define the number of data from the image name array
        $max_image_id = ProductImages::orderBy('id','desc')->first()->id;

        $length = count($imageNames);

        for ($i =  $max_image_id - $length + 1; $i <= $max_image_id; $i++) {
            $product_image_ids[] =
                [
                    "product_id" => $this->product->id,
                    "image_id" => $i,
                ];
        }

        ProductImage::insert($product_image_ids);

        return view('seller.products.dashboard');
    }
}
