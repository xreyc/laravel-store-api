<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function lineItems() {
        return $this->hasMany(OrderLineItem::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }
}
