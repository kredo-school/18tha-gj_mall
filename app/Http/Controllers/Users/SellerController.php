<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users\Seller;

class SellerController extends Controller
{
    private $seller;

    public function __construct(Seller $seller)
    {
        $this->seller = $seller;
    }

    public function showDashboard()
    {
        return view('seller.dashboard');
    }
}
