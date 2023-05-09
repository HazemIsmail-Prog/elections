<header class="sticky top-0 bg-white dark:bg-gray-800 border-b border-slate-200 dark:border-gray-700 z-30">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 -mb-px">

            <!-- Header: start side -->
            <div class="flex">
                
                <!-- Hamburger button -->
                <button
                    class="text-slate-500 hover:text-slate-600 lg:hidden"
                    @click.stop="sidebarOpen = !sidebarOpen"
                    aria-controls="sidebar"
                    :aria-expanded="sidebarOpen"
                >
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <rect x="4" y="5" width="16" height="2" />
                        <rect x="4" y="11" width="16" height="2" />
                        <rect x="4" y="17" width="16" height="2" />
                    </svg>
                </button>

            </div>

            <!-- Header: end side -->
            <div class="flex items-center space-x-3">

                <!-- Search Button with Modal -->
                {{-- <x-modal-search /> --}}

                <!-- Notifications button -->
                {{-- <x-dropdown-notifications align="end" /> --}}

                <!-- Info button -->
                {{-- <x-dropdown-help align="end" /> --}}

                <!-- Divider -->
                <hr class="w-px me-2 h-6 bg-slate-200 dark:bg-gray-600" />

                <!-- User button -->
                <x-dropdown-profile align="end" />

            </div>

        </div>
    </div>
</header>