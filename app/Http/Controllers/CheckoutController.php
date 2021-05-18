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
        $data = $request->validate([
            'name' =>'required|string',
            'address' =>'required|string:max:255',
            'post_code' =>'required|Regex:/^(\w{3,4})\s(\w{3,4})$/i',
            'city' =>'required|string|max:58',
        ]);

        $user = User::find($request->user()->id);
        $user->details = json_encode($data);

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
