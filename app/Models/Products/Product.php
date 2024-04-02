<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory, SoftDeletes;

    public function productDetail(){
        return $this->hasOne(ProductDetail::class);
    }

    public function productImages(){
        return $this->hasMany(ProductImages::class);
    }
}
