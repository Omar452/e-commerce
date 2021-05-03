<x-app-layout>
    <x-slot name="content">
        <div class="flex flex-col mx-auto container">
            <x-title>Items list</x-title>
            <div class="text-center my-5">
                <a class="bg-blue-500 hover:bg-blue-800 text-xl px-5 py-2 text-white rounded-md" href="{{route('admin.items.create')}}">
                    <i class="fas fa-plus-circle"></i> Create New Item
                </a>
            </div>
            <table class="shadow-lg bg-white">
                <tr class="bg-blue-100">
                  <th class=" text-left px-8 py-4">Name</th>
                  <th class="border text-left px-8 py-4">Category</th>
                  <th class="border text-left px-8 py-4">Description</th>
                  <th class="border text-left px-8 py-4">Price</th>
                  <th class="border text-left px-8 py-4">Quantity</th>
                  <th class="border text-left px-8 py-4">Sold</th>
                  <th class="border text-left px-8 py-4">Image</th>
                  <th class="border text-left px-8 py-4">Edit</th>
                  <th class="border text-left px-8 py-4">Delete</th>
                </tr>
                @foreach ($items as $item)
                <tr>
                    <td class="border px-8 py-4 text-blue-800"><a class="font-bold hover:underline" href="{{route('items.show', $item)}}">{{$item->name}}</a></td>
                    <td class="border px-8 py-4">{{$item->category->name}}</td>
                    <td class="border px-8 py-4">{{$item->description}}</td>
                    <td class="border px-8 py-4">{{$item->price / 100}}</td>
                    <td class="border px-8 py-4">{{$item->quantity}}</td>
                    <td class="border px-8 py-4">{{$item->sold}}</td>
                    <td width="50" class="border px-8 py-4"><img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://via.placeholder.com/150' }}" image"></td>
                    <td class="border px-4 py-4 text-center text-blue-400 hover:text-blue-800"><a href="{{route('admin.items.edit', $item->id)}}"><i class="fas fa-edit"></i></a></td>
                    <td class="border px-4 py-4 text-center text-red-400 hover:text-red-800"><a class="modalToggler"><i class="fas fa-trash"></i></i></a></td>
                    <x-modal :item="$item" />
                </tr>
                @endforeach
            </table>
            
            <div class="m-5 w-1/4 mx-auto">
                {{$items->links()}}
            </div>
            
        </div>
    </x-slot>
</x-app-layout>