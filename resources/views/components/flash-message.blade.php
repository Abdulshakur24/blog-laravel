@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-primary text-white p-4 z-40 rounded">
        <p class="text-center">
            {{ session('message') }}
        </p>
    </div>
@endif
