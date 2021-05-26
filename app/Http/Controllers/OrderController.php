<?php

namespace App\Http\Controllers;

use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->json()->all();
        /*
        $cart = Session::get('cart');
        $now = new DateTime();
        Order::create([
            'order_number' => $request->user->id . $now->format('d' . 'm' . 'Y' . '0000'),
            'user_id' => $request->user->id,
            'order_details' => json_encode(array($cart,$data)),
            'status' => 'paid'
        ]);
        */
        Session::forget('cart');
        
        return $data['paymentIntent'];
    }
}
