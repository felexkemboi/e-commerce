<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $cartItems = CartItem::with('product')->where('user_id', $user->id)->get();

        return Inertia::render('Cart', [
            'cartItems' => $cartItems,
        ]);
    }

    public function add(Request $request, Product $product)
    {
        $user = Auth::user();

        $cartItem = CartItem::firstOrCreate(
            ['user_id' => $user->id, 'product_id' => $product->id],
            ['quantity' => 1]
        );

        if (!$cartItem->wasRecentlyCreated) {
            $cartItem->increment('quantity');
        }

        return redirect()->back();
    }

    public function remove(CartItem $cartItem)
    {
        $cartItem->delete();

        return response()->json(['message' => 'Item removed']);
    }
}
