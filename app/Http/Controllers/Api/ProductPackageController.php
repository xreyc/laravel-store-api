<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductPackage;

class ProductPackageController extends Controller
{
    public function index() {
        return ProductPackage::all();
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);
        return ProductPackage::create($request->all());
    }

    public function show(ProductPackage $productPackage) {
        return $productPackage;
    }

    public function update(Request $request, ProductPackage $productPackage) {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric|min:0',
        ]);
        $productPackage->update($request->all());
        return $productPackage;
    }

    public function destroy(ProductPackage $productPackage) {
        $productPackage->delete();
        return response()->noContent();
    }
}
