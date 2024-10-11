<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array of sample tag names
        $tags = [
            'Electronics',
            'Fashion',
            'Home & Garden',
            'Health & Beauty',
            'Sports',
            'Automotive',
            'Books',
            'Toys',
            'Grocery',
            'Jewelry',
        ];

        // Loop to create tags
        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag, // Tag name from the array
            ]);
        }
    }
}
