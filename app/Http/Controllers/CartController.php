<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->paginate(10);
        return CartResource::collection($carts);
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        try {
            $cart = Cart::create([
                'user_id' => auth()->user()->id,
                'book_id' => $request->book_id,
                'quantity' => $request->quantity,
            ]);

            return response()->json([
                'message' => 'Cart item added successfully',
                'cart' => new CartResource($cart),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to add cart item',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'nullable|integer|min:1',
        ]);

        if (auth()->user()->id !== $cart->user_id) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 403);
        }

        try {
            $cart->update([
                'quantity' => $request->quantity,
            ]);

            return response()->json([
                'message' => 'Cart item updated successfully',
                'cart' => new CartResource($cart),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update cart item',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(Cart $cart)
    {
        if (auth()->user()->id !== $cart->user_id) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 403);
        }

        try {
            $cart->delete();

            return response()->json([
                'message' => 'Cart item deleted successfully',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete cart item',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
