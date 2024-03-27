<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $customers = [
            [
                'id' => 1,
                'first_name' => 'Ichirou',
                'last_name' => 'Kredo',
                'email' => 'ichirouk@example.com',
                'phone_number' => '000-123-5678',
                'password' => bcrypt('password'),
                'avatar' => 'avatar1.svg', // public/images/customer/avatar1.svg
                'payment_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'first_name' => 'Jirou',
                'last_name' => 'Kredo',
                'email' => 'jirouk@example.com',
                'phone_number' => '000-234-6789',
                'password' => bcrypt('password'),
                'avatar' => 'avatar1.svg',
                'payment_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'first_name' => 'Saburou',
                'last_name' => 'Kredo',
                'email' => 'saburouk@example.com',
                'phone_number' => '000-345-7891',
                'password' => bcrypt('password'),
                'avatar' => 'avatar1.svg',
                'payment_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        $this->customer->insert($customers); // insert the values to customers table
    }
}
