<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;

// SAMPLE ROUTE
// http://localhost:8000/api/test
Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});

/************************** AUTHENTICATION ROUTES **************************/
/** 
 * This is for authentication built using laravel/passport 
 * Reference: https://laravel.com/docs/11.x/passport
 * */
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::get('user', [AuthController::class, 'user']);
});
/**
 * POST - api/register         index: List all stores.
 *       BODY: { "name": "John Doe", "email": "johndoe@yopmail.com", "password": "Password@22", "password_confirmation": "Password@22" }
 * POST         /api/login            store: Create a new store.
 *       BODY: {"email": "john@example.com", "password": "password"}
 * GET - /api/user             show: Show a specific store
 * Authorization: Bearer YOUR_ACCESS_TOKEN
 */


/************************** PUBLIC ROUTES **************************/
/** AUTOMATIC ROUTE */
Route::apiResource('stores', StoreController::class);
Route::apiResource('products', ProductController::class);
/**
 * GET          /api/stores         index: List all stores.
 * POST         /api/stores         store: Create a new store.
 * GET          /api/stores/{id}    show: Show a specific store.
 * PUT/PATCH    /api/stores/{id}    update: Update a specific store.
 * DELETE       /api/stores/{id}    destroy: Delete a specific store.
 */

/** GROUP ROUTE */
Route::group(['prefix' => 'store_group'], function () {
    Route::apiResource('stores', StoreController::class);
});
/**
 * GET          /api/store_group/stores         index: List all stores.
 * POST         /api/store_group/stores         store: Create a new store.
 * GET          /api/store_group/stores/{id}    show: Show a specific store.
 * PUT/PATCH    /api/store_group/stores/{id}    update: Update a specific store.
 * DELETE       /api/store_group/stores/{id}    destroy: Delete a specific store.
 */

 /** SUB GROUP */
 /** GROUP ROUTE */
Route::group(['prefix' => 'store_group'], function () {
    Route::group(['prefix' => 'store_sub_group'], function () {
        Route::apiResource('stores', StoreController::class);
    });
    Route::group(['prefix' => '{idparam}'], function () {
        Route::apiResource('stores', StoreController::class);
    });
});
/**
 * GET          /api/store_group/store_sub_group/stores         index: List all stores.
 * POST         /api/store_group/store_sub_group/stores         store: Create a new store.
 * GET          /api/store_group/store_sub_group/stores/{id}    show: Show a specific store.
 * PUT/PATCH    /api/store_group/store_sub_group/stores/{id}    update: Update a specific store.
 * DELETE       /api/store_group/store_sub_group/stores/{id}    destroy: Delete a specific store.
 * GET          /api/store_group/{idparam}/stores         index: List all stores.
 * POST         /api/store_group/{idparam}/stores         store: Create a new store.
 * GET          /api/store_group/{idparam}/stores/{id}    show: Show a specific store.
 * PUT/PATCH    /api/store_group/{idparam}/stores/{id}    update: Update a specific store.
 * DELETE       /api/store_group/{idparam}/stores/{id}    destroy: Delete a specific store.
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


/** NAMING ROUTE */
/**
 * If we give a name to specific route we can access it using the route() method
 * example route('nameofroute') this will return the url of the route ex: http://localhost:8000/api/xx
 * we can use this on view or redirects
 */
Route::get('/get_all_products', [ProductController::class, 'index'])->name('products.list');
Route::get('/get_all_product_route', function () {
    return response()->json(['data' => route('products.list')]);
});
/**
 * http://localhost:8000/api/get_all_products  -> will return all products
 * http://localhost:8000/api/get_all_product_route -> will return {data: "http://localhost:8000/api/get_all_products"}
 */


/************************** PRIVATE ROUTES **************************/
/**
 * For adding laravel/passport authentication check this url
 * https://laravel.com/docs/11.x/passport
 * https://medium.com/@is.sindiga/getting-started-with-laravel-authentication-using-passport-b77838bdc0fd
 * 
 * Header: Authorization: Bearer {Token}
 */
Route::middleware('auth:api')->group(function () {
    Route::group(['prefix' => 'private'], function () {
        Route::apiResource('stores', StoreController::class);
        Route::apiResource('products', ProductController::class);
    });
});
/**
 * GET          /api/private/stores         index: List all stores.
 * POST         /api/private/stores         store: Create a new store.
 * GET          /api/private/stores/{id}    show: Show a specific store.
 * PUT/PATCH    /api/private/stores/{id}    update: Update a specific store.
 * DELETE       /api/private/stores/{id}    destroy: Delete a specific store.
 * GET          /api/private/products         index: List all stores.
 * POST         /api/private/products         store: Create a new store.
 * GET          /api/private/products/{id}    show: Show a specific store.
 * PUT/PATCH    /api/private/products/{id}    update: Update a specific store.
 * DELETE       /api/private/products/{id}    destroy: Delete a specific store.
 */