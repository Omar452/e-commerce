<x-app-layout>    
    <x-slot name="content">
        @if(session('cart') && Session::get('cart')->total_items > 0)
        <div class="flex flex-col mx-auto container">
            <x-title>Shopping Cart</x-title>
            <table class="shadow-lg bg-white">
                <tr class="bg-blue-100">
                  <th class="border px-8 py-4">Items</th>
                  <th class="border px-8 py-4">Quantity</th>
                  <th class="border px-8 py-4">Unit Price</th>
                  <th class="border px-8 py-4">Total</th>
                  <th class="border px-2 py-1">Delete</th>
                </tr>
                @foreach(Session::get('cart')->items as $value)
                <tr>
                    <td class="border text-center px-8 py-4">{{$value['item']->name}}</td>
                    <td class="border text-center px-8 py-4">
                        <a href="{{route('cart.subtract', $value['item'])}}"><i class="text-blue-600 fas fa-minus"></i></a> 
                        <span class="text-xl px-2">{{$value['quantity']}}</span> 
                        <a href="{{route('cart.add', $value['item'])}}"> <i class="text-blue-600 fas fa-plus"></i></i></span>
                    </td>
                    <td class="border text-center px-8 py-4">£{{$value['price']}}</td>
                    <td class="border text-center px-8 py-4">£{{$value['price'] * $value['quantity']}}</td>
                    <td class="border text-center px-2 py-1">
                        <a href="{{route('cart.remove', $value['item'])}}"><i class="text-red-600 fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach             
            </table>
            <div class="shadow-lg bg-white flex border-t-2 justify-end">
                <div class="w-1/4 border-l-2">
                    <p class="px-8 py-4 text-gray-900 text-xl font-semibold">Cart details</p>
                    <p class="px-8 py-4">Total Items: {{Session::get('cart')->total_items}}</p>
                    <p class="px-8 py-4"> Amount exc. VAT: £{{Session::get('cart')->priceExcTax}}</p>
                    <p class="px-8 py-4"> Payable VAT 20%: £{{Session::get('cart')->total_tax}}</p>
                    <p class="px-8 py-4">Total Amount:  £{{Session::get('cart')->total_price}}</p>
                    <div class="text-center  px-8 py-4">
                        <a class="font-semibold bg-gray-800 rounded-md text-white py-2 px-4" href="{{route('checkout.details')}}">Checkout</a>    
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="text-center my-10">
                <p class="text-red-800 font-semibold text-2xl">Your shopping cart is empty</p>
            </div>
        @endif
    </x-slot>
</x-app-layout>