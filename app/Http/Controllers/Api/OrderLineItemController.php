<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderLineItem;

class OrderLineItemController extends Controller
{
    public function index() {
        return OrderLineItem::all();
    }

    public function store(Request $request) {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);
        return OrderLineItem::create($request->all());
    }

    public function show(OrderLineItem $orderLineItem) {
        return $orderLineItem;
    }

    public function update(Request $request, OrderLineItem $orderLineItem) {
        $request->validate([
            'quantity' => 'sometimes|required|integer|min:1',
            'price' => 'sometimes|required|numeric|min:0',
        ]);
        $orderLineItem->update($request->all());
        return $orderLineItem;
    }

    public function destroy(OrderLineItem $orderLineItem) {
        $orderLineItem->delete();
        return response()->noContent();
    }
}
