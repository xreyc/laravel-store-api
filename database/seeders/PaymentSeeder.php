<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Loop to create 15 payments with random order_id from 1 to 10
        for ($i = 1; $i <= 15; $i++) {
            Payment::create([
                'order_id' => rand(1, 10), // Random order_id between 1 and 10
                'amount' => rand(50, 500), // Random payment amount between 50 and 500
                'payment_method' => $this->getRandomPaymentMethod(), // Random payment method
                'status' => 'completed', // Default status, customize as needed
                'transaction_id' => 'TXN' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT), // Random transaction ID
                'paid_at' => now(), // Current timestamp for payment date
            ]);
        }
    }

    private function getRandomPaymentMethod()
    {
        $methods = ['credit card', 'PayPal', 'bank transfer', 'cash'];
        return $methods[array_rand($methods)];
    }
}
