<?php

namespace App\Models;

use App\Models\Users\Customer;
use App\Models\Users\Seller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public function customer() {
        return $this->belongsTo(Customer::class, 'user_id');
    }

    public function seller() {
        return $this->belongsTo(Seller::class, 'user_id');
    }
}
