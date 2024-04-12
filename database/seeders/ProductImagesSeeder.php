<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products\ProductImages;

class ProductImagesSeeder extends Seeder
{
    private $table;

    public function __construct(ProductImages $table)
    {
        $this->table = $table;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product_images = [
            [
                'image' => 'item1.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image' => 'item2.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image' => 'item3.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image' => 'item4.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image' => 'item5.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image' => 'item6.svg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        $this->table->insert($product_images); // insert the values to product_images table
    }
}
