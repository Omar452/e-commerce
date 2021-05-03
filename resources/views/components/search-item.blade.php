<div class="bg-blue-50 w-60 border-2 border-gray-300 rounded-lg mb-2">
    <form method="GET" action="{{route('items.index')}}">
        <input class="bg-transparent border-transparent focus:border-transparent focus:ring-transparent" id="search" type="text" name="search" placeholder="Search items..." class="">
        <button class="text-gray-600 hover:text-blue-500"><i class="fas fa-search"></i></button>
    </form>
</div>