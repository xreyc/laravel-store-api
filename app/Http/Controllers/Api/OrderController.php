<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index() {
        return Order::with('lineItems')->get();
    }

    public function store(Request $request) {
        $request->validate(['user_id' => 'required|exists:users,id']);
        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    public function show(Order $order) {
        return $order->load('lineItems');
    }

    public function update(Request $request, Order $order) {
        $order->update($request->all());
        return $order;
    }

    public function destroy(Order $order) {
        $order->delete();
        return response()->noContent();
    }
}
