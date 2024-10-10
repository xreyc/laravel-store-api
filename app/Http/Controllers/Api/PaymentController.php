<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index() {
        return Payment::all();
    }

    public function store(Request $request) {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string|max:255',
        ]);
        return Payment::create($request->all());
    }

    public function show(Payment $payment) {
        return $payment;
    }

    public function update(Request $request, Payment $payment) {
        $request->validate([
            'amount' => 'sometimes|required|numeric|min:0',
            'payment_method' => 'sometimes|required|string|max:255',
        ]);
        $payment->update($request->all());
        return $payment;
    }

    public function destroy(Payment $payment) {
        $payment->delete();
        return response()->noContent();
    }
}
