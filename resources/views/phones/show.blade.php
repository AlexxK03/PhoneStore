<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Phones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div class ="mb-4 px-4 py-2 bg-green-100 border border-green-200 text-green-700 rounded-md">
            {{ session('success')}}
            </div>
            @endif
            <div class="flex">
                <p class="opacity-70">
                    <strong>Created: </strong> {{ $phone->created_at->diffForHumans() }}
                </p>

                <p class="opacity-70 ml-8">
                    <strong>Updated at: </strong> {{ $phone->updated_at->diffForHumans() }}
                </p>

                <a href="{{ route('phones.edit', $phone) }}" class="btn-link ml-auto">Edit phone</a>
                <form action="{{ route('phones.destroy', $phone) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you wish to delete this phone?')">Delete Phone</button>
            </div>
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <img src="{{asset('storage/images/' .$phone->phone_image) }}" width="150" />
                <h2 class="font-bold text-4xl">
                    {{ $phone->name }}
                </h2>
                <p class="mt-6 whitespace-pre-wrap">{{$phone->brand}}</p>
                <p class="mt-6 whitespace-pre-wrap">{{$phone->specs}}</p>

            </div>
        </div>
    </div>
</x-app-layout>
