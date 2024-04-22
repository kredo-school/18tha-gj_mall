<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    public $timestamps = false;

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function getSeller($id) {
        return $this->products()
                    ->where('seller_id', $id)
                    ->paginate(5);
    }
}
