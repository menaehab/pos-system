@if (session()->has('success'))
    <div wire:poll.5s
        class="text-green-600 font-bold text-lg p-3 my-3 w-full text-center bg-green-100 border-green-600 border rounded-xl">
        {{ session('success') }}
    </div>
@endif
