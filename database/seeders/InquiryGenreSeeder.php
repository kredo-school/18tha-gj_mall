<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InquiryGenre;


class InquiryGenreSeeder extends Seeder
{
    private $inquiry_genre;

    public function __construct(InquiryGenre $inquiry_genre)
    {
        $this->inquiry_genre = $inquiry_genre;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inquiry_genres = [
            [
                'name' => 'Ordering',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Returns & Exchanges',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Shipping',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Other',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        $this->inquiry_genre->insert($inquiry_genres); // insert the values to categories table
    }
}
