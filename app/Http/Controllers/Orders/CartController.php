<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Orders\ShoppingCartItem;
use App\Models\Orders\ShippingMethod;
use App\Models\Products\Product;
use App\Models\Users\Seller;
use App\Models\Users\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class CartController extends Controller
{
    private $cart_item;
    private $shipping_method;
    private $product;
    private $seller;
    private $customer;

    public function __construct(ShoppingCartItem $cart_item, ShippingMethod $shipping_method, Product $product, Seller $seller, Customer $customer)
    {
        $this->cart_item = $cart_item;
        $this->shipping_method = $shipping_method;
        $this->product = $product;
        $this->seller = $seller;
        $this->customer = $customer;
    }

    public function showCart()
    {
        $all_item = $this->cart_item->all();
        $shipping = $this->shipping_method->findOrFail(1);
        $cart_items = [];
        $cart_products = [];
        $sellers = [];

        foreach ($all_item as $item)
        {
            if ( $item->customer_id === Auth::id() )
            {
                $cart_products[] = $this->product->findOrFail($item->product_id);
                $cart_items[] = $item;
            }
        }

        // Retrieved the seller detail of cart items. 
        foreach ( $cart_products as $p)
        {
            $sellers[] = $this->seller->findOrFail($p->seller_id);
        }

        return view('customer.cart')
            ->with('cart_items', $cart_items)
            ->with('cart_products', $cart_products)
            ->with('sellers', $sellers)
            ->with('shipping', $shipping);
    }

    public function destroy($id)
    {
        $this->cart_item->destroy($id);

        return redirect()->back();
    }

    public function checkOut(Request $request)
    {
        // Save the cart conditions.
        $this->update($request);

        $user = $this->customer->findOrFail(Auth::id());
        $shipping = $this->shipping_method->findOrFail(1);

        $all_item = $this->cart_item->all();
        $total_qty = 0;
        $subTotal = 0;

        foreach ($all_item as $item)
        {
            if ( $item->customer_id === $user->id )
            {
                $total_qty += $item->qty;

                $cart_products[] = $this->product->findOrFail($item->product_id);
                foreach ($cart_products as $p)
                {
                    $subTotal += $p->price * $item->qty;
                }
            }
        }

        return view('customer.payment.transaction')
            ->with('user', $user)
            ->with('shipping', $shipping)
            ->with('total_qty', $total_qty)
            ->with('subTotal', $subTotal);
    }

    public function update($request)
    {
        $request->validate([
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1'
        ]);

        foreach ($request['quantity'] as $itemId => $quantity) 
        {
            $cart_item = $this->cart_item->findOrFail($itemId);

            if ($cart_item) 
            {
                $cart_item->update(['quantity' => $quantity]);
            }
        }
    }
}
