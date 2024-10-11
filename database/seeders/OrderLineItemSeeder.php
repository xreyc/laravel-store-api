<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderLineItem;

class OrderLineItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Loop to create 20 order line items with random order_id and product_id from 1 to 10
        for ($i = 1; $i <= 20; $i++) {
            OrderLineItem::create([
                'order_id' => rand(1, 10),  // Random order_id between 1 and 10
                'product_id' => rand(1, 10), // Random product_id between 1 and 10
                'quantity' => rand(1, 5),    // Random quantity between 1 and 5
                'price' => rand(10, 100),    // Random price between 10 and 100
            ]);
        }
    }
}
