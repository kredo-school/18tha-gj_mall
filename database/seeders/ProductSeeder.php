<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products\Product;

class ProductSeeder extends Seeder
{
    private $table;

    public function __construct(Product $table)
    {
        $this->table = $table;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Cute Kimono',
                'price' => 150,
                'qty_in_stock' => 15,
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat nisi in omnis quae. Debitis voluptates, architecto similique eos delectus culpa, hic recusandae minima laudantium in est. Expedita ratione magnam voluptates!
                Architecto cum minima dicta illo culpa voluptatibus, necessitatibus provident. Laborum, hic soluta dicta iusto laboriosam beatae. Quo non esse, earum temporibus dignissimos voluptates sunt vero enim fugiat soluta rem consequuntur.
                Architecto minus minima veritatis veniam laboriosam suscipit vitae iure temporibus ratione, illum molestias provident libero alias debitis odit atque asperiores neque. Quasi doloremque adipisci quod fugiat debitis unde quas vel.',
                'status_id' => '4',
                'seller_id' => '1',
                'category_id' => '2',
                'product_detail_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sensu Ayame',
                'price' => 15,
                'qty_in_stock' => 100,
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat nisi in omnis quae. Debitis voluptates, architecto similique eos delectus culpa, hic recusandae minima laudantium in est. Expedita ratione magnam voluptates!
                Architecto cum minima dicta illo culpa voluptatibus, necessitatibus provident. Laborum, hic soluta dicta iusto laboriosam beatae. Quo non esse, earum temporibus dignissimos voluptates sunt vero enim fugiat soluta rem consequuntur.',
                'status_id' => '5',
                'seller_id' => '2',
                'category_id' => '2',
                'product_detail_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Chawan',
                'price' => 50,
                'qty_in_stock' => 1,
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat nisi in omnis quae. Debitis voluptates, architecto similique eos delectus culpa, hic recusandae minima laudantium in est. Expedita ratione magnam voluptates!
                Architecto cum minima dicta illo culpa voluptatibus, necessitatibus provident. Laborum, hic soluta dicta iusto laboriosam beatae. Quo non esse, earum temporibus dignissimos voluptates sunt vero enim fugiat soluta rem consequuntur.
                Architecto minus minima veritatis veniam laboriosam suscipit vitae iure temporibus ratione, illum molestias provident libero alias debitis odit atque asperiores neque.',
                'status_id' => '5',
                'seller_id' => '3',
                'category_id' => '3',
                'product_detail_id' => '3',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        $this->table->insert($products); // insert the values to products table
    }
}
