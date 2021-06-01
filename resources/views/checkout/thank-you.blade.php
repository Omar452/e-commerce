<x-app-layout>    
    <x-slot name="content">
        <div class="py-12 flex flex-col items-center text-3xl">
            <p class="my-2"><i class="fas fa-check-circle text-green-500"></i> Payment confirmed</p>
            <p>Thank you for your order</p>
            <a class="bg-blue-700 text-white my-5 py-2 px-5 rounded-md" href="{{route('dashboard')}}">Go to dashboard</a>
        </div>
    </x-slot>
</x-app-layout>