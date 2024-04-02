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
    }
}
