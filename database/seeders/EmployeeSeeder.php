<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Loop to create 10 employees with random store_id and user_id from 1 to 10
        for ($i = 1; $i <= 10; $i++) {
            Employee::create([
                'store_id' => rand(1, 10), // Random store_id between 1 and 10
                'user_id' => rand(1, 10),   // Random user_id between 1 and 10
                'position' => 'Position ' . $i, // Example positions
                'salary' => rand(30000, 60000), // Random salary
            ]);
        }
    }
}
