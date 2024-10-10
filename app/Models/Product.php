<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Fillable properties for mass assignment
    protected $fillable = [
        'name',         // Product name
        'description',  // Product description
        'price',        // Product price
        'category_id',  // Foreign key for category
        'user_id',      // Foreign key for user
        'stock',        // Product stock quantity
        'sku',          // Stock keeping unit
        'image_url',    // Main product image URL
        // Add other fields as necessary
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function packages()
    {
        return $this->hasMany(ProductPackage::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
