<div x-data="barcodeScanner">
    {{ $slot }}
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('barcodeScanner', () => ({
                buffer: '',
                lastKeyTime: Date.now(),
                timeout: null,

                init() {
                    document.addEventListener('keydown', (e) => {
                        if (e.key === 'Enter') {
                            e.preventDefault();
                            e.stopPropagation();
                            return;
                        }

                        const currentTime = Date.now();
                        const timeDiff = currentTime - this.lastKeyTime;
                        this.lastKeyTime = currentTime;

                        if (e.key.length === 1) {
                            if (timeDiff < 50) {
                                this.buffer += e.key;
                            } else {
                                this.buffer = e.key;
                            }

                            clearTimeout(this.timeout);
                            this.timeout = setTimeout(() => {
                                if (this.buffer.length >= 6) {
                                    const barcode = this.buffer.trim();
                                    this.$refs.barcodeInput.value = barcode;

                                    const component = Livewire.find(this.$root.closest(
                                        '[wire\\:id]').getAttribute('wire:id'));
                                    component.set('barcode', barcode);

                                    this.buffer = '';
                                }
                            }, 100);
                        }
                    });
                },
            }));
        });
    </script>
</div>
