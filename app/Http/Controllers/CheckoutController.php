<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\User;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function details()
    {
        return view('checkout.details');
    }

    public function checkDetails(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'address' =>'required',
            'post_code' =>'required',
            'city' =>'required',
        ]);

        $user = User::find($request->user()->id);
        

        return redirect()->route('checkout.payment');
    }


    public function payment() 
    {
        Stripe::setApiKey('sk_test_51IsQsoEsVakBTXvJRM6vd6cDNmlDSA8vDuKFvXmdCfCjrvjHKM2a8CtA3R1wQ6hIuyzUEffC4dkf0tsuMKjI5skg00iFKjKFIp');
        $intent = PaymentIntent::create([
            'amount' => Session::get('cart')->total_price * 100,
            'currency' => 'gbp',
        ]);
        $clientSecret = $intent['client_secret'];

        return view('checkout.payment', compact('clientSecret'));
    } 
}
