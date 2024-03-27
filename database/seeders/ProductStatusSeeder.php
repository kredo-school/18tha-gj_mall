<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products\ProductStatus;

class ProductStatusSeeder extends Seeder
{
    private $status;

    public function __construct(ProductStatus $status)
    {
        $this->status = $status;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product_status = [
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

        $this->status->insert($product_status); // insert the values to product_status table
    }
}
