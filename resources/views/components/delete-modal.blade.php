<div class="modal hidden">
    <div class="bg-white p-5 w-1/3 mx-auto rounded-md">
        <div class="text-right">
            <a class="crossToggler"><i class="fas fa-times"></i></a>
        </div>
        <p class="font-semibold">Confirm Delete of {{$description}}</p>
        <div class="mt-5 flex justify-end">
            <x-button class="buttonToggler">Cancel</x-button>

            <form method="POST" action="{{route($deleteRoute, $modelInstance)}}">
                @csrf
                @method('DELETE')
                <x-button class="bg-red-600 hover:bg-red-800 ml-2">Delete</x-button>
            </form>
        </div>
    </div>
</div>
