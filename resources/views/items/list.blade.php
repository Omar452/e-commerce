<x-app-layout>
    <x-slot name="content">
        <div class="flex flex-col mx-auto container">
            <h1 class="text-center my-5">Items list</h1>
            <table class="shadow-lg bg-white">
                <tr>
                  <th class="bg-blue-100 border text-left px-8 py-4">Name</th>
                  <th class="bg-blue-100 border text-left px-8 py-4">Category</th>
                  <th class="bg-blue-100 border text-left px-8 py-4">Description</th>
                  <th class="bg-blue-100 border text-left px-8 py-4">Price</th>
                  <th class="bg-blue-100 border text-left px-8 py-4">Quantity</th>
                  <th class="bg-blue-100 border text-left px-8 py-4">Sold</th>
                  <th class="bg-blue-100 border text-left px-8 py-4">Image</th>
                  <th class="bg-blue-100 border text-left px-8 py-4">Actions</th>
                </tr>
                @foreach ($items as $item)
                <tr>
                    <td class="border px-8 py-4"><a class="font-bold hover:underline" href="{{route('items.show', $item)}}">{{$item->name}}</a></td>
                    <td class="border px-8 py-4">{{$item->category->name}}</td>
                    <td class="border px-8 py-4">{{$item->description}}</td>
                    <td class="border px-8 py-4">{{$item->price / 100}}</td>
                    <td class="border px-8 py-4">{{$item->quantity}}</td>
                    <td class="border px-8 py-4"></td>
                    <td width="50" class="border px-8 py-4"><img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://via.placeholder.com/150' }}" image"></td>
                    <td class="border px-8 py-4">Edit/Delete</td>
                </tr>
                @endforeach
            </table>
        </div>
    </x-slot>
</x-app-layout>