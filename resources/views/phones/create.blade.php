<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Phones') }}
        </h2>
    </x-slot>
{{-- Creates form of what users need to fill in --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('phones.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- input field component and attributes for the name field--}}
                    <p><strong>Name: </strong></p>
                    <x-text-input
                        type="text"
                        name="name"
                        field="name"
                        placeholder="name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('name')">
                    </x-text-input>
                    @error('name')
                        <div class= "text-red-600 text-sm">{{$message}}</div>
                    @enderror

                    {{-- text input field component and attributes for the brand field--}}
                    <p><strong>Brand: </strong></p>
                        <x-text-input
                        type="text"
                        name="brand"
                        field="brand"
                        placeholder="brand"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('brand')">
                    </x-text-input>
                    @error('brand')
                    <div class= "text-red-600 text-sm">{{$message}}</div>
                @enderror

                {{-- text area input field component and attributes for the specs field--}}
                <p><strong>Specs: </strong></p>
                    <x-textarea
                        name="specs"
                        rows="10"
                        field="text"
                        placeholder="Specs of phone. Start typing here..."
                        class="w-full mt-6"
                        :value="@old('text')">
                    </x-textarea>
                    @error('specs')
                    <div class= "text-red-600 text-sm">{{$message}}</div>
                @enderror

                    {{-- file input field component and attributes for the image field--}}
                    <p><strong>Image: </strong></p>
                        <x-fileinput
                        type="file"
                        name="phone_image"
                        field="phone_image"
                        placeholder="brand"
                        class="w-full"
                        autocomplete="off">
                        </x-fileinput>
                        @error('file')
                        <div class= "text-red-600 text-sm">{{$message}}</div>
                    @enderror

                    <x-primary-button class="mt-6">Save Phone</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
