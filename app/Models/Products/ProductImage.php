<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_image'; // set up connection to the table
    public $timestamps = false; //turn off timestamps
    protected $fillable = ['product_id','image_id']; //allows the columns written inside the brackets to accept data from the array

    public function productImages(){
        return $this->hasOne(ProductImages::class , 'id','image_id');
    }
}
