<div class="container mx-auto px-4 py-6">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">
                    {{ __('keywords.activity_log_details') }}
                </h2>
                <a href="{{ route('activity-logs') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                    {{ __('keywords.back') }}
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="p-6">
            <!-- Log Summary -->
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mb-6">
                <div class="flex items-center">
                    <div
                        class="flex-shrink-0 ml-4 h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                        <svg class="h-6 w-6 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                            {{ $activity->description }}
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">
                            {{ $activity->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Details Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Performed By -->
                <div class="bg-white dark:bg-gray-700 shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6 bg-gray-50 dark:bg-gray-800">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white">
                            {{ __('keywords.performed_by') }}
                        </h3>
                    </div>
                    <div class="border-t border-gray-200 dark:border-gray-600 px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="text-sm text-gray-900 dark:text-white">
                                {{ $activity->causer->name ?? 'System' }}
                                <p class="text-gray-500 dark:text-gray-400">
                                    {{ $activity->causer->email ?? 'system@example.com' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Subject -->
                <div class="bg-white dark:bg-gray-700 shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6 bg-gray-50 dark:bg-gray-800">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white">
                            {{ __('keywords.subject') }}
                        </h3>
                    </div>
                    <div class="border-t border-gray-200 dark:border-gray-600 px-4 py-5 sm:p-6">
                        <p class="text-lg text-gray-900 dark:text-white">
                            {{ __('keywords.' . strtolower(class_basename($activity->subject_type))) }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Properties -->
            <div class="bg-white dark:bg-gray-700 shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6 bg-gray-50 dark:bg-gray-800">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white">
                        {{ __('keywords.properties') }}
                    </h3>
                </div>
                <div class="bg-white dark:bg-gray-700 overflow-hidden">
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        {{ __('keywords.property') }}
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        {{ __('keywords.value') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                                @foreach ($activity->properties as $key => $value)
                                    <tr>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                            {{ __('keywords.' . $key) }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            {{ $value }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
