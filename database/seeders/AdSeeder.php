<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products\Ad;

class AdSeeder extends Seeder
{
    private $ad;

    public function __construct(Ad $ad)
    {
        $this->ad = $ad;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $ads = [
            [
                'title' => 'Coming soon !!',
                'content' => 'A new line of fans created by popular artisans will be available this spring. Stock is limited, so please purchase as soon as possible.',
                'image_name' => 'adBanner1.svg',
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'New Color Valiation',
                'content' => 'The color lineup of fan products that gained popularity last summer has been added. Please be sure to purchase these products before the hot summer begins.',
                'image_name' => 'adBanner1.svg',
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $this->ad->insert($ads); // insert the values to ads table
    }
}
