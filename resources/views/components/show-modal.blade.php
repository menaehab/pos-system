<!-- Modal Overlay & Content -->
<div x-data="{ isOpen: false }" x-on:show-modal.window="isOpen = true" x-show="isOpen" @keydown.escape.window="isOpen = false"
    x-transition.opacity.duration.200ms x-on:close-modal.window="isOpen = false" class="fixed inset-0 z-50"
    style="display: none;">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/50"></div>

    <!-- Modal Content -->
    <div class="relative z-10 flex items-center justify-center min-h-screen px-4">
        <div @click.away="isOpen = false"
            class="bg-white rounded-lg shadow-lg w-full max-w-md max-h-[90vh] overflow-y-auto p-6">
            <h2 class="text-xl font-bold mb-4">{{ $title }}</h2>
            {{ $slot }}
            <div class="flex justify-end gap-2">
                <button type="button" @click="isOpen = false"
                    class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition-colors cursor-pointer">
                    {{ __('keywords.close') }}
                </button>
            </div>
        </div>
    </div>
</div>
