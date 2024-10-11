<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Loop to create 30 product images
        for ($i = 1; $i <= 30; $i++) {
            ProductImage::create([
                'product_id' => rand(1, 20), // Random product_id between 1 and 20
                'image_url' => 'https://example.com/images/product_' . $i . '.jpg', // Example image URL
            ]);
        }
    }
}
