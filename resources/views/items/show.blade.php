<x-app-layout>
    <x-slot name="content">
        <div class="mt-5 flex justify-center m-5">
            <div class="p-2 m-2 border-2 flex flex-col">
                <div>
                    <img class="w-full h-auto" src="{{ $item->image ? asset('storage/' . $item->image) : 'https://via.placeholder.com/300' }}" alt="{{$item->name}} image">
                </div>
                <div class="mr-2">
                    <div class="flex flex-col content-around space-y-3">
                        <div>
                            <p class="font-bold">{{$item->name}}</p>
                            <p>Product description: {{$item->description}}</p>
                            <p>price: £{{$item->price / 100}}</p>
                        </div>
                        <div>
                            <a href="#" class="px-4 py-2 bg-gray-700 block text-white rounded-sm">Add to basket</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>