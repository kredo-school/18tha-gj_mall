<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Orders\ShippingMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class ShippingMethodSeeder extends Seeder
{
    private $table;

    public function __construct(ShippingMethod $table)
    {
        $this->table = $table;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shipping_method = [
            [
                'name'       => 'Air Mail',
                'price'      => 30,
                'price'      => '30',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sea Mail',
                'price' => 60,
                'price' => '60',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        $this->table->insert($shipping_method); 
    }
}
