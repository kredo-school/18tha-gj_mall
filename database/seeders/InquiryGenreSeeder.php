<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inquiries\InquiryGenre;


class InquiryGenreSeeder extends Seeder
{
    private $table;

    public function __construct(InquiryGenre $table)
    {
        $this->table = $table;
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

        $this->table->insert($inquiry_genres); // insert the values to categories table
    }
}
