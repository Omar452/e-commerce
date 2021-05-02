<x-app-layout>
    <x-slot name="content">
        <div class="mt-5 flex justify-center">
            @foreach ($items as $item)
                <div class="p-2 m-2 border-2 flex flex-row justify-between">
                    <div class="mr-2">
                        <a href="{{route('items.show', $item)}}" class="font-bold hover:underline">{{$item->name}}</a>
                        <p>price: £{{$item->price}}</p>
                    </div>
                    <div>
                        <img class="w-full h-auto" src="{{ $item->image ? asset($item->image) : 'https://via.placeholder.com/150' }}" alt="{{$item->name}} image">
                    </div>
                </div>
            @endforeach
            {{$items->links()}}
        </div>
    </x-slot>
</x-app-layout>