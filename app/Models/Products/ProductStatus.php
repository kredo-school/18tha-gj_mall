<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStatus extends Model
{
    use HasFactory;

    protected $table = 'product_status';

    public function products(){
        return $this->hasMany(Product::class ,'status_id','id');
    }

    public function getSeller($id) {
        return $this->products()
                    ->where('seller_id', $id)
                    ->paginate(5);
    }

}
