<x-app-layout>    
    <x-slot name="content">
        <div class="flex flex-col mx-auto container">
            <x-title>Checkout</x-title>

            <div class="flex items-center justify-center">

                <form class="w-1/3" id="checkout-form" action="{{route('cart.payment')}}" method="POST">

                    <div class="my-2 flex flex-col">
                        <x-label for="address">Address:</x-label>
                        <x-input class="@error('address') is-invalid @enderror" id="address" type="text" name="address" value="{{old('address')}}"/>
                        @error('address')
                        <div class="text-red-600 pl-1">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="my-2 flex flex-row justify-between">
                        <div>
                            <x-label for="Postcode">Postcode:</x-label>
                            <x-input class="@error('Postcode') is-invalid @enderror" id="Postcode" type="text" name="Postcode" value="{{old('Postcode')}}"/>
                            @error('postcode')
                            <div class="text-red-600 pl-1">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <x-label for="city">City:</x-label>
                            <x-input class="@error('city') is-invalid @enderror" id="city" type="text" name="city" value="{{old('city')}}"/>
                            @error('city')
                            <div class="text-red-600 pl-1">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="my-2 flex flex-col">
                        <x-label for="card_name">Card Holder Name:</x-label>
                        <x-input class="@error('card_name') is-invalid @enderror" id="card_name" type="text" name="card_name" value="{{old('card_name')}}"/>
                        @error('card_name')
                        <div class="text-red-600 pl-1">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="my-2 flex flex-col">
                        <x-label for="card_number">Credit Card Number:</x-label>
                        <x-input class="@error('card_number') is-invalid @enderror" id="card_number" type="text" name="card_number" value="{{old('card_number')}}"/>
                        @error('card_number')
                        <div class="text-red-600 pl-1">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="my-2 flex flex-row justify-between">
                        <div>
                            <x-label for="expiration_date">Expiration date:</x-label>
                            <x-input class="@error('expiration_date') is-invalid @enderror" id="expiration_date" type="text" name="expiration_date" value="{{old('expiration_date')}}" placeholder="MM/YY"/>
                            @error('expiration_date')
                            <div class="text-red-600 pl-1">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <x-label for="cvc">CVC:</x-label>
                            <x-input class="@error('cvc') is-invalid @enderror" id="cvc" type="text" name="cvc" value="{{old('cvc')}}"/>
                            @error('cvc')
                            <div class="text-red-600 pl-1">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="text-center my-10">
                        <x-button class="text-lg px-6">Pay £{{Session::get('cart')->total_price}}</x-button>
                    </div>
                </form>
            </div>
            
    </x-slot>
</x-app-layout>