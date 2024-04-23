<?php

namespace App\Models\Users;

use App\Models\Message;
use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seller extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'payment_id',
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function sellerProducts($seller_id) {
        return $this->products()->where('seller_id', $seller_id)->paginate(12);
    }

    public function address() {
        return $this->hasOne(Address::class , 'id' , 'address_id');
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }
}
