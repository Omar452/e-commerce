@if(session()->has('success'))
    <div class="p-5 mt-2 text-center bg-blue-100 text-blue-800 w-1/2 mx-auto rounded-md">
        {{session('success')}}
    </div>
@endif
@if(session()->has('error'))
    <div class="p-5 mt-2 text-center bg-red-100 text-red-800 w-1/2 mx-auto rounded-md">
            {{session('error')}}
    </div>
@endif