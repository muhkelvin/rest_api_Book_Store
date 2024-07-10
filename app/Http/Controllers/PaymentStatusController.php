<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaymentStatusResource;
use App\Models\PaymentStatus;
use Illuminate\Http\Request;

class PaymentStatusController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:carts,id',
        ]);

        try {
            $paymentStatus = PaymentStatus::create([
                'user_id' => auth()->user()->id,
                'cart_id' => $request->cart_id,
                'status' => true,
            ]);

            return response()->json([
                'message' => 'Payment status updated successfully',
                'payment_status' => new PaymentStatusResource($paymentStatus),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update payment status',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function show(PaymentStatus $paymentStatus)
    {
        if (auth()->user()->id !== $paymentStatus->user_id) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 403);
        }

        return new PaymentStatusResource($paymentStatus);
    }
}
