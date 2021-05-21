<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        Session::forget('cart');
        $data = $request->json()->all();
        return $data['paymentIntent'];
    }
}
