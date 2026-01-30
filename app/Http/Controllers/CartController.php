<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\CartAction;
use App\Models\Product;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CartController extends Controller
{
    use AuthorizesRequests;

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

        $this->authorize('add', $product);

        $cartItem = CartItem::firstOrCreate(
            ['user_id' => $user->id, 'product_id' => $product->id],
            ['quantity' => 1]
        );

        if (!$cartItem->wasRecentlyCreated) {
            $cartItem->increment('quantity');
        }

        CartAction::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'action' => 'add',
            'quantity' => 1
        ]);

        return redirect()->back();
    }


    public function update(CartItem $cartItem, Request $request)
    {
        $this->authorize('update', $cartItem);

        $user = Auth::user();

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $oldQuantity = $cartItem->quantity;

        $cartItem->update([
            'quantity' => $request->quantity,
        ]);

        CartAction::create([
            'user_id' => $user->id,
            'product_id' => $cartItem->product_id,
            'action' => 'update',
            'quantity' => $request->quantity - $oldQuantity
        ]);

        return response()->json(['message' => 'Item updated']);
    }

    public function remove(CartItem $cartItem)
    {
        $this->authorize('delete', $cartItem);

        CartAction::create([
            'user_id' => Auth::id(),
            'product_id' => $cartItem->product_id,
            'action' => 'remove',
            'quantity' => $cartItem->quantity
        ]);

        $cartItem->delete();

        return response()->json(['message' => 'Item removed']);
    }
}
