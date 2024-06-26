<?php

namespace App\Models\Inquiries;

use App\Models\Inquiries\Inquiry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InquiryGenre extends Model
{
    use HasFactory;

    protected $table = 'inquiry_genres';

    public function inquiry()
    {
        return $this->hasMany(Inquiry::class);
    }
}
