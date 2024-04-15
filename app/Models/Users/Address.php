<?php

namespace App\Models\Users;

use App\Models\Orders\ShopOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_number'  ,
        'street_number',
        'address_line1',
        'address_line2',
        'region'       ,
        'city'         ,
        'postal_code'  ,
        'country_code' ,
        'customer_id'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_code', 'alpha3');
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class , 'address_id', 'id');
    }

    public function shopOrders() {
        return $this->hasMany(ShopOrder::class);
    }
}
