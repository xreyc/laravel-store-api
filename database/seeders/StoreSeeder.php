<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Loop to create 10 stores
        for ($i = 1; $i <= 10; $i++) {
            Store::create([
                'name' => 'Store ' . $i, // Example store name
                'location' => 'Location ' . $i, // Example location
                'phone' => '123-456-789' . rand(0, 9), // Example phone number
                'email' => 'store' . $i . '@example.com', // Example email
                'website' => 'https://example.com/store' . $i, // Example website
                'opening_hours' => '09:00 AM - 09:00 PM', // Example opening hours
                'description' => 'Description for Store ' . $i, // Example description
            ]);
        }
    }
}
