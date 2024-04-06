<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;

    protected $table = 'product_images'; // set up connection to the table
    public $timestamps = false; //turn off timestamps
    protected $fillable = ['image']; //allows the columns written inside the brackets to accept data from the array

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function targetProduct($id){
        return $this->product()->where('product_id',$id)->get();
    }

    public function productImage(){
        return $this->belongsTo(ProductImage::class);
    }
}
