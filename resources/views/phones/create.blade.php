<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Phones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('phones.store') }}" method="post">
                    @csrf
                    <x-text-input
                        type="text"
                        name="name"
                        field="name"
                        placeholder="name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('name')"></x-text-input>

                        <x-text-input
                        type="text"
                        name="brand"
                        field="brand"
                        placeholder="brand"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('brand')"></x-text-input>

                    <x-textarea
                        name="specs"
                        rows="10"
                        field="text"
                        placeholder="Start typing here..."
                        class="w-full mt-6"
                        :value="@old('text')"></x-textarea>

                    <x-primary-button class="mt-6">Save Phone</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
