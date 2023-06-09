<div
    class="col-span-full xl:col-span-6 bg-white dark:bg-gray-700 shadow-lg rounded-lg border border-gray-200 dark:border-gray-700">
    <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-500 flex justify-between items-center">
        <h2 class="font-semibold text-gray-800 dark:text-white">{{ __('messages.users') }}</h2>
        @can('users_create')
            <x-primary-button x-data="{}" x-on:click="window.livewire.emitTo('user-form','showModal',null)">
                {{ __('messages.add_user') }}</x-primary-button>
        @endcan
    </header>
    <div class="p-3">

        @livewire('user-form')
        <x-text-input wire:model="search" class="py-1 px-3 mb-3 me-auto" type="text"
            placeholder="{{ __('messages.search') }}" />
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <!-- Table header -->
                <thead
                    class="text-xs font-semibold uppercase text-gray-400 dark:text-gray-800 bg-gray-50 dark:bg-gray-400">
                    <tr>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-start">{{ __('messages.id') }}</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-start">{{ __('messages.name') }}</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-start">{{ __('messages.username') }}</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">{{ __('messages.status') }}</div>
                        </th>
                        <th class="p-2 whitespace-nowrap"></th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm divide-y divide-gray-100 dark:divide-gray-500 dark:text-white">
                    @foreach ($users as $user)
                        <tr
                            class=" text-center transition duration-300 ease-in-out hover:bg-neutral-100 dark:hover:bg-gray-600">
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-start">{{ $user->id }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 shrink-0 me-2 sm:me-3">
                                        <img class="rounded-full"
                                            src="{{ 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&color=7F9CF5&background=EBF4FF' }}"
                                            width="40" height="40" alt="Alex Shatov" />
                                    </div>
                                    <div class="font-medium text-gray-800 dark:text-gray-200">{{ $user->name }}</div>
                                </div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-start">{{ $user->username }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-center">
                                    @if ($user->active)
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ __('messages.active') }}</span>
                                    @else
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ __('messages.inactive') }}</span>
                                    @endif
                                </div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-lg text-center">
                                    <div class="flex gap-3 justify-end">
                                        @can('users_edit')
                                            <button x-data="{}"
                                                x-on:click="window.livewire.emitTo('user-form','showModal',{{ $user }})">
                                                <x-svgs.edit />
                                            </button>
                                        @endcan
                                        @can('users_delete')
                                            <button onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                                wire:click="delete({{ $user }})" class="text-red-400">
                                                <x-svgs.trash />
                                            </button>
                                        @endcan
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4">{{ $users->links() }}</div>
    </div>
</div>
