<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    // Provide the fillable fields
    protected $fillable = [
        'name',
        'location',
        'phone',
        'email',
        'website',
        'opening_hours',
        'description',
    ];

    // Provide the model relationships below
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
