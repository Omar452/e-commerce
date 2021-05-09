<x-app-layout>    
    <x-slot name="content">
        @if(session('cart'))
        <div class="flex flex-col mx-auto container">
            <x-title>Shopping Cart</x-title>
            <table class="shadow-lg bg-white">
                <tr class="bg-blue-100">
                  <th class="border text-left px-8 py-4">Items</th>
                  <th class="border text-left px-8 py-4">Quantity</th>
                  <th class="border text-left px-8 py-4">Price</th>
                  <th class="border text-left px-8 py-4">Delete</th>
                </tr>
                @foreach(Session::get('cart')->items as $key => $value)
                <tr>
                    <td class="border px-8 py-4">{{$value['item']}}</td>
                    <td class="border px-8 py-4">{{$value['quantity']}}</td>
                    <td class="border px-8 py-4">{{$value['price']}}</td>
                </tr>
                @endforeach             
            </table>
            <div class="shadow-lg bg-white flex border-t-2 justify-end">
                <div class="w-1/4 border-l-2">
                    <p class="px-8 py-4 text-gray-900 text-xl font-semibold">Cart details</p>
                    <p class="px-8 py-4"> Amount exc. VAT: </p>
                    <p class="px-8 py-4">Total Items: {{Session::get('cart')->total_quantity}}</p>
                    <p class="px-8 py-4">Total Amount:  £{{Session::get('cart')->total_price}}</p>
                    <p class="px-8 py-4"> Total VAT 20%:</p>
                    <div class="text-center  px-8 py-4">
                        <a class="font-semibold bg-gray-800 rounded-md text-white py-2 px-4" href="">Make Payment</a>    
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="text-center">
                <p class="text-red-800 font-semibold text-2xl">Your shopping cart is empty</p>
            </div>
        @endif
    </x-slot>
</x-app-layout>