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
                'status' => '1:Waiting for packing',
                // 'created_at' => now(),
                // 'updated_at' => now()
            ],
            [
                'status' => '2:Waiting for acceptance',
            ],
            [
                'status' => '3:Acceptance complete',
            ],
            [
                'status' => '4:In transit',
            ],
            [
                'status' => '5:Delivery',
            ],
            [
                'status' => '6:Cancellation',
            ],
            [
                'status' => '7:Refund completed',
            ]
        ];

        OrderStatus::insert($orderStatus);
    }
}
