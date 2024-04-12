<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Users\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    private $favorite;

    public function __construct(Favorite $favorite) {
        $this->favorite = $favorite;
    }

    public function store($product_id) {
        $this->favorite->customer_id = Auth::user()->id;
        $this->favorite->product_id  = $product_id;
        $this->favorite->save();

        return redirect()->back();
    }

    public function destroy($product_id) {
        $this->favorite
            ->where('customer_id', Auth::user()->id)
            ->where('product_id', $product_id)
            ->delete();

        return redirect()->back();
    }
}
