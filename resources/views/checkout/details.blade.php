<x-app-layout>    
    <x-slot name="content">
        <div class="flex flex-col mx-auto container">
            <x-title>Checkout details</x-title>

            <div class="w-1/3 mx-auto">
                <form action="{{route('checkout.check.details')}}" method="POST">
                    @csrf
                    <div class="my-2 flex flex-col">
                        <x-label for="name">Name:</x-label>
                        <x-input class="@error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{old('name')}}"/>
                        @error('name')
                        <div class="text-red-600 pl-1">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="my-2 flex flex-col">
                        <x-label for="address">Address:</x-label>
                        <x-input class="@error('address') is-invalid @enderror" id="address" type="text" name="address" value="{{old('address')}}"/>
                        @error('address')
                        <div class="text-red-600 pl-1">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="my-2 flex flex-row">
                        <div class="mr-2">
                            <x-label for="post_code">Post Code:</x-label>
                            <x-input class="@error('post_code') is-invalid @enderror" id="post_code" type="text" name="post_code" value="{{old('post_code')}}"/>
                            @error('post_code')
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
                    <x-button class="mt-5">Submit</x-button>
                </form>
            </div>
    </x-slot>
    
</x-app-layout>