<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        return Product::all();
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);
        return Product::create($request->all());
    }

    public function show(Product $product) {
        return $product;
    }

    public function update(Request $request, Product $product) {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric|min:0',
        ]);
        $product->update($request->all());
        return $product;
    }

    public function destroy(Product $product) {
        $product->delete();
        return response()->noContent();
    }
}
