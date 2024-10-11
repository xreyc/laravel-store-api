<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


/**
 * GET /api/stores → index: List all stores.
 * POST /api/stores → store: Create a new store.
 * GET /api/stores/{id} → show: Show a specific store.
 * PUT/PATCH /api/stores/{id} → update: Update a specific store.
 * DELETE /api/stores/{id} → destroy: Delete a specific store.
 */
Route::apiResource('stores', StoreController::class);

Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});