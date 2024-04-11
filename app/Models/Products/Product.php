<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    public function productDetail(){
        return $this->hasOne(ProductDetail::class ,'id','product_detail_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function productImage(){
        return $this->hasMany(ProductImage::class ,'product_id' , 'id');
    }

    public function ads(){
        return $this->hasMany(Ad::class ,'product_id' , 'id');
    }

    public function ShoppingCartItems(){
        return $this->hasMany(ShoppingCartItem::class ,'product_id' , 'id');
    }
}
