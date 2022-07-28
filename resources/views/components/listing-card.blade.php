@props(['listing'])

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
            src="{{ asset($listing->logo != null ? 'storage/' . $listing->logo : 'images/no-image.svg') }}"
            alt="" />

        <div>
            <h3 class="text-2xl">
                <a href="listings/{{ $listing->id }}">{{ $listing->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
            <x-listing-tags :tagsCsv="$listing->tags" />
            <div class="text-lg mt-4 flex items-center justify-start gap-2">
                <i class="fa-solid fa-location-dot"></i>
                <p>{{ $listing->location }}</p>
            </div>
        </div>
    </div>
</x-card>
