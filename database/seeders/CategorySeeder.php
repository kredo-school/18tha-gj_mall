<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products\Category;

class CategorySeeder extends Seeder
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
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

        $this->category->insert($categories); // insert the values to categories table
    }
}
