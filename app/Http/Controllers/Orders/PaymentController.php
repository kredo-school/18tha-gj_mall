<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users\Payment;
use App\Models\Users\Customer;
use App\Models\Users\Address;
use App\Models\Orders\ShoppingCartItem;
use App\Models\Orders\ShippingMethod;
use App\Models\Orders\ShopOrder;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    private $payment;
    private $customer;
    private $address;
    private $cart_item;
    private $shop_order;

    public function __construct(Payment $payment, Customer $customer, Address $address, ShoppingCartItem $cart_item, ShopOrder $shop_order)
    {
        $this->payment = $payment;
        $this->customer = $customer;
        $this->address = $address;
        $this->cart_item = $cart_item;
        $this->shop_order = $shop_order;
    }

    public function showTransaction($shipping, $total_qty, $subTotal)
    {
        $customer  = $this->customer->findOrFail(Auth::guard('customer')->id());
        // $payment = Payment::findOrFail($payment_id);

        return view('customer.payment.transaction')
        ->with('customer', $customer)
        ->with('shipping', $shipping)
        ->with('total_qty', $total_qty)
        ->with('subTotal', $subTotal);
    }

    // public function editAddress(Request $request, $address_id)
    // {
    //     DB::beginTransaction();
    //     $validatedData = $request->validate([
    //         'unit_num'  => 'max:255',
    //         'st_num'    => 'max:255',
    //         'address1'  => 'required|max:255',
    //         'address2'  => 'max:255',
    //         'city'      => 'required|max:255',
    //         'pos_code'  => 'required|max:12',
    //         'country'   => 'required'
    //     ]);

    //     try {
    //         // Update address details
    //         $address->unit_number = $validatedData['unit_num'];
    //         $address->street_number = $validatedData['st_num'];
    //         $address->address_line1 = $validatedData['address1'];
    //         $address->address_line2 = $validatedData['address2'];
    //         $address->postal_code = $validatedData['pos_code'];
    //         $address->city = $validatedData['city'];
    //         $address->country_code = $validatedData['country'];
    //         $address->region = $this->getRegion($validatedData['country']);

    //         $address->save();
    //         DB::commit();

    //         return redirect()->back();
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         Log::error('Update failed: ' . $e->getMessage());
    //         return back()->with('error', 'Failed to update your address information.');
    //     }
    // }

    // public function editPayment(Request $request, $payment_id)
    // {
    //     DB::beginTransaction();
    //     $validatedData = $request->validate([
    //         'name'        => 'required|max:255',
    //         'card_number' => 'required|integer',
    //         'expiry_date' => 'required|after:today'
    //     ]);

    //     try {
    //         // Find the relevant models
    //         $payment = Payment::findOrFail($payment_id);

    //         // Check if the new values differ from the existing values
    //         if ($payment->card_name != $validatedData['name'] ||
    //             $payment->card_number != $validatedData['card_number'] ||
    //             $payment->expiry_date != $validatedData['expiry_date'])
            // {
                
    //             // Update payment details only if there are changes
    //             $payment->card_name = $validatedData['name'];
    //             $payment->card_number = $validatedData['card_number'];
    //             $payment->expiry_date = $validatedData['expiry_date'];
                
    //             // Check if CVV is empty (only required if updating payment information)
    //             if (empty($validatedData['cvv'])) 
                // {
    //                 return back()->withErrors(['cvv' => 'CVV is required to register payment information.']);
    //             }
    //         }

    //         $payment->save();

    //         DB::commit();

    //         return redirect()->back();
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         Log::error('Update failed: ' . $e->getMessage());
    //         return back()->with('error', 'Failed to update your payment information.');
    //     }
    // }

    public function confirmation(Request $request)
    // , $order_total
    {
        $this->createOrder($request);
        // , $order_total

        return view('customer.payment.confirmation');
    }

    public function createOrder($request)
    // , $order_total
    {
        //     DB::beginTransaction();
        //     $validatedData = $request->validate([
        //         'name'        => 'required|max:255',
        //         'card_number' => 'required|integer',
        //         'expiry_date' => 'required|after:today'
        //     ]);

    }
}
