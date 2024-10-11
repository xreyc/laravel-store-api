<?php

namespace App\Http\Controllers;
use App\Models\ProductTag;

use Illuminate\Http\Request;

class ProductTagController extends Controller
{
    // Display a listing of the product tags
    public function index()
    {
        $tags = ProductTag::with(['product', 'tag'])->get(); // Include relationships if needed
        return response()->json($tags);
    }

    // Store a newly created product tag
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id', // Ensure the product exists
            'tag_id' => 'required|exists:tags,id',         // Ensure the tag exists
        ]);

        $productTag = ProductTag::create($request->all());
        return response()->json($productTag, 201);
    }

    // Display the specified product tag
    public function show($id)
    {
        $tag = ProductTag::with(['product', 'tag'])->findOrFail($id); // Include relationships if needed
        return response()->json($tag);
    }

    // Update the specified product tag
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'exists:products,id', // Ensure the product exists
            'tag_id' => 'exists:tags,id',         // Ensure the tag exists
        ]);

        $productTag = ProductTag::findOrFail($id);
        $productTag->update($request->all());
        return response()->json($productTag);
    }

    // Remove the specified product tag
    public function destroy($id)
    {
        $productTag = ProductTag::findOrFail($id);
        $productTag->delete();
        return response()->json(null, 204);
    }
}
