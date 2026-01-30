<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Inertia\Inertia;
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
}
