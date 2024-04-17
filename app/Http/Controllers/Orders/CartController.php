<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Orders\PaymentController;
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
        // Get an array from JavaScript from an Ajax request.
        dd($request);
        $itemsData = json_decode($request->input('itemsData'), true);
        // dd($itemsData);
        $checkedItemId = [];
        $total_qty = 0;
        $subTotal = 0;


        // Process the retrieved request array.
        foreach ($itemsData as $item) 
        {
            $id = $item['id'];
            $checkboxValue = $item['checkboxValue'];
            $qty = $item['qty'];
            $price = $item['price'];

            if ($checkboxValue === 'on')
            {
                $checkedItemId[] = $id;
                $total_qty += $qty;
                $subTotal += $price;
            }
        }
        // Save the cart quantities condition.
        $this->updateQuantity($itemsData);

        // $request->validate([
        //     'sync-checkbox' => 'required|array',
        //     'sync-checkbox.*' => 'required|string',
        //     'quantity' => 'required|array',
        //     'quantity.*' => 'required|integer|min:1',
        //     'product_price' => 'required|array',
        //     'product_price.*' => 'required|integer',
        // ]);

        // for checked items & total quantity & sub total extraction
        // $checkboxItems = $request->input('sync-checkbox');
        // $checkedItems = [];
        // foreach ($checkboxItems as $id => $checkboxItem) {
        //     if ($checkboxItem === 'on')
        //     {
        //         $checkedItems[] = [$id => $checkboxItem];
        //     }
        // }

        // $quantities = $request->input('quantity');
        // $product_prices = $request->input('product_price');
        // $total_qty = 0;
        // $subTotal = 0;

        // foreach ($checkedItems as $id => $checkedItem) 
        // {
        //     foreach ($quantities as $itemId => $quantity) 
        //     {
        //         foreach ($product_prices as $p_id => $price) 
        //         {
        //             if ($id === $itemId && $id === $p_id ) 
        //             {
        //                 $total_qty += $quantity;
        //                 $subTotal += $price * $quantity;
        //             }
        //         }

        //     }
        // }

        $shipping = $this->shipping_method->findOrFail(1);

        // Return response for Ajax request. 
        return "Success";

        // Go to payment page with cart argments.
        PaymentController::showTransaction($shipping, $checkedItemId, $total_qty, $subTotal);
    }

    public function updateQuantity($itemsData)
    {
        foreach ($itemsData as $item) {
            $id = $item['id'];
            $checkboxValue = $item['checkboxValue'];
            $qty = $item['qty'];
            $price = $item['price'];

            $cart_item = $this->cart_item->findOrFail($id);

            if ($cart_item)
            {
                $cart_item->update(['qty' => $qty]);
            }
        }

        // $quantities = $request->input('quantity');

        // foreach ($quantities as $itemId => $quantity) 
        // {
        //     $cart_item = $this->cart_item->findOrFail($itemId);

        //     if ($cart_item) 
        //     {
        //         $cart_item->update(['qty' => $quantity]);
        //     }
        // }
    }

    public function addToCart(Request $request, $product_id) {
        $quantity = $request->input('qty', 1);

        if ($quantity <= 0) {
            return redirect()->back()->with('error', 'Quantity must be greater than 0.');
        }

        $this->cart_item->customer_id = Auth::id();
        $this->cart_item->product_id  = $product_id;
        $this->cart_item->qty         = $quantity;
        $this->cart_item->save();

        return redirect()->route('customer.cart');
    }

    public function updateQty(Request $request, $product_id) {
        $cart = $this->cart_item->where('customer_id', Auth::id())
                                ->where('product_id',$product_id)
                                ->latest()
                                ->first();

        $quantity = $request->input('qty', 1);

        if ($quantity <= 0) {
            return redirect()->back()->with('error', 'Quantity must be greater than 0.');
        } elseif ($quantity + $cart->qty > 5 ) {
            return redirect()->back()->with('error', 'You can only buy 5 items.');
        }

        $cart->qty = $cart->qty + $quantity;
        $cart->save();

        return redirect()->route('customer.cart');
    }
}
