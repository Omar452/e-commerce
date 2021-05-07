<x-app-layout>
    <x-slot name="content">
        <div class="flex flex-col mx-auto container">
            <x-title>Categories list</x-title>
            <div class="text-center my-5">
                <a class="bg-blue-500 hover:bg-blue-800 text-xl px-5 py-2 text-white rounded-md" href="{{route('admin.categories.create')}}">
                    <i class="fas fa-plus-circle"></i> Add New Category
                </a>
            </div>
            <table class="shadow-lg bg-white">
                <tr class="bg-blue-100">
                  <th class=" text-left px-8 py-4">Name</th>
                  <th class="border text-left px-8 py-4">Number of Items</th>
                  <th class="border text-left px-8 py-4">Edit</th>
                  <th class="border text-left px-8 py-4">Delete</th>
                </tr>
                @foreach ($categories as $category)
                <tr>
                    <td class="border px-8 py-4">{{$category->name}}</td>
                    <td class="border px-8 py-4">{{$category->items->count()}}</td>
                    <td class="border px-4 py-4 text-center text-blue-400 hover:text-blue-800"><a href="{{route('admin.categories.edit', $category)}}"><i class="fas fa-edit"></i></a></td>
                    <td class="border px-4 py-4 text-center text-red-400 hover:text-red-800">
                        <a href='#deleteModal' data-toggle="modal" data-target="#deleteModal{{ $category->id }}"><i class="fas fa-trash"></i></a>

                        <x-delete-modal
                            :description="$category->name"
                            :id="$category->id"
                            :modelInstance="$category"
                            deleteRoute="admin.categories.delete"
                        />
                    </td>
                </tr>

                @endforeach
            </table>
        </div>
    </x-slot>
</x-app-layout>
