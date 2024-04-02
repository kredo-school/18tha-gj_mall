<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users\Seller;

class SellerController extends Controller
{
    public function showDashboard()
    {
        return view('seller.dashboard');
    }
}
