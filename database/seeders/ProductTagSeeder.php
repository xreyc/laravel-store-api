<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductTag;

class ProductTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create random associations between products and tags
        for ($i = 1; $i <= 30; $i++) { // Create 30 product-tag associations
            ProductTag::create([
                'product_id' => rand(1, 10), // Random product_id between 1 and 20
                'tag_id' => rand(1, 10), // Random tag_id between 1 and 10
            ]);
        }
    }
}
