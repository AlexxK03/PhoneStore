<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stores') }}
        </h2>
    </x-slot>
    {{-- Single view for one phone --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 px-4 py-2 bg-green-100 border border-green-200 text-green-700 rounded-md">
                    {{ session('success') }}
                </div>
            @endif
            {{-- Created at field. Displays time phone was created --}}
            <div class="flex">
                <p class="opacity-70">
                    <strong>Created: </strong> {{ $store->created_at->diffForHumans() }}
                </p>
                {{-- Updated at field. Displays time phone was last updated --}}
                <p class="opacity-70 ml-8">
                    <strong>Updated at: </strong> {{ $store->updated_at->diffForHumans() }}
                </p>
                {{-- Edit and Delete buttons --}}
                <a href="{{ route('admin.stores.edit', $store) }}" class="btn-link ml-auto">Edit Store</a>

                <form action="{{ route('admin.stores.destroy', $store) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4"
                        onclick="return confirm('Are you sure you wish to delete this store?')">Delete Store</button>
            </div>
            {{-- Calling and displaying image and name --}}
            <div class="flex my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                {{-- Calling and displaying brand and specs --}}

                <div>
                    <p class="mt-6 whitespace-pre-wrap"> <strong> Brand:</strong> {{ $store->name }}</p>
                    <p class="mt-6 whitespace-pre-wrap"> <strong> Address:</strong> {{ $store->address }}</p>
                </div>



            </div>
        </div>
    </div>
</x-app-layout>
