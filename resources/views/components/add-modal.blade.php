<!-- Modal Overlay & Content -->
<div x-data="{ isOpen: false }" x-on:add-modal.window="isOpen = true" x-on:clear.window="isOpen = false" x-show="isOpen"
    @keydown.escape.window="isOpen = false" x-transition.opacity.duration.200ms x-on:close-modal.window="isOpen = false"
    class="fixed inset-0 z-50" style="display: none;">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/50"></div>

    <!-- Modal Content -->
    <div class="relative z-10 flex items-center justify-center min-h-screen px-4">
        <form @click.away="isOpen = false" wire:submit="{{ $action }}"
            class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
            <h2 class="text-xl font-bold mb-4">{{ $title }}</h2>
            {{ $slot }}
            <div class="flex justify-end gap-2">
                <button type="button" @click="isOpen = false"
                    class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition-colors cursor-pointer">
                    {{ __('keywords.close') }}
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition-colors cursor-pointer">
                    {{ __('keywords.add') }}
                </button>
            </div>
        </form>
    </div>
</div>
