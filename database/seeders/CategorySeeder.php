<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array of sample category names and descriptions
        $categories = [
            ['name' => 'Electronics', 'description' => 'Devices, gadgets, and accessories.'],
            ['name' => 'Fashion', 'description' => 'Clothing, footwear, and accessories.'],
            ['name' => 'Home & Garden', 'description' => 'Furniture, decor, and gardening tools.'],
            ['name' => 'Health & Beauty', 'description' => 'Skincare, makeup, and wellness products.'],
            ['name' => 'Sports', 'description' => 'Sports equipment and activewear.'],
            ['name' => 'Automotive', 'description' => 'Car parts, accessories, and tools.'],
            ['name' => 'Books', 'description' => 'Fiction, non-fiction, and educational materials.'],
            ['name' => 'Toys', 'description' => 'Toys and games for children.'],
            ['name' => 'Grocery', 'description' => 'Food and household supplies.'],
            ['name' => 'Jewelry', 'description' => 'Rings, necklaces, bracelets, and more.'],
        ];

        // Loop to create categories
        foreach ($categories as $category) {
            Category::create($category); // Create a new category entry
        }
    }
}
