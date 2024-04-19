<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products\ProductStatus;

class ProductStatusSeeder extends Seeder
{
    private $table;

    public function __construct(ProductStatus $table)
    {
        $this->table = $table;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product_status = [
            [
                'status' => '1: Waiting for Evaluation',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'status' => '2: Evaluating',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'status' => '3: Waiting for Display',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'status' => '4: Suspended',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        $this->table->insert($product_status); // insert the values to product_status table
    }
}
