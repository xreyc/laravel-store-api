<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'amount',
        'payment_method', // e.g., credit card, PayPal
        'status', // Payment status (e.g., completed, failed)
        'transaction_id', // Optional field to store a transaction ID
        'paid_at', // Optional field to store the date/time of payment
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
