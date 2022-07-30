<x-layout>
    @include('partials._hero')
    @include('partials._search')

    @unless(!count($listings))
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 m-8 ">
            @foreach ($listings as $listing)
                <x-listing-card :listing="$listing" />
            @endforeach
        </div>
    @else
        <div class="m-4 md:m-8 flex justify-center align-center">
            <p>No Listing found!</p>
        </div>
    @endunless

    <div class="mt-6 p-4">
        {{ $listings->links() }}
    </div>

    @include('partials._footer')
</x-layout>
