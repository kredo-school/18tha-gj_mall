<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inquiries\InquiryStatus;

class InquiryStatusSeeder extends Seeder
{
    private $table;

    public function __construct(InquiryStatus $table)
    {
        $this->table = $table;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inquiry_statuses = [
            [
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'status' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'status' => '3',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        $this->table->insert($inquiry_statuses); // insert the values to inquiry_status table
    }
}
