<x-app-layout>
    <x-slot name="content">
        <div class="mt-5 flex justify-center">
            @foreach ($items as $item)
                <div class="p-2 m-2 border-2 flex flex-row justify-between">
                    <div class="mr-2">
                        <p class="font-bold">{{$item->name}}</p>
                        <p>Product description: {{$item->description}}</p>
                        <p>price: £{{$item->price}}</p>
                    </div>
                    <div>
                        <img class="w-full h-auto" src="{{ $item->image ? asset($item->image) : 'https://via.placeholder.com/150' }}" alt="product image">
                    </div>
                </div>
            @endforeach
        </div>
    </x-slot>
</x-app-layout>