<?php

namespace App\Models\Users;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Support\Facades\SoftDeltes;

class Customer extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait, SoftDeltes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',

    ];
}