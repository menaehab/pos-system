<div class="container mx-auto p-4" dir="rtl">
    <div class="mb-4">
        <label for="month" class="block text-2xl font-medium text-gray-700">{{ __('keywords.select_month') }}</label>
        <input type="month" id="month" wire:model.live="selectedMonth"
            class="mt-1 block w-full pl-3 pr-10 py-2 text-xl border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 rounded-md">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-right">
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="mr-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                {{ __('keywords.total_sales') }}
                            </dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">
                                    {{ number_format($salesTotal, 2) }} {{ __('keywords.pound') }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                    <div class="flex-shrink-0">
                        <!-- Heroicon name: scale -->
                        <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 6l3 1m0 0l-3 9a2 2 0 002 2h10a2 2 0 002-2l3-9m-9.5 4.5l.5-3m0 0l.5 3m-1 0a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="mr-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                {{ __('keywords.total_purchases') }}
                            </dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">
                                    {{ number_format($purchasesTotal, 2) }} {{ __('keywords.pound') }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                    <div class="flex-shrink-0">
                        <!-- Heroicon name: shopping-cart -->
                        <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="mr-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                {{ __('keywords.total_payments') }}
                            </dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">
                                    {{ number_format($paymentsTotal, 2) }} {{ __('keywords.pound') }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                    <div class="flex-shrink-0">
                        <!-- Heroicon name: cash -->
                        <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 2h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 bg-white overflow-hidden shadow rounded-lg p-5">
        <div x-data="chart()" @update-chart.window="updateChart($event.detail[0])">
            <div x-ref="chart" wire:ignore></div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('chart', () => ({
                chart: null,
                init() {
                    const options = {
                        chart: {
                            type: 'bar',
                            height: 350,
                            toolbar: {
                                show: false
                            }
                        },
                        series: [{
                                name: '{{ __('keywords.total_sales') }}',
                                data: []
                            },
                            {
                                name: '{{ __('keywords.total_purchases') }}',
                                data: []
                            },
                            {
                                name: '{{ __('keywords.total_payments') }}',
                                data: []
                            }
                        ],
                        xaxis: {
                            categories: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو',
                                'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'
                            ]
                        },
                        dataLabels: {
                            enabled: false
                        },
                        tooltip: {
                            y: {
                                formatter: (val) => `${val} {{ __('keywords.pound') }}`
                            }
                        }
                    };
                    this.chart = new ApexCharts(this.$refs.chart, options);
                    this.chart.render();
                    this.$wire.dispatch('loadChartData');
                },
                processData(rawData) {
                    let result = Array(12).fill(0);
                    if (Array.isArray(rawData)) {
                        rawData.forEach(item => {
                            result[item.month - 1] = parseFloat(item.total);
                        });
                    }
                    return result;
                },
                updateChart(data) {
                    this.chart.updateSeries([{
                            name: '{{ __('keywords.total_sales') }}',
                            data: this.processData(data.sales)
                        },
                        {
                            name: '{{ __('keywords.total_purchases') }}',
                            data: this.processData(data.purchases)
                        },
                        {
                            name: '{{ __('keywords.total_payments') }}',
                            data: this.processData(data.payments)
                        }
                    ]);
                }
            }));
        });
    </script>
</div>
