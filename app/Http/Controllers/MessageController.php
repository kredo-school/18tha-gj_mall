<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Products\Product;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index($product_id) {
        $product = Product::findOrFail($product_id); 

        return view('customer.liveChat.index')->with('product', $product);
    }
}
