<x-app-layout>
    <x-slot name="content">
        <div class="p-5">
            <div class="mt-5 flex flex-row">
                <x-search-item />
            </div>
            <div class="flex">
                @foreach ($items as $item)
                    <a class="hover:shadow-md" href="{{route('items.show', $item)}}">
                        <div class="flex flex-col justify-between mr-2">
                            <div>
                                <img class="w-full h-auto" src="{{ $item->image ? asset('storage/' . $item->image) : 'https://via.placeholder.com/150' }}" alt="{{$item->name}} image">
                            </div>
                            <div class="mt-2 flex flex-row justify-between p-3">
                                <div>
                                    <p>{{$item->name}}</p>
                                    <p class="text-gray-400">{{$item->category->name}}</p>
                                </div>
                                <div>
                                    <p class="text-lg">£{{$item->price}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                {{$items->links()}}
            </div>
        </div>
    </x-slot>
</x-app-layout>