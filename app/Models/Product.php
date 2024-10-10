<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Fillable properties for mass assignment
    protected $fillable = [
        'name',
        'description',
        'price',
        'sku',
        'stock',
        'category_id',
        'user_id',
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
        return $this->belongsToMany(Tag::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
