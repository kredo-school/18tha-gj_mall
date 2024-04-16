<?php

namespace App\Models\Products;

use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductStatus extends Model
{
    use HasFactory;

    protected $table = 'product_status';

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
