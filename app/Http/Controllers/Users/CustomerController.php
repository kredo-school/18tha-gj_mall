<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users\Customer;

class CustomerController extends Controller
{
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function showProfile($id)
    {
        $customer = $this->customer->findOrFail($id);
        return view('customer.profile.profile')->with('customer', $customer);
    }

    public function editProfile(Request $request, $id)
    {
        $customer = $this->customer->findOrFail($id);
        $request->validate([
            // Profile
            'fname'        => 'required|max:255',
            'lname'        => 'required|max:255',
            'email'        => 'required|email|unique:customers,email,'. $id,
            'phone_number' => 'unique:customers,email,'. $id,
            'new_password' => 'required|min:8|max:255',

            // Address
            'unit-num'  => 'max:255',
            'st-num'    => 'max:255',
            'address1'  => 'required|max:255',
            'address2'  => 'max:255',
            'city'      => 'required|max:255',
            'region'    => 'required|max:255',
            'pos-code'  => 'required|max:12',
            'country'   => 'required|integer',
            
            // Payment
            'name'        => 'max:255',
            'card_number' => 'required|int|',
            'expire_date' => 'required|max:255',
            'cvv'         => 'required|max:255',
        ]);
    }
}
