<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products\ProductDetail;

class ProductDetailSeeder extends Seeder
{
    private $table;

    public function __construct(ProductDetail $table)
    {
        $this->table = $table;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product_details = [
            [
                'size' => '115cm(s)',
                'weight' => 'Around 800g',
                'is_fragile' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '3cm*15cm*3cm',
                'weight' => '50g',
                'is_fragile' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '15cm*15cm*10cm',
                'weight' => '150g',
                'is_fragile' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        $this->table->insert($product_details); // insert the values to product_details table
    }
}
