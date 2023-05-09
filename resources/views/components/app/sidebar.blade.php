<div>
    <!-- Sidebar backdrop (mobile only) -->
    <div class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true" x-cloak></div>

    <!-- Sidebar -->
    <div id="sidebar"
        class="flex flex-col absolute z-40 {{ app()->getLocale() == 'ar' ? 'dark:border-l' : 'dark:border-r' }} dark:border-gray-700 start-0 top-0 lg:static lg:start-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-gray-800 p-4 transition-all duration-200 ease-in-out"
        :class="sidebarOpen ? 'translate-x-0' : '{{ app()->getLocale() == 'ar' ? 'translate-x-64' : '-translate-x-64' }}'"
        @click.outside="sidebarOpen = false" @keydown.escape.window="sidebarOpen = false" x-cloak="lg">

        <!-- Sidebar header -->
        <div class="flex justify-between mb-10 pe-3 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-slate-500 hover:text-slate-400" @click.stop="sidebarOpen = !sidebarOpen"
                aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
            <!-- Logo -->
            <a class="block" href="{{ route('dashboard.index') }}">
                <svg width="32" height="32" viewBox="0 0 32 32">
                    <defs>
                        <linearGradient x1="28.538%" y1="20.229%" x2="100%" y2="108.156%" id="logo-a">
                            <stop stop-color="#A5B4FC" stop-opacity="0" offset="0%" />
                            <stop stop-color="#A5B4FC" offset="100%" />
                        </linearGradient>
                        <linearGradient x1="88.638%" y1="29.267%" x2="22.42%" y2="100%" id="logo-b">
                            <stop stop-color="#38BDF8" stop-opacity="0" offset="0%" />
                            <stop stop-color="#38BDF8" offset="100%" />
                        </linearGradient>
                    </defs>
                    <rect fill="#6366F1" width="32" height="32" rx="16" />
                    <path
                        d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z"
                        fill="#4F46E5" />
                    <path
                        d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z"
                        fill="url(#logo-a)" />
                    <path
                        d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z"
                        fill="url(#logo-b)" />
                </svg>
            </a>
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- Pages group -->
            <div>
                {{-- <h3 class="text-xs uppercase text-slate-500 font-semibold ps-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                        aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Pages</span>
                </h3> --}}
                <ul class="mt-3">
                    <!-- Dashboard -->
                    {{-- <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['dashboard'])) {{ 'bg-slate-900' }} @endif"
                        x-data="{ open: {{ in_array(Request::segment(1), ['dashboard']) ? 1 : 0 }} }">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['dashboard'])) {{ 'hover:text-slate-200' }} @endif"
                            href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path
                                            class="fill-current @if (in_array(Request::segment(1), ['dashboard'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-400' }} @endif"
                                            d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z" />
                                        <path
                                            class="fill-current @if (in_array(Request::segment(1), ['dashboard'])) {{ 'text-indigo-600' }}@else{{ 'text-slate-600' }} @endif"
                                            d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z" />
                                        <path
                                            class="fill-current @if (in_array(Request::segment(1), ['dashboard'])) {{ 'text-indigo-200' }}@else{{ 'text-slate-400' }} @endif"
                                            d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z" />
                                    </svg>
                                    <span
                                        class="text-sm font-medium ms-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dashboard</span>
                                </div>
                                <!-- Icon -->
                                <div
                                    class="flex shrink-0 ms-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ms-1 fill-current text-slate-400 @if (in_array(Request::segment(1), ['dashboard'])) {{ 'rotate-180' }} @endif"
                                        :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="ps-9 mt-1 @if (!in_array(Request::segment(1), ['dashboard'])) {{ 'hidden' }} @endif"
                                :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('dashboard')) {{ '!text-indigo-500' }} @endif"
                                        href="{{ route('dashboard') }}">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Main</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}

                    <!-- Messages -->
                    {{-- <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['messages'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['messages'])) {{ 'hover:text-slate-200' }} @endif"
                            href="#0">
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path
                                            class="fill-current @if (in_array(Request::segment(1), ['messages'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                            d="M14.5 7c4.695 0 8.5 3.184 8.5 7.111 0 1.597-.638 3.067-1.7 4.253V23l-4.108-2.148a10 10 0 01-2.692.37c-4.695 0-8.5-3.184-8.5-7.11C6 10.183 9.805 7 14.5 7z" />
                                        <path
                                            class="fill-current @if (in_array(Request::segment(1), ['messages'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                            d="M11 1C5.477 1 1 4.582 1 9c0 1.797.75 3.45 2 4.785V19l4.833-2.416C8.829 16.85 9.892 17 11 17c5.523 0 10-3.582 10-8s-4.477-8-10-8z" />
                                    </svg>
                                    <span
                                        class="text-sm font-medium ms-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Messages</span>
                                </div>
                                <!-- Badge -->
                                <div class="flex flex-shrink-0 ms-2">
                                    <span
                                        class="inline-flex items-center justify-center h-5 text-xs font-medium text-white bg-indigo-500 px-2 rounded">4</span>
                                </div>
                            </div>
                        </a>
                    </li> --}}




                    {{-- <h3 class="my-3 text-xs uppercase text-slate-500 font-semibold ps-3">
                        <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                            aria-hidden="true">•••</span>
                        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Hazem Pages</span>
                    </h3> --}}


                    <!-- Dashboard -->
                    @can('dashboard_menu')
                        <li
                            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (request()->routeIs('dashboard.index')) {{ 'bg-slate-900' }} @endif">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (request()->routeIs('dashboard.index')) {{ 'hover:text-slate-200' }} @endif"
                                href="{{ route('dashboard.index') }}">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path
                                            class="fill-current @if (request()->routeIs('dashboard.index')) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                            d="M16 13v4H8v-4H0l3-9h18l3 9h-8Z" />
                                        <path
                                            class="fill-current @if (request()->routeIs('dashboard.index')) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                            d="m23.72 12 .229.686A.984.984 0 0 1 24 13v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1v-8c0-.107.017-.213.051-.314L.28 12H8v4h8v-4H23.72ZM13 0v7h3l-4 5-4-5h3V0h2Z" />
                                    </svg>
                                    <span
                                        class="text-sm font-medium ms-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ __('messages.dashboard') }}</span>
                                </div>
                            </a>
                        </li>
                    @endcan



                    @canany(['roles_menu', 'permissions_menu', 'users_menu', 'voters_menu','schools_menu','providers_menu'])
                        <!-- Setting -->
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Route::current()->getName(), ['roles.index', 'permissions.index', 'users.index', 'voters.index','schools.index','providers.index'])) {{ 'bg-slate-900' }} @endif"
                            x-data="{ open: {{ in_array(Route::current()->getName(), ['roles.index', 'permissions.index', 'users.index', 'voters.index','schools.index','providers.index']) ? 1 : 0 }} }">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Route::current()->getName(), ['roles.index', 'permissions.index', 'users.index', 'voters.index','schools.index','providers.index'])) {{ 'hover:text-slate-200' }} @endif"
                                href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path
                                                class="fill-current @if (in_array(Route::current()->getName(), ['roles.index', 'permissions.index', 'users.index', 'voters.index','schools.index','providers.index'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-400' }} @endif"
                                                d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z" />
                                            <path
                                                class="fill-current @if (in_array(Route::current()->getName(), ['roles.index', 'permissions.index', 'users.index', 'voters.index','schools.index','providers.index'])) {{ 'text-indigo-600' }}@else{{ 'text-slate-600' }} @endif"
                                                d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z" />
                                            <path
                                                class="fill-current @if (in_array(Route::current()->getName(), ['roles.index', 'permissions.index', 'users.index', 'voters.index','schools.index','providers.index'])) {{ 'text-indigo-200' }}@else{{ 'text-slate-400' }} @endif"
                                                d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z" />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ms-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ __('messages.settings') }}</span>
                                    </div>
                                    <!-- Icon -->
                                    <div
                                        class="flex shrink-0 ms-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        <svg class="w-3 h-3 shrink-0 ms-1 fill-current text-slate-400 @if (in_array(Route::current()->getName(), ['roles.index', 'permissions.index', 'users.index', 'voters.index','schools.index','providers.index'])) {{ 'rotate-180' }} @endif"
                                            :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="ps-9 mt-1 @if (!in_array(Route::current()->getName(), ['roles.index', 'permissions.index', 'users.index', 'voters.index','schools.index','providers.index'])) {{ 'hidden' }} @endif"
                                    :class="open ? '!block' : 'hidden'">
                                    @can('roles_menu')
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (request()->routeIs('roles.index')) {{ '!text-indigo-500' }} @endif"
                                                href="{{ route('roles.index') }}">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ __('messages.roles') }}</span>
                                            </a>
                                        </li>
                                    @endcan
                                    {{-- @can('permissions_menu')
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (request()->routeIs('permissions.index')) {{ '!text-indigo-500' }} @endif"
                                                href="{{ route('permissions.index') }}">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ __('messages.permissions') }}</span>
                                            </a>
                                        </li>
                                    @endcan --}}
                                    @can('users_menu')
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (request()->routeIs('users.index')) {{ '!text-indigo-500' }} @endif"
                                                href="{{ route('users.index') }}">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ __('messages.users') }}</span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('schools_menu')
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (request()->routeIs('schools.index')) {{ '!text-indigo-500' }} @endif"
                                                href="{{ route('schools.index') }}">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ __('messages.schools') }}</span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('providers_menu')
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (request()->routeIs('providers.index')) {{ '!text-indigo-500' }} @endif"
                                                href="{{ route('providers.index') }}">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ __('messages.providers') }}</span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('voters_menu')
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (request()->routeIs('voters.index')) {{ '!text-indigo-500' }} @endif"
                                                href="{{ route('voters.index') }}">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ __('messages.voters') }}</span>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </div>
                        </li>
                    @endcanany



                    <!-- Voting Page -->
                    @can('voting_menu')
                        <li
                            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (request()->routeIs('voting')) {{ 'bg-slate-900' }} @endif">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (request()->routeIs('voting')) {{ 'hover:text-slate-200' }} @endif"
                                href="{{ route('voting') }}">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path
                                            class="fill-current @if (request()->routeIs('voting')) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                            d="M16 13v4H8v-4H0l3-9h18l3 9h-8Z" />
                                        <path
                                            class="fill-current @if (request()->routeIs('voting')) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                            d="m23.72 12 .229.686A.984.984 0 0 1 24 13v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1v-8c0-.107.017-.213.051-.314L.28 12H8v4h8v-4H23.72ZM13 0v7h3l-4 5-4-5h3V0h2Z" />
                                    </svg>
                                    <span
                                        class="text-sm font-medium ms-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ __('messages.voting') }}</span>
                                </div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>

        <!-- Expand / collapse button -->
        <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
            <div class="px-3 py-2">
                <button @click="sidebarExpanded = !sidebarExpanded">
                    <span class="sr-only">Expand / collapse sidebar</span>
                    <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                        <path class="text-slate-400"
                            d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z" />
                        <path class="text-slate-600" d="M3 23H1V1h2z" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</div>
