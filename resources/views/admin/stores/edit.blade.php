<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Edit Store') }}
        </h2>
    </x-slot>
    {{-- Creates form for usere to fill out to edit an existing phone --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.stores.update', $store) }}" method="post">
                    @method('put')
                    @csrf

                    {{-- text input field component and attributes for the name field --}}

                    <p><strong>Name: </strong></p>
                    <x-text-input type="text" name="name" field="name" placeholder="name" class="w-full"
                        autocomplete="off" :value="@old('name', $store->name)"></x-text-input>
                    {{-- Gets old data from the database and fills in input field --}}
                    @error('name')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror



                    <p><strong>address: </strong></p>
                    <x-textarea name="address" rows="10" field="text" placeholder="Start typing here..."
                        class="w-full mt-6" :value="@old('text', $store->address)"></x-textarea>
                    {{-- Gets old data from the database and fills in input field --}}
                    @error('address')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror





                    <x-primary-button class="mt-6">Save Store</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>