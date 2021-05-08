<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Http\Requests\CartRequest;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function show(){
        if(Session::has('cart')){
            $cart = session('cart');
            dd(json_decode($cart->items));
            return view('cart', compact('cart'));
        }
        return view('cart');
    }

    public function add(CartRequest $request, Item $item)
    {
        $user_id = $request->user ? $request->user()->id : NULL;
        //check if cart already exists
        if(!Session::has('cart')){
            $cart = Cart::create([
                    'items' => json_encode([
                        $item->name => [
                            'quantity' => $request->quantity,
                            'price' => $item->price 
                        ]
                    ]),
                    'total_items' => $request->quantity,
                    'total_amount' => $request->quantity * $item->price,
                    'user_id' => $user_id
            ]);
            Session::put('cart', $cart);
        }else{
            $cart = Session::get('cart');
            //check if item is already present in chart and update cart     
            $items = json_decode($cart->items, true);
            if(array_key_exists($item->name, $items)){
                $items[$item->name]['quantity'] += $request->quantity;
            }else{
                $items[$item->name] = [ 'quantity' => $request->quantity];
            }
            $cart['items'] = json_encode($items);
            $cart['total_items'] += $request->quantity;
            $cart['total_amount'] += $request->quantity * $item->price;
            $cart['user_id'] = $user_id;
            //update cart in database and re-assign session
            $dbCart = Cart::findOrFail($cart->id);
            $dbCart->update([
                'items' => $cart['items'],
                'total_items' => $cart['total_items'],
                'total_amount' => $cart['total_amount'],
                'user_id' => $cart['user_id']
            ]);
            Session::put('cart', $dbCart);
            }
        
        return redirect()->route('cart.show');
    }

    public function update(CartRequest $request, Item $item)
    {
            
    }
}
