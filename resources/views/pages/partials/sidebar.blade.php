<div class="h-full">
    <button id="sidebar-toggle" type="button"
        class="fixed top-4 right-4 z-40 inline-flex items-center p-2 text-sm text-gray-700 bg-white rounded-lg shadow-sm sm:hidden hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-100 transition-colors duration-200"
        aria-expanded="false" aria-controls="default-sidebar">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="default-sidebar"
        class="fixed top-0 right-0 z-30 w-64 h-screen transform translate-x-full sm:translate-x-0 transition-transform duration-300 ease-in-out"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 border-l border-gray-200 shadow-sm">
            <h3 class="text-2xl font-bold my-3">{{ __('keywords.system_name') }}</h3>
            <ul class="overflow-y-auto space-y-2 font-medium flex flex-col h-[calc(100%-7rem)]">
                <li>
                    <a href="{{ route('home') }}" wire:navigate
                        class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-100 group transition-colors duration-200">
                        <i
                            class="fas fa-cash-register shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-700"></i>
                        <span class="ms-3">{{ __('keywords.home_page') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('calculator') }}" wire:navigate
                        class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-100 group transition-colors duration-200">
                        <i
                            class="fa-solid fa-calculator shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-700"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">{{ __('keywords.calculator') }}</span>
                    </a>
                </li>
                @can('manage_items')
                    <li>
                        <a href="{{ route('suppliers') }}" wire:navigate
                            class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-100 group transition-colors duration-200">
                            <i
                                class="fa-solid fa-truck-field shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-700"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">{{ __('keywords.suppliers') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categories') }}" wire:navigate
                            class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-100 group transition-colors duration-200">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-700"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 18 18">
                                <path
                                    d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">{{ __('keywords.categories') }}</span>
                            {{-- <span
                            class="inline-flex items-center justify-center px-2 me-3 text-sm font-medium text-blue-700 bg-blue-100 rounded-full">Pro</span> --}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('sub-categories') }}" wire:navigate
                            class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-100 group transition-colors duration-200">
                            <i
                                class="fa-solid fa-sitemap shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-700"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">{{ __('keywords.sub_categories') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products') }}" wire:navigate
                            class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-100 group transition-colors duration-200">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-700"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 18 20">
                                <path
                                    d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">{{ __('keywords.products') }}</span>
                        </a>
                    </li>
                @endcan
                @can('manage_purchases')
                    <li>
                        <a href="{{ route('purchases') }}" wire:navigate
                            class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-100 group transition-colors duration-200">
                            <i class="fa-solid fa-boxes-stacked"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">{{ __('keywords.purchases') }}</span>
                        </a>
                    </li>
                @endcan
                @can('manage_customers')
                    <li>
                        <a href="{{ route('customers') }}" wire:navigate
                            class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-100 group transition-colors duration-200">
                            <i
                                class="fa-solid fa-users shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-700"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">{{ __('keywords.customers') }}</span>
                        </a>
                    </li>
                @endcan
                @can('pay_installments')
                    <li>
                        <a href="{{ route('installment-payments') }}" wire:navigate
                            class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-100 group transition-colors duration-200">
                            <i
                                class="fas fa-file-invoice-dollar shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-700"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">{{ __('keywords.installment_payments') }}</span>
                        </a>
                    </li>
                @endcan
                @can('manage_sales')
                    <li>
                        <a href="{{ route('sales') }}" wire:navigate
                            class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-100 group transition-colors duration-200">
                            <i
                                class="fa-solid fa-receipt shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-700"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">{{ __('keywords.invoices') }}</span>
                        </a>
                    </li>
                @endcan
                @can('view_activity_logs')
                    <li>
                        <a href="{{ route('activity-logs') }}" wire:navigate
                            class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-100 group transition-colors duration-200">
                            <i
                                class="fa-solid fa-copy shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-700"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">{{ __('keywords.activity_logs') }}</span>
                        </a>
                    </li>
                @endcan
                @can('manage_users_roles')
                    <li>
                        <a href="{{ route('users') }}" wire:navigate
                            class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-100 group transition-colors duration-200">
                            <i
                                class="fas fa-user-plus shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-700"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">{{ __('keywords.users') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('roles') }}" wire:navigate
                            class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-100 group transition-colors duration-200">
                            <i
                                class="fas fa-user-tag shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-700"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">{{ __('keywords.roles') }}</span>
                        </a>
                    </li>
                @endcan
                @can('view_analytics')
                    <li>
                        <a href="{{ route('analytics') }}" wire:navigate
                            class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-100 group transition-colors duration-200">
                            <i
                                class="fas fa-chart-line shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-700"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">{{ __('keywords.analytics') }}</span>
                        </a>
                    </li>
                @endcan
            </ul>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full rounded-lg p-2 transition-colors bg-blue-500 border-blue-500 hover:bg-blue-600 text-white cursor-pointer">
                    <i class=""></i>
                    <span class="">{{ __('keywords.logout') }}</span>
                </button>
            </form>
        </div>
    </aside>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('default-sidebar');
            const toggleButton = document.getElementById('sidebar-toggle');
            let isOpen = false;

            // Toggle sidebar
            function toggleSidebar() {
                isOpen = !isOpen;
                if (isOpen) {
                    sidebar.classList.remove('translate-x-full');
                    toggleButton.style.display = 'none';
                    if (window.innerWidth < 640) {
                        document.body.style.overflow = 'hidden';
                    }
                } else {
                    sidebar.classList.add('translate-x-full');
                    toggleButton.style.display = 'flex';
                    document.body.style.overflow = '';
                }
                toggleButton.setAttribute('aria-expanded', isOpen);
            }

            // Close sidebar when clicking outside
            document.addEventListener('click', function(event) {
                const isClickInside = sidebar.contains(event.target) || toggleButton.contains(event.target);
                if (isOpen && !isClickInside && window.innerWidth < 640) {
                    toggleSidebar();
                }
            });

            // Handle window resize
            function handleResize() {
                if (window.innerWidth >= 640) {
                    sidebar.classList.remove('translate-x-full');
                    document.body.style.overflow = '';
                } else {
                    if (!isOpen) {
                        sidebar.classList.add('translate-x-full');
                    }
                    toggleButton.style.display = isOpen ? 'none' : 'flex';
                }
            }

            // Initialize
            toggleButton.addEventListener('click', toggleSidebar);
            window.addEventListener('resize', handleResize);
            handleResize(); // Initial check
        });
    </script>
</div>
