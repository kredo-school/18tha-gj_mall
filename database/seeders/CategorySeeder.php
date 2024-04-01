<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products\Category;

class CategorySeeder extends Seeder
{
    private $table;

    public function __construct(Category $table)
    {
        $this->table = $table;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Food'
            ],
            [
                'name' => 'Cloth / Accessory'
            ],
            [
                'name' => 'Kitchen'
            ],
            [
                'name' => 'Home Decor'
            ],
            [
                'name' => 'Table'
            ]
        ];

        $this->table->insert($categories); // insert the values to categories table
    }
}
