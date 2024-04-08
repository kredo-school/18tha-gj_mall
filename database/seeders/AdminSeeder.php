<?php

namespace Database\Seeders;

use App\Models\Users\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    // private $admin;

    // private function __construct(Admin $admin)
    // {
    //     $this->admin = $admin;
    // }

    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    

    //     $this->admin->insert($admins);
    // }
    public function run(): void
    {
        $admin = new Admin();

        $admins = 
        [
            [
                'first_name'   => 'Taro',
                'last_name'    => 'Yamada',
                'email'        => 'admin123@gmail.com',
                'phone_number' => '01201112222',
                'password'    => Hash::make('admin123'),
                'role'        => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name'   => 'John',
                'last_name'    => 'Smith',
                'email'        => 'stuff123@gmail.com',
                'phone_number' => '01201113333',
                'password'    => Hash::make('stuff123'),
                'role'        => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name'   => 'John',
                'last_name'    => 'Carlo',
                'email'        => 'translater123@gmail.com',
                'phone_number' => '01201114444',
                'password'    => Hash::make('translater123'),
                'role '        => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name'   => 'Mike',
                'last_name'    => 'Trout',
                'email'        => 'assessor123@gmail.com',
                'phone_number' => '01201115555',
                'password'    => Hash::make('assessor123'),
                'role'        => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name'   => 'David',
                'last_name'    => 'Cruse',
                'email'        => 'delivery123@gmail.com',
                'phone_number' => '012011155212',
                'password'    => Hash::make('delivery123'),
                'role'        => 5,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        
        $admin->insert($admins);
    }
}
