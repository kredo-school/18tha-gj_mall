<?php

namespace App\Models\Products;

use App\Models\Orders\OrderLine;
use App\Models\Orders\ShoppingCartItem;
use App\Models\Users\Favorite;
use App\Models\Users\Seller;
use App\Models\Products\ProductStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


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

    public function productStatus(){
        return $this->belongsTo(ProductStatus::class , 'status_id' ,'id');
    }

    public function productImage(){
        return $this->hasMany(ProductImage::class ,'product_id' , 'id');
    }

    public function seller() {
        return $this->belongsTo(Seller::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function isReview() {
        return $this->reviews()->where('customer_id', Auth::user()->id)->exists();
    }

    public function getReview($product_id) {
        return $this->reviews()
                    ->where('customer_id', Auth::user()->id)
                    ->where('product_id', $product_id)
                    ->first();
    }

    public function favorites() {
        return $this->hasMany(Favorite::class);
    }

    public function isFavorite() {
        if (Auth::check()) {
            return $this->favorites()->where('customer_id', Auth::user()->id)->exists();
        } else {
            return false;
        }
    }

    public function ads(){
        return $this->hasMany(Ad::class ,'product_id' , 'id');
    }


    public function orderLine() {
        return $this->hasMany(OrderLine::class);
    }

    public function ShoppingCartItems(){
        return $this->hasMany(ShoppingCartItem::class ,'product_id' , 'id');
    }

    public function isCart() {
        return $this->ShoppingCartItems()->where('customer_id', Auth::id())->exists();
    }
}