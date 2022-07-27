<x-layout>
    @include('partials._search')
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6"
                    src="{{ asset($listing->logo != null ? 'storage/' . $listing->logo : 'images/no-image.png') }}"
                    alt="" />

                <h3 class="text-2xl mb-2">{{ $listing->title }}</h3>
                <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
                <x-listing-tags :tagsCsv="$listing->tags" />
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>{{ $listing->description }}</p>


                        <a href="mailto:{{ $listing->email }}"
                            class="block bg-laravel text-white p-2 rounded-xl hover:opacity-80"><i
                                class="fa-solid fa-envelope mr-2">
                            </i>{{ $listing->email }}
                        </a>

                        <a href="http://{{ $listing->website }}" target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80">
                            <i class="fa-solid fa-globe mr-2"></i>Visit Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <x-card class="mt-4 flex space-x-6">
            <a href="{{ $listing->id }}/edit">
                <i class="fa-solid fa-pencil mr-2"></i>Edit
            </a>
            <form method="POST" action="/listings/{{ $listing->id }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500">
                    <i class="fa-solid fa-trash-can mr-2"></i>DELETE</button>
            </form>
        </x-card> --}}
    </div>
</x-layout>
