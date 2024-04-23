<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Orders\ShopOrder;
use App\Models\Users\Address;
use Illuminate\Http\Request;
use App\Models\Users\Customer;
use App\Models\Users\Country;
use App\Models\Users\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    const LOCAL_FOLDER_PATH = 'public/images/customer/';
    private $customer, $country, $address, $payment, $shop_order;

    public function __construct(Customer $customer, 
                                Country $country, 
                                Address $address, 
                                Payment $payment,
                                ShopOrder $shop_order)
    {
        $this->customer    = $customer;
        $this->country     = $country;
        $this->address     = $address;
        $this->payment     = $payment;
        $this->shop_order  = $shop_order;
    }


    public function showProfile($id)
    {
        $customer = $this->customer->findOrFail($id);

        return view('customer.profile.profile')
            ->with('customer', $customer);
    }

    public function showEditProfile($id)
    {
        $customer  = $this->customer->findOrFail($id);
        $countries = $this->country->all();

        return view('customer.profile.profileEdit')
            ->with('customer', $customer)
            ->with('countries', $countries);
    }

    public function showOrderHistory($id) {
        $shop_orders =  $this->shop_order->where('customer_id', $id)->get(); 
        return view('customer.profile.orderHistory')->with('shop_orders', $shop_orders);
    }

    public function update(Request $request, $id, $address_id, $payment_id)
    {
        DB::beginTransaction();
        $validatedData = $request->validate([
            // Profile
            'fname'        => 'required|max:255',
            'lname'        => 'required|max:255',
            'email'        => 'required|email|unique:customers,email,'. $id,
            'phone_number' => 'unique:customers,phone_number,'. $id,
            'new_password' => 'nullable|min:8|max:255',
            'avatar'       => 'nullable|mimes:jpeg,jpg,png,gif|max:1048',

            // Address
            'unit_num'  => 'max:255',
            'st_num'    => 'max:255',
            'address1'  => 'required|max:255',
            'address2'  => 'max:255',
            'city'      => 'required|max:255',
            'pos_code'  => 'required|max:12',
            'country'   => 'required',
            
            // Payment
            'name'        => 'required|max:255',
            'card_number' => 'required|integer',
            'expiry_date' => 'required|after:today',
        ]);

        try {
            // Find the relevant models
            $customer = Customer::findOrFail($id);
            $address = Address::findOrFail($address_id);
            $payment = Payment::findOrFail($payment_id);

            // Update customer details
            $customer->first_name = $validatedData['fname'];
            $customer->last_name = $validatedData['lname'];
            $customer->email = $validatedData['email'];
            $customer->phone_number = $validatedData['phone_number'];
            
            if ($validatedData['new_password']) {
                $customer->password = Hash::make($validatedData['new_password']);
            }

            if($request->avatar) {
                $this->deleteImage($customer->avatar);
                $customer->avatar = $this->saveImage($request);
            }

            $customer->save();

            // Update address details
            $address->unit_number = $validatedData['unit_num'];
            $address->street_number = $validatedData['st_num'];
            $address->address_line1 = $validatedData['address1'];
            $address->address_line2 = $validatedData['address2'];
            $address->postal_code = $validatedData['pos_code'];
            $address->city = $validatedData['city'];
            $address->country_code = $validatedData['country'];
            $address->region = $this->getRegion($validatedData['country']);

            $address->save();

            // Check if the new values differ from the existing values
            if ($payment->card_name != $validatedData['name'] ||
                $payment->card_number != $validatedData['card_number'] ||
                $payment->expiry_date != $validatedData['expiry_date']) {
                
                // Update payment details only if there are changes
                $payment->card_name = $validatedData['name'];
                $payment->card_number = $validatedData['card_number'];
                $payment->expiry_date = $validatedData['expiry_date'];
                
                // Check if CVV is empty (only required if updating payment information)
                if (empty($request->cvv)) {
                    return back()->withErrors(['cvv' => 'CVV is required to register payment information.']);
                }
            }

            $payment->save();

            DB::commit();

            return redirect()->route('customer.profile', $id);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Update failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to update customer information.');
        }
    }

    private function saveImage($request) {
        $img_name = time(). '.'. $request->avatar->extension();
        $request->avatar->storeAs(self::LOCAL_FOLDER_PATH, $img_name);

        return $img_name;
    }

    private function deleteImage($image_name) {
        $image_name = self::LOCAL_FOLDER_PATH. $image_name;

        if(Storage::disk('local')->exists($image_name)) {
            Storage::disk('local')->delete($image_name);
        }
    }

    private function getRegion($country_code) {
        $country = $this->country->where('alpha3', $country_code)->first();
        if ($country) {
            return $country->region;
        } else {
            return null;
        }
    }
}
