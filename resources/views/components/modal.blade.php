<div class="modal hidden">
    <div class="bg-white p-5 w-1/3 mx-auto rounded-md">
        <div class="text-right">
            <a class="modalToggler"><i class="fas fa-times"></i></a>
        </div>
        <p class="font-semibold">Confirm Delete</p>
        <div class="mt-5 flex justify-end">
            <x-button class="modalToggler">Cancel</x-button>
            <form method="POST" @if($item) action="{{route('admin.items.delete', $item)}}" @else action="{{route('admin.categories.delete', $category)}}" @endif>
                @csrf
                @method('DELETE')
                <x-button class="bg-red-600 hover:bg-red-800 ml-2">Delete</x-button>
            </form>
        </div>
    </div>
</div>