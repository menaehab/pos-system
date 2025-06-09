<!-- Modal Overlay & Content -->
<div wire:ignore.self id="delete-modal" class="fixed inset-0 z-50 hidden">
    <!-- Overlay -->
    <div id="modal-overlay" class="absolute inset-0 bg-black/50"></div>

    <!-- Modal Content -->
    <div class="relative z-10 flex items-center justify-center min-h-screen px-4">
        <form wire:submit.prevent="{{ $action }}" class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
            <h2 class="text-xl font-bold mb-4">{{ $title }}</h2>

            <p>{{ __('keywords.are_you_sure') }}</p>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="closeModal()"
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

<script>
    const deleteModal = document.getElementById('delete-modal');

    function closeModal() {
        deleteModal.classList.add('hidden');
    }

    function openModal() {
        deleteModal.classList.remove('hidden');
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeModal();
    });

    window.addEventListener('delete-modal', openModal);

    window.addEventListener('close-modal', closeModal);
</script>
