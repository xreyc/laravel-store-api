<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Display a listing of the orders
    public function index()
    {
        $orders = Order::with(['store', 'user'])->get(); // Include relationships if needed
        return response()->json($orders);
    }

    // Store a newly created order
    public function store(Request $request)
    {
        $request->validate([
            'store_id' => 'required|exists:stores,id', // Ensure the store exists
            'user_id' => 'required|exists:users,id',   // Ensure the user exists
            'subtotal' => 'required|numeric|min:0',
            'delivery_fee' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|string|max:50', // Adjust length as needed
        ]);

        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    // Display the specified order
    public function show($id)
    {
        $order = Order::with(['store', 'user'])->findOrFail($id); // Include relationships if needed
        return response()->json($order);
    }

    // Update the specified order
    public function update(Request $request, $id)
    {
        $request->validate([
            'store_id' => 'exists:stores,id', // Ensure the store exists
            'user_id' => 'exists:users,id',   // Ensure the user exists
            'subtotal' => 'numeric|min:0',
            'delivery_fee' => 'numeric|min:0',
            'total_amount' => 'numeric|min:0',
            'status' => 'string|max:50',
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());
        return response()->json($order);
    }

    // Remove the specified order
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response()->json(null, 204);
    }
}
