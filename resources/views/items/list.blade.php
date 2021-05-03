<x-app-layout>
    <x-slot name="content">
        <div class="flex flex-col mx-auto container">
            <x-title>Items list</x-title>
            <div class="text-center my-5">
                <a class="bg-blue-500 hover:bg-blue-800 text-xl px-5 py-2 text-white rounded-md" href="{{route('admin.items.create')}}">
                    <i class="fas fa-plus-circle"></i> Create New Item
                </a>
            </div>

            <x-search-item />
            
            <x-items-table :items="$items" />
            
            <div class="m-5 w-1/4 mx-auto">
                {{$items->links()}}
            </div>
            
        </div>
    </x-slot>
</x-app-layout>