<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    use HasFactory;

    protected $table = 'page_views'; // set up connection to the table
    protected $fillable = ['id','customer_id','url','created_at','update_at']; //allows the columns written inside the brackets to accept data from the array
}
