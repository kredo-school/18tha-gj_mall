<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Products\Ad;
use App\Models\Products\Product;
use App\Models\Products\ProductImages;
use App\Models\Products\ProductImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AdController extends Controller
{

    const LOCAL_FOLDER_PATH = 'public/images/ads/';
    private $ad, $product, $product_image, $product_images;

    public function __construct(Product $product, Ad $ad, ProductImages $product_images, ProductImage $product_image)
    {
        $this->product = $product;
        $this->ad = $ad;
        $this->product_images = $product_images;
        $this->product_image = $product_image;
    }

    public function show(Request $request)
    {

        $search = $request->input('search');

        if (!empty($search)) {
            $ads =  Ad::select('ads.id', 'ads.title', 'ads.content', 'ads.image_name', 'ads.product_id')
            ->join('products as p', 'ads.product_id', '=', 'p.id')
            ->where('p.seller_id', Auth::guard("seller")->id())
            ->where(function ($query) use ($search) {
                $query->where('ads.title', 'LIKE', '%'.$search.'%')
                      ->orWhere('ads.content', 'LIKE', '%'.$search.'%');
            })
            ->paginate(5);
            $ads->withPath('/seller/ads/dashboard');
            $ads->appends($request->all());
        } else {
            $ads =  Ad::select('ads.id', 'ads.title', 'ads.content', 'ads.image_name', 'ads.product_id')
                ->join('products as p', 'ads.product_id', '=', 'p.id')
                ->where('p.seller_id', Auth::guard("seller")->id())
                ->paginate(5);
                $ads->withPath('/seller/ads/dashboard');
                $ads->appends($request->all());
        }
        return view('seller.ads.dashboard')->with('ads', $ads);
    }

    public function create()
    {
        $products = $this->product->where("seller_id", Auth::guard("seller")->id())->orderBy("id", "asc")->get();

        return view('seller.ads.create')->with('products', $products);
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required', //two demical
            'product_id' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $this->ad->title = $request->title;
        $this->ad->content = $request->content;
        $this->ad->product_id = $request->product_id;

        $image_name = time() . '.' . $request->image->extension();
        $this->ad->image_name = $image_name;
        $this->ad->save();
        $request->image->storeAs(self::LOCAL_FOLDER_PATH, $image_name);

        return redirect()->route('seller.ads.dashboard');
    }

    public function edit($id)
    {
        $ad = $this->ad->findOrFail($id);
        $products = $this->product->where("seller_id", Auth::guard("seller")->id())->orderBy("id", "asc")->get();

        return view('seller.ads.edit')->with('ad', $ad)->with('products', $products);
    }

    public function update(Request $request, $id)
    {
        $ad = $this->ad->findOrFail($id);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'product_id' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // not required
        ]);

        $ad->title = $request->title;
        $ad->content = $request->content;
        $ad->product_id = $request->product_id;

        if ($request->image) {

            // delete the file
            $image_name = self::LOCAL_FOLDER_PATH . $ad->image_name;

            if (Storage::disk('local')->exists($image_name)) {
                Storage::disk('local')->delete($image_name);
            }
            // if image request exists , delete / save the image and db records
            $imageName = time() . '.' . $request->image->extension();
            $ad->image_name = $imageName;
            $ad->save();
            $request->image->storeAs(self::LOCAL_FOLDER_PATH, $imageName);
        } else {
            // if use the existing image
            $ad->save();
        }

        return redirect()->route('seller.ads.dashboard');
    }

    public function delete($id)
    {
        $ad = $this->ad->findOrFail($id);

        return view("seller.modalSeller.deleteAd")->with("ad", $ad);
    }

    public function destroy($id)
    {
        $ad = $this->ad->findOrFail($id);
        // delete the file
        $image_name = self::LOCAL_FOLDER_PATH . $ad->image_name;

        if (Storage::disk('local')->exists($image_name)) {
            Storage::disk('local')->delete($image_name);
        }
        $ad->delete();

        return redirect()->route("seller.ads.dashboard");
    }
}
