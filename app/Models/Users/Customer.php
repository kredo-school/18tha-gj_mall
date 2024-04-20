<?php

namespace App\Models\Users;


use App\Models\Inquiries\Inquiry;
use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use App\Models\Orders\ShopOrder;
use App\Models\Products\Review;

use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

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
        'google_id',
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }


    public function inqruiry()
    {
        return $this->hasMany(Inquiry::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);

    }

    public function shopOrders() {
        return $this->hasMany(ShopOrder::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }
}
