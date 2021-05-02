<x-app-layout>
    <x-slot name="content">
        <h1 class="text-center mt-5 ">Create a new item</h1>
        <div class="mt-5 flex justify-center mx-auto border w-1/3 round-sm">
            <x-form>
                <x-form-input name="name" label="Name" />
                <x-form-textarea name="description" label="description" />
                <x-form-submit>Create item</x-form-submit>
            </x-form>
        </div>
    </x-slot>
</x-app-layout>