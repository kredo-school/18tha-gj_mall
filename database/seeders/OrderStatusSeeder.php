<?php

namespace Database\Seeders;

use App\Models\Orders\OrderStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderStatusSeeder extends Seeder
{
    private $table;

    private function __construct(OrderStatus $table)
    {
        $this->table = $order_status;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order_status = [
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

        $this->table->insert($order_status); 

    }
}
