<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function detail(Request $request, $id) {
        $products = Product::with(['galleries', 'user'])->where('slug', $id)->firstOrFail();        
        return view('pages.detail', [
            'products' => $products
        ]);
    }
    public function cart(Request $request, $id) {
        $cart = [
            'products_id' => $id,
            'users_id' => Auth::user()->id,
        ];
        Cart::create($cart);
        return redirect()->route('cart');
    }
}
