<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Support\Facades\SoftDeltes;

class Seller extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait, SoftDeltes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'payment_id',
    ];
}