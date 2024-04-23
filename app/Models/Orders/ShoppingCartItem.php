<?php

namespace App\Models\Orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShoppingCartItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'shopping_cart_items';

    protected $fillable = ['product_id', 'qty', 'price'];

    public function product(){
        return $this->belongsTo(Product::class, 'id', 'product_id');
    }
}
