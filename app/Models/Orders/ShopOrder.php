<?php

namespace App\Models\Orders;

use App\Models\Users\Address;
use App\Models\Users\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopOrder extends Model
{
    use HasFactory;

    protected $table = 'shop_orders';

    protected $fillable = ['customer_id', 'address_id', 'shipping_method_id', 'status_id', 'order_total']; 

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function address() {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

    public function orderStatus() {
        return $this->belongsTo(OrderStatus::class, 'status_id','id');
    }

    public function getStatus($id) {
        return $this->where('status_id',$id);
    }

    public function shippingMethod() {
        return $this->belongsTo(ShippingMethod::class, 'shipping_method_id','id');
    }

    public function orderLines() {
        return $this->hasMany(OrderLine::class, 'order_id', 'id');
    }
}