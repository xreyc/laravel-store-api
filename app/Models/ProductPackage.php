<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPackage extends Model
{
    use HasFactory;

    // Fillable properties for mass assignment
    protected $fillable = [
        'product_id',    // Foreign key for product
        'price',         // Price of the package
        'description',   // Description of the package
        'duration',      // Duration or term of the package (if applicable)
        // Add other fields as necessary
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
