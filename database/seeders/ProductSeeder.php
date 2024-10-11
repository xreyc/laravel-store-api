<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Loop to create 20 products with random store_id and category_id from 1 to 10
        for ($i = 1; $i <= 20; $i++) {
            Product::create([
                'store_id' => rand(1, 10), // Random store_id between 1 and 10
                'category_id' => rand(1, 10), // Random category_id between 1 and 10
                'name' => 'Product ' . $i, // Example product name
                'description' => 'Description for Product ' . $i, // Example description
                'price' => rand(10, 200), // Random price between 10 and 200
                'stock' => rand(1, 100), // Random stock quantity between 1 and 100
            ]);
        }
    }
}
