<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CustomerSeeder::class,
            SellerSeeder::class,
            AdminSeeder::class,
            ProductStatusSeeder::class,
            CategorySeeder::class,
            ShippingMethodSeeder::class ,
            InquiryGenreSeeder::class,
            InquiryStatusSeeder::class,
            OrderStatusSeeder::class,
            InquirySeeder::class,
            ProductDetailSeeder::class,
            ProductImagesSeeder::class,
            ProductSeeder::class,
            AdSeeder::class,

        ]);
    }
}
