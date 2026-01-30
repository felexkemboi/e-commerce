<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        return Inertia::render('Dashboard', [
            'products' => Product::all(),
            'user' => $user,
            'cartItems' => $user ? $user->cartItems->pluck('product_id') : []
        ]);
    }
}
