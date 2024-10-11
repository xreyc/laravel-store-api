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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained()->onDelete('cascade'); // Foreign key to stores
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users
            $table->decimal('subtotal', 10, 2); // Subtotal amount
            $table->decimal('delivery_fee', 10, 2)->default(0); // Delivery fee
            $table->decimal('total_amount', 10, 2); // Total amount for the order
            $table->string('status')->default('pending'); // Order status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
