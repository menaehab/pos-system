<div x-data="{ isOpen: false }" x-on:delete-modal.window="isOpen = true" x-on:close-modal.window="isOpen = false"
    x-show="isOpen" x-transition.opacity.duration.200ms @keydown.escape.window="isOpen = false" id="delete-modal"
    class="fixed inset-0 z-50" style="display: none;">

    <!-- Overlay -->
    <div @click="isOpen = false" class="absolute inset-0 bg-black/50"></div>

    <!-- Modal Content -->
    <div class="relative z-10 flex items-center justify-center min-h-screen px-4">
        <div @click.away="isOpen = false" class="w-full max-w-md">
            <form wire:submit="{{ $action }}" class="bg-white rounded-lg shadow-lg w-full p-6">
                <h2 class="text-xl font-bold mb-4">{{ $title }}</h2>
                <p>{{ __('keywords.are_you_sure') }}</p>

                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" @click="isOpen = false"
                        class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition-colors cursor-pointer">
                        {{ __('keywords.close') }}
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors cursor-pointer">
                        {{ __('keywords.delete') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
