<nav class="bg-white dark:bg-gray-800 shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
                MyApp
            </a>

            <!-- Dropdown Menus -->
            <div class="flex items-center space-x-6">
                @foreach (['product', 'messages', 'orders'] as $section)
                    <div x-data="{ open: false }" class="relative">
                        <button
                            @click="open = !open"
                            @click.away="open = false"
                            class="text-gray-700 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium px-3 py-2 rounded-md inline-flex items-center focus:outline-none transition"
                        >
                            {{ ucfirst($section) }}
                            <svg class="ml-1 h-4 w-4 fill-current" viewBox="0 0 20 20">
                                <path d="M5.25 7L10 11.75 14.75 7H5.25z" />
                            </svg>
                        </button>

                        <!-- Dropdown -->
                        <div
                            x-show="open"
                            x-transition
                            class="absolute right-0 mt-2 w-40 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-md shadow-lg z-50"
                        >
                            <a href="{{ route($section . '.index') }}"
                               class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-600 transition">
                                Overview
                            </a>
                            <a href="{{ route($section . '.create') }}"
                               class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-600 transition">
                                Create
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</nav>
