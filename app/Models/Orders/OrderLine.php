<?php

namespace App\Models\Orders;

use App\Models\Products\Product;
use App\Models\Products\Review;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class OrderLine extends Model
{
    use HasFactory;

    protected $table = 'order_lines';

    protected $fillable = ['product_id', 'order_id', 'qty', 'price']; 

    public function shopOrder() {
        return $this->belongsTo(ShopOrder::class ,'order_id','id');
    }

    public function getStatus($id) {
        return $this->shopOrder()->where("status_id",$id)->paginate(5);
    }

    public function product() {
        return $this->belongsTo(Product::class , "product_id","id");
    }

    public function getSeller() {

        return $this->product()->where("seller_id",Auth::guard("seller")->id())->get();
    }

}
