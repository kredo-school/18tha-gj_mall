<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users\Seller;
use Illuminate\Support\Facades\Hash;

class SellerSeeder extends Seeder
{   
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seller = new Seller();

        $sellers = [
            [
                'first_name' => 'John',
                'last_name'  => 'Doe',
                'email'      => 'johndoe@gmail.com',
                'password'   => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Ariana',
                'last_name'  => 'Grande',
                'email'      => 'arianagrande@gmail.com',
                'password'   => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Tom',
                'last_name'  => 'Hanks',
                'email'      => 'tomhanks@gmail.com',
                'password'   => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Brad',
                'last_name'  => 'Pit',
                'email'      => 'bradpit@gmail.com',
                'password'   => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Ema',
                'last_name'  => 'Watson',
                'email'      => 'ema@gmail.com',
                'password'   => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        $seller->insert($sellers);
    }
}
