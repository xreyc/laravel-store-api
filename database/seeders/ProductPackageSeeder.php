<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductPackage;

class ProductPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Loop to create 20 product packages
        for ($i = 1; $i <= 20; $i++) {
            ProductPackage::create([
                'product_id' => rand(1, 10), // Random product_id between 1 and 20
                'package_type' => $this->getRandomPackageType(), // Random package type
                'weight' => rand(1, 5), // Random weight between 1 and 5 kg
                'dimensions' => rand(10, 50) . 'x' . rand(10, 50) . 'x' . rand(10, 50) . ' cm', // Random dimensions
            ]);
        }
    }

    private function getRandomPackageType()
    {
        $types = ['box', 'bag', 'bottle', 'carton'];
        return $types[array_rand($types)]; // Randomly select a package type
    }
}
