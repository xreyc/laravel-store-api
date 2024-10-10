<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Product name
            $table->text('description')->nullable(); // Product description
            $table->decimal('price', 10, 2); // Product price
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Foreign key for category
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key for user
            $table->integer('stock')->default(0); // Stock quantity
            $table->string('sku')->unique(); // Unique stock keeping unit
            $table->string('image_url')->nullable(); // Main product image URL
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
