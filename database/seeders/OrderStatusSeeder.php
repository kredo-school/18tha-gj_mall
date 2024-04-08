<?php

namespace Database\Seeders;

use App\Models\Orders\OrderStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderStatus = [
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
            ],
            [
                'status' => '4',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'status' => '5',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'status' => '6',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'status' => '7',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        OrderStatus::insert($orderStatus);
    }
}
