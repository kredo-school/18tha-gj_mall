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
            AdminSeeder::class,
            AdSeeder::class,
            CategorySeeder::class,
            CustomerSeeder::class,
            InquiryGenreSeeder::class,
            InquirySeeder::class,
            InquiryStatusSeeder::class,
            OrderStatusSeeder::class,
            ProductDetailSeeder::class,
            ProductImageSeeder::class,
            ProductSeeder::class,
            ProductStatusSeeder::class,
            SellerSeeder::class,
            ShippingMethodSeeder::class
        ]);
    }
}
