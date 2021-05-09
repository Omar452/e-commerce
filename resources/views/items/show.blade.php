<x-app-layout>
    <x-slot name="content">
        <div class="mt-10 flex justify-center">
            <div class="flex flex-row shadow-md">
                <div>
                    <img class="w-full h-auto" src="{{ $item->image ? asset('storage/' . $item->image) : 'https://via.placeholder.com/300' }}" alt="{{$item->name}} image">
                </div>
                <div class="flex flex-col px-5 pt-5 bg-white">
                    <div>
                        <p class="font-semibold text-xl">{{$item->name}}</p>
                        <p class="text-gray-500 text-lg">£{{$item->price}}</p>
                    </div>
                    <div>
                        <form action="{{route('addToCart', $item)}}" method="GET">
                            @csrf
                            <div class="flex flex-col">
                                <button class="text-center mt-2 py-1 bg-gray-900 rounded-md text-white">Add to <i class="fas fa-shopping-cart"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="pt-3">
                        <p class="font-semibold text-md">Product description:</p>
                        <p class="text-sm text-gray-600 italic">{{$item->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>