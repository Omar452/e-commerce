<x-app-layout>
    <x-slot name="content">
        <x-title>Edit category</x-title>
        <div class="mt-5 p-5 flex justify-center mx-auto border w-1/2 round-sm bg-blue-100">
            <form class="w-full" action="{{route('admin.categories.update', $category)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="my-1 flex flex-col">
                    <x-label for="name">Name:</x-label>
                    <x-input class="@error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{old('name') ? : $category->name}}"/>
                    @error('name')
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