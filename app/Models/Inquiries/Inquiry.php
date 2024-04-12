<?php

namespace App\Models\Inquiries;

use App\Models\Users\Customer;
use Illuminate\Support\Facades\DB;
use App\Models\Inquiries\InquiryGenre;
use App\Models\Inquiries\InquiryStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inquiry extends Model
{
    use HasFactory;

    protected $table = 'inquiries';

    protected $fillable = [
        'title',
        'content',
        'answer',
        'translated_answer',
        'customer_id',
        'genre_id',
        'inquiry_status_id',
        'status'
    ];

    public function getData()
    {
        $data = DB::table($this->table)->get('id', 'title', 'content', 'answer', 'translated_answer', 'customer_id', 'genre_id', 'inquiry_status_id');
        return $data;
    }

    public function inquiryGenre()
    {
        return $this->belongsTo(InquiryGenre::class, 'genre_id');
    }

    public function inquiryStatus()
    {
        return $this->belongsTo(InquiryStatus::class, 'inquiry_status_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    

}
