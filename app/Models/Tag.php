<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // Fillable properties for mass assignment
    protected $fillable = [
        'name', // Name of the tag
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_tag');
    }
}
