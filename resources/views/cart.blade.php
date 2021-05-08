<x-app-layout>    
    <x-slot name="content">
        @if(session('cart'))
        <div class="flex flex-col mx-auto container">
            <x-title>Shopping Cart</x-title>
           
            <table class="shadow-lg bg-white">
                <tr class="bg-blue-100">
                  <th class=" text-left px-8 py-4">No.</th>
                  <th class="border text-left px-8 py-4">Items</th>
                  <th class="border text-left px-8 py-4">Quantity</th>
                  <th class="border text-left px-8 py-4">Price</th>
                  <th class="border text-left px-8 py-4">Delete</th>
                </tr>
                @foreach($cart->items as $item)
                <tr>
                    <td class="border px-8 py-4">{{$item}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        @else
            <div class="text-center">
                <p class="text-red-800 font-semibold text-2xl">Your card is empty</p>
            </div>
        @endif
    </x-slot>
</x-app-layout>