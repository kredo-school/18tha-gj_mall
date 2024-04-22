<?php

namespace App\Models\Orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    protected $table = 'order_status';

    public function shopOrders() {
        return $this->hasMany(ShopOrder::class,"status_id","id");
    }
}
