<?php

namespace App\Http\Controllers;
use App\Models\ProductPackage;

use Illuminate\Http\Request;

class ProductPackageController extends Controller
{
    // Display a listing of the product packages
    public function index()
    {
        $packages = ProductPackage::with('product')->get(); // Include relationship if needed
        return response()->json($packages);
    }

    // Store a newly created product package
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id', // Ensure the product exists
            'package_type' => 'required|string|max:255',
            'weight' => 'required|numeric|min:0',
            'dimensions' => 'nullable|string|max:255',
        ]);

        $package = ProductPackage::create($request->all());
        return response()->json($package, 201);
    }

    // Display the specified product package
    public function show($id)
    {
        $package = ProductPackage::with('product')->findOrFail($id); // Include relationship if needed
        return response()->json($package);
    }

    // Update the specified product package
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'exists:products,id', // Ensure the product exists
            'package_type' => 'string|max:255',
            'weight' => 'numeric|min:0',
            'dimensions' => 'nullable|string|max:255',
        ]);

        $package = ProductPackage::findOrFail($id);
        $package->update($request->all());
        return response()->json($package);
    }

    // Remove the specified product package
    public function destroy($id)
    {
        $package = ProductPackage::findOrFail($id);
        $package->delete();
        return response()->json(null, 204);
    }
}
