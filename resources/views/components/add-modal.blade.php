<!-- Modal Overlay & Content -->
<div wire:ignore.self id="modal-wrapper" class="fixed inset-0 hidden z-50">
    <!-- Overlay -->
    <div id="modal-overlay" class="absolute inset-0 bg-black/50"></div>

    <!-- Modal Content -->
    <div class="relative z-10 flex items-center justify-center min-h-screen px-4">
        <form wire:submit.prevent="{{ $action }}" class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
            <h2 class="text-xl font-bold mb-4">{{ $title }}</h2>
            {{ $slot }}
            <div class="flex justify-end gap-2">
                <button type="button" wire:click="$dispatch('clear')"
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

<script>
    const modalWrapper = document.getElementById('modal-wrapper');
    const modalOverlay = document.getElementById('modal-overlay');

    function openModal() {
        modalWrapper.classList.remove('hidden');
    }

    function closeModal() {
        modalWrapper.classList.add('hidden');
    }
    window.addEventListener('add-modal', openModal);
    window.addEventListener('close-modal', closeModal);
    modalOverlay.addEventListener('click', closeModal);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeModal();
    });
</script>
