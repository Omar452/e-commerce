<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function index()
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

    public function subtractItem(Item $item)
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $cart->subtract($item);

        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Item removed with success');
    }

    public function removeItem(Item $item)
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $cart->remove($item);

        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Item removed with success');
    }
}
