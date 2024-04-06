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

    public function showProfile($id)
    {
        $sellerProfile = $this->seller->findOrFail($id);
        // dd($sellerProfile);
        return view('seller.profile.sellerProfile')->with('sellerProfile', $sellerProfile);
    }
}
