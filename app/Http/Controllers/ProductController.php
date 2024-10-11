<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display a listing of the products
    public function index()
    {
        $products = Product::with([
            'store', // this will get all store information
            'category:id,name,description', // specify field to query
            'images:id,product_id,image_url', // make sure the relationship reference id is included: product_id
            'packages',
            'tags'
        ])->get(); // Include relationships if needed
        return response()->json($products);
    }

    // Store a newly created product
    public function store(Request $request)
    {
        $request->validate([
            'store_id' => 'required|exists:stores,id', // Ensure the store exists
            'category_id' => 'required|exists:categories,id', // Ensure the category exists
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    // Display the specified product
    public function show($id)
    {
        $product = Product::with('category', 'store')->findOrFail($id); // Include relationships if needed
        return response()->json($product);
    }

    // Update the specified product
    public function update(Request $request, $id)
    {
        $request->validate([
            'store_id' => 'exists:stores,id', // Ensure the store exists
            'category_id' => 'exists:categories,id', // Ensure the category exists
            'name' => 'string|max:255',
            'description' => 'nullable|string',
            'price' => 'numeric|min:0',
            'stock' => 'integer|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json($product);
    }

    // Remove the specified product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }
}
