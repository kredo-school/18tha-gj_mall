<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products\ProductImage;

class ProductImageSeeder extends Seeder
{
    private $product_image;

    public function __construct(ProductImage $product_image)
    {
        $this->product_image = $product_image;
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

        $this->product_image->insert($product_images); // insert the values to product_images table
    }
}
