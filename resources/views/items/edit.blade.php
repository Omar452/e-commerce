<x-app-layout>
    <x-slot name="content">
        <x-title>Edit item</x-title>
        <div class="mt-5 p-5 flex justify-center mx-auto border w-1/2 round-sm bg-blue-50">
            <form class="w-full" action="{{route('admin.items.update', $item)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="my-1 flex flex-col">
                    <x-label for="name">Name:</x-label>
                    <x-input class="@error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{old('name') ? : $item->name}}"/>
                    @error('name')
                    <div class="text-red-600 pl-1">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="my-1 flex flex-col">
                    <x-label for="category">Category:</x-label>
                    <select class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="category" id="category">
                        @foreach (App\Models\Category::all() as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('name')
                    <div class="text-red-600 pl-1">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="my-2 flex flex-col">
                    <x-label for="description">Description:</x-label>
                    <textarea class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="description" id="description" cols="30" rows="5">{{old('description') ? : $item->description}}</textarea>
                    @error('description')
                    <div class="text-red-600 pl-1">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="my-2 flex flex-col">
                    <x-label for="price">Price:</x-label>
                    <x-input class="@error('price') is-invalid @enderror" id="price" type="number" name="price" placeholder="Price in cents eg: 999, 1499" value="{{old('price') ? : $item->price}}"/>
                    @error('price')
                    <div class="text-red-600 pl-1">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="my-2 flex flex-col">
                    <x-label for="quantity">Quantity:</x-label>
                    <x-input class="@error('quantity') is-invalid @enderror" id="quantity" type="number" name="quantity" value="{{old('quantity') ? : $item->quantity}}"/>
                    @error('quantity')
                    <div class="text-red-600 pl-1">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="my-2 flex flex-col">
                    <x-label for="image">Image:</x-label>
                    <x-input class="@error('image') is-invalid @enderror" id="image" type="file" name="image"/>
                    @error('image')
                    <div class="text-red-600 pl-1">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mt-5  text-center">
                    <x-button class="px-5 text-lg">Submit</x-button>
                </div>

            </form>
        </div>
    </x-slot>
</x-app-layout>