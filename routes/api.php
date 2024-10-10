<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductPackageController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaymentController;

Route::middleware(['api'])->group(function () {
    Route::apiResource('products', ProductController::class);
    Route::apiResource('product-packages', ProductPackageController::class);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('payments', PaymentController::class);
});