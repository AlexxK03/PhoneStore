<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Phone') }}
        </h2>
    </x-slot>
{{-- Creates a loop to fetch all phones from the database and display the image, name, specs as well as the time it was last updated --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.phones.create') }}" class="btn-link btn-lg mb-2">+ New Phone</a>
            @forelse ($phones as $phone)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <img src="{{asset('storage/images/' .$phone->phone_image) }}" width="150" />
                    <h2 class="font-bold text-2xl">
                       <a href="{{route('admin.phones.show', $phone->uuid)}}"><strong>Name: </strong>{{ $phone->name }}</a>
                    </h2>
                    <p class="mt-2">
                        <strong>Specs: </strong>{{ Str::limit($phone->specs, 200) }}
                    </p>
                    <span class="block mt-4 text-sm opacity-70">{{ $phone->updated_at->diffForHumans() }}</span>
                </div>

            @empty
            <p>You have no phones yet.</p>
            @endforelse
            {{$phones->links()}}
        </div>
    </div>
</x-app-layout>
