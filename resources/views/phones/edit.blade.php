<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Edit Phone') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('phones.update', $phone) }}" method="post">
                    @method('put')
                    @csrf
                    <x-text-input
                    type="text"
                    name="name"
                    field="name"
                    placeholder="name"
                    class="w-full"
                    autocomplete="off"
                    :value="@old('name', $phone->name)"></x-text-input>

                    <x-text-input
                    type="text"
                    name="brand"
                    field="brand"
                    placeholder="brand"
                    class="w-full"
                    autocomplete="off"
                    :value="@old('brand', $phone->brand)"></x-text-input>

                <x-textarea
                    name="specs"
                    rows="10"
                    field="text"
                    placeholder="Start typing here..."
                    class="w-full mt-6"
                    :value="@old('text', $phone->specs)"></x-textarea>

                <x-primary-button class="mt-6">Save Phone</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
