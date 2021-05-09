<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function showCart()
    {
        return view('cart');
    }

    public function addToCart(Item $item)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($item);

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Item added to cart with success');
    }
}
