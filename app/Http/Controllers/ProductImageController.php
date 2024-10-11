<?php

namespace App\Http\Controllers;
use App\Models\ProductImage;

use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    // Display a listing of the product images
    public function index()
    {
        $images = ProductImage::with('product')->get(); // Include relationship if needed
        return response()->json($images);
    }

    // Store a newly created product image
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id', // Ensure the product exists
            'image_url' => 'required|url|max:255',
        ]);

        $image = ProductImage::create($request->all());
        return response()->json($image, 201);
    }

    // Display the specified product image
    public function show($id)
    {
        $image = ProductImage::with('product')->findOrFail($id); // Include relationship if needed
        return response()->json($image);
    }

    // Update the specified product image
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'exists:products,id', // Ensure the product exists
            'image_url' => 'url|max:255',
        ]);

        $image = ProductImage::findOrFail($id);
        $image->update($request->all());
        return response()->json($image);
    }

    // Remove the specified product image
    public function destroy($id)
    {
        $image = ProductImage::findOrFail($id);
        $image->delete();
        return response()->json(null, 204);
    }
}
