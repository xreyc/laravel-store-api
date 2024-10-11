<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;

// SAMPLE ROUTE
// http://localhost:8000/api/test
Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});

/************************** PUBLIC ROUTES **************************/
/** AUTOMATIC ROUTE */
Route::apiResource('stores', StoreController::class);
/**
 * GET          /api/stores         index: List all stores.
 * POST         /api/stores         store: Create a new store.
 * GET          /api/stores/{id}    show: Show a specific store.
 * PUT/PATCH    /api/stores/{id}    update: Update a specific store.
 * DELETE       /api/stores/{id}    destroy: Delete a specific store.
 */

/** GROUP ROUTE */
Route::group(['prefix' => 'store_group', 'middleware' => 'api'], function () {
    Route::apiResource('stores', StoreController::class);
});
/**
 * GET          /api/store_group/stores         index: List all stores.
 * POST         /api/store_group/stores         store: Create a new store.
 * GET          /api/store_group/stores/{id}    show: Show a specific store.
 * PUT/PATCH    /api/store_group/stores/{id}    update: Update a specific store.
 * DELETE       /api/store_group/stores/{id}    destroy: Delete a specific store.
 */

/** CUSTOM ROUTE TO CONTROLLER MAPPING */
Route::get('/get_all_stores', [StoreController::class, 'index']);
Route::post('/create_store', [StoreController::class, 'store']);
Route::get('/get_by_id/{id}', [StoreController::class, 'show']);
Route::put('/update_by_id/{id}', [StoreController::class, 'update']);
Route::delete('/delete_by_id/{id}', [StoreController::class, 'destroy']);
/**
 * GET          /api/get_all_stores         index: List all stores.
 * POST         /api/create_store         store: Create a new store.
 * GET          /api/get_by_id/{id}    show: Show a specific store.
 * PUT/PATCH    /api/update_by_id/{id}    update: Update a specific store.
 * DELETE       /api/delete_by_id/{id}    destroy: Delete a specific store.
 */

/************************** PRIVATE ROUTES **************************/