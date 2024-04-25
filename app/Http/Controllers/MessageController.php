<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Products\Product;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index($product_id, $user_id) {
        $product = Product::findOrFail($product_id); 
        
        return view('customer.liveChat.index')
                ->with('product', $product)
                ->with('user_id', $user_id);
    }

    public function delete($customer_id, $seller_id, $product_id) {
        Message::where(function($query) use ($customer_id, $product_id) {
            $query->where('user_id', $customer_id)
                  ->where('product_id', $product_id);
        })
        ->orWhere(function($query) use ($seller_id, $product_id) {
            $query->where('seller_id', $seller_id)
                  ->where('product_id', $product_id);
        })
        ->delete();

        return redirect()->back();
    }
}
