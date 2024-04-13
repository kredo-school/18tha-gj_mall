<?php

namespace App\Models\Users;

use App\Models\Orders\ShopOrder;
use App\Models\Products\Review;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_number',
        'avatar',
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function shopOrders() {
        return $this->hasMany(ShopOrder::class);
    }
}