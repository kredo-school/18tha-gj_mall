<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function addresses()
    {
        return $this->hasMany(Address::class, 'alpha3', 'country_code');
    }
}
