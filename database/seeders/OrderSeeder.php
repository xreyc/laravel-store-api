<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create random orders
        for ($i = 1; $i <= 30; $i++) { // Create 30 orders
            Order::create([
                'store_id' => rand(1, 10), // Random store_id between 1 and 10
                'user_id' => rand(1, 10), // Random user_id between 1 and 10
                'subtotal' => rand(50, 500), // Random subtotal between 50 and 500
                'delivery_fee' => rand(0, 20), // Random delivery fee between 0 and 20
                'total_amount' => rand(0, 200),
                'status' => 'pending', // Default status
            ]);
        }
    }
}
