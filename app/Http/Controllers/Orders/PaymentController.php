<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users\Payment;
use App\Models\Users\Customer;
use App\Models\Users\Country;
use App\Models\Users\Address;
use App\Models\Orders\ShippingMethod;
use App\Models\Orders\ShoppingCartItem;
use App\Models\Orders\ShopOrder;
use App\Models\Products\OrderLine;
use App\Models\Products\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    private $payment;
    private $customer;
    private $country;
    private $address;
    private $cart_item;
    private $shop_order;
    private $shipping_method;
    private $order_line;
    private $product;

    public function __construct(Payment $payment, Customer $customer, Country $country, Address $address, ShoppingCartItem $cart_item, ShopOrder $shop_order, ShippingMethod $shipping_method, OrderLine $order_line, Product $product)
    {
        $this->payment = $payment;
        $this->customer = $customer;
        $this->country = $country;
        $this->address = $address;
        $this->cart_item = $cart_item;
        $this->shop_order = $shop_order;
        $this->shipping_method = $shipping_method;
        $this->order_line = $order_line;
        $this->product = $product;
    }

    public function showTransaction(Request $request)
    {
        $customer  = $this->customer->findOrFail(Auth::guard('customer')->id());
        $countries = $this->country->all();
        $shipping = $request->session()->get('shipping');
        $total_qty = $request->session()->get('total_qty');
        $subTotal = $request->session()->get('subTotal');
        $deliver_date = date('F, d, Y', strtotime('+2 week'));

        // Saved for updating order table.
        $checkedItemId = $request->session()->get('checkedItemId');

        return view('customer.payment.transaction')
            ->with('customer', $customer)
            ->with('countries', $countries)
            ->with('shipping', $shipping)
            ->with('total_qty', $total_qty)
            ->with('subTotal', $subTotal)
            ->with('deliver_date', $deliver_date)
            ->with('checkedItemId', $checkedItemId);
    }

    public function editAddress(Request $request, $address_id)
    {
        $address = $this->address->findOrFail($address_id);

        DB::beginTransaction();
        $validatedData = $request->validate([
            'unit_number'    => 'max:255',
            'street_number'  => 'max:255',
            'address_line_1' => 'required|max:255',
            'address_line_2' => 'max:255',
            'city'           => 'required|max:255',
            'postal_code'    => 'required|max:12',
            'country'        => 'required'
        ]);

        try 
        {
            // Update address details
            $address->unit_number = $validatedData['unit_number'];
            $address->street_number = $validatedData['street_number'];
            $address->address_line1 = $validatedData['address_line_1'];
            $address->address_line2 = $validatedData['address_line_2'];
            $address->postal_code = $validatedData['postal_code'];
            $address->city = $validatedData['city'];
            $address->country_code = $validatedData['country'];

            $address->save();
            DB::commit();

            return redirect()->back();
        } 
        catch (\Exception $e) 
        {
            DB::rollBack();
            Log::error('Update failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to update your address information.');
        }
    }

    public function editPayment(Request $request, $payment_id)
    {
        // Find the relevant models
        $payment = $this->payment->findOrFail($payment_id);

        DB::beginTransaction();
        $validatedData = $request->validate([
            'name'        => 'required|max:255',
            'card_number' => 'required',
            'expiry_date' => 'required|after:today'
        ]);

        try 
        {
            // Check if the new values differ from the existing values
            if ($payment->card_name != $validatedData['name'] ||
                $payment->card_number != str_replace(" ", "", $validatedData['card_number']) ||
                $payment->expiry_date != $validatedData['expiry_date'])
            {
                // Update payment details only if there are changes
                $payment->card_name = $validatedData['name'];
                $payment->card_number = str_replace(" ", "", $validatedData['card_number']);
                $payment->expiry_date = $validatedData['expiry_date'];
            }

            $payment->save();
            DB::commit();

            return redirect()->back();
        } 
        catch (\Exception $e) 
        {
            DB::rollBack();
            Log::error('Update failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to update your payment information.');
        }
    }

    public function confirmation(Request $request)
    {
        try
        {
            $result_destroyCartItem = $this->destroyCartItem($request);

            if ( $result_destroyCartItem )
            {
                $result_createShopOrder = $this->createShopOrder($request);
                $result_createOrderLine = $this->createOrderLine($request);

                if ($result_createShopOrder && $result_createOrderLine ) 
                {
                    $order = $this->shop_order->where('customer_id', Auth::guard('customer')->id())->latest('created_at')->first();
                    $deliver_date = date('D, F, d, Y', strtotime('+2 week'));
     
                    return response()->json([
                        'redirectUrl' => route('customer.payment.confirmation', 
                        [
                            'orderTotal' => $order->order_total,
                            'orderId' => $order->id,
                            'deliver_date' => $deliver_date
                        ])
                    ]);
                }
            }
        } 
        catch (\Exception $e)
        {
            Log::error('Exception occurred: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        } 
    }

    public function createShopOrder($request)
    {
        DB::beginTransaction();
        $order_total = $request->input('total'); 
        try 
        {
            if ( $order_total )
            {  
                // Insert shop_orders table.
                $this->shop_order->customer_id = $this->customer->findOrFail(Auth::guard('customer')->id())->id;
                $this->shop_order->address_id = $this->address->where('customer_id', Auth::guard('customer')->id())->first()->id;
                $this->shop_order->shipping_method_id = $this->shipping_method->findOrFail(1)->id;
                $this->shop_order->status_id = 1; // default value
                $this->shop_order->order_total = $order_total; 
                $this->shop_order->save();
                DB::commit();
                return true;
            }
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            Log::error('Insert failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to insert your order information.');
        }
    }

    public function createOrderLine($request)
    {
        DB::beginTransaction();
        $checkedItemIds = $request->input('checkedItemIds');
        $result = false;
        Log::info($checkedItemIds); 
        try 
        {
            if ($checkedItemIds)
            {
                foreach ($checkedItemIds as $id)
                { 
                    $cartItem = $this->cart_item->onlyTrashed()->findOrFail($id);
                    $qty = $cartItem->qty;
                    $unit_Price = $this->product->findOrFail($cartItem->product_id)->price;

                    // Insert order_lines table.
                    $this->order_line = new OrderLine; // used to save multipul records.
                    $this->order_line->product_id = $cartItem->product_id;
                    $this->order_line->order_id = $this->shop_order->where('customer_id', Auth::guard('customer')->id())->latest('created_at')->first()->id;
                    $this->order_line->qty = $qty;
                    $this->order_line->price = $unit_Price * $qty;
                    $this->order_line->save(); 
                }
            }
            DB::commit();
            return true;
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            Log::error('Insert failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to insert your order information.');
        }
    }

    public function destroyCartItem($request)
    {
        $checkedItemIds = $request->input('checkedItemIds');
        $result = false;

        if ($checkedItemIds)
        {
            foreach ($checkedItemIds as $id)
            {
                if ( $this->cart_item->destroy($id) )
                {
                    $result = true;
                }
                else 
                {
                    $result = false;
                }
            }
        }
        return $result;
    }

    public function paymentConfirmation(Request $request)
    { 
        return view('customer.payment.confirmation', [
            'orderTotal' => number_format($request->orderTotal, 2),
            'orderId' => $request->orderId, 
            'deliver_date' => $request->deliver_date
        ]);
    }
}