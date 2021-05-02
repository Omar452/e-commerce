<x-app-layout>    
    <x-slot name="content">
        <div class="py-12">
            @if(auth()->user()->role === "admin")
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <nav>
                        <ul>
                            <li><a href="{{route('admin.items.list')}}">Items list</a></li>
                        </ul>
                    </nav>
                </div>
            @endif
        </div>
    </x-slot>
</x-app-layout>
