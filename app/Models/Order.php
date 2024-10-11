<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'user_id',
        'subtotal', // Subtotal amount for the order
        'delivery_fee', // Delivery fee for the order
        'total_amount', // Total amount for the order
        'status', // Order status (e.g., pending, completed)
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderLineItems()
    {
        return $this->hasMany(OrderLineItem::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
