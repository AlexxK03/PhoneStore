<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Store') }}
        </h2>
    </x-slot>
    {{-- Creates a loop to fetch all phones from the database and display the image, name, specs as well as the time it was last updated --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.stores.create') }}" class="btn-link btn-lg mb-2">+ New Store</a>
            @forelse ($stores as $store)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                        <a href="{{ route('admin.stores.show', $store->id) }}"><strong>Name:
                            </strong>{{ $store->name }}</a>
                    </h2>
                    <p class="mt-2">
                        <strong>address: </strong>{{ $store->address }}
                    </p>

                    <span class="block mt-4 text-sm opacity-70">{{ $store->updated_at->diffForHumans() }}</span>
                </div>

            @empty
                <p>You have no stores yet.</p>
            @endforelse
            {{-- {{ $stores->links() }} --}}
        </div>
    </div>
</x-app-layout>
