<?php

namespace App\Models\Orders;

use App\Models\Products\Product;
use App\Models\Products\Review;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;

    protected $table = 'order_lines';

    protected $fillable = ['product_id', 'order_id', 'qty', 'price']; 

    public function shopOrder() {
        return $this->belongsTo(ShopOrder::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
