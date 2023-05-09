<div
    class="col-span-full xl:col-span-6 bg-white dark:bg-gray-700 shadow-lg rounded-lg border border-gray-200 dark:border-gray-700">
    <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-500 flex justify-between items-center">
        <h2 class="font-semibold text-gray-800 dark:text-white">{{ __('messages.permissions') }}</h2>
        @can('permissions_create')
            <x-primary-button x-data="{}" x-on:click="window.livewire.emitTo('permission-form','showModal',null)">
                {{ __('messages.add_permission') }}</x-primary-button>
        @endcan
    </header>
    <div class="p-3">

        @livewire('permission-form')
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
                            <div class="font-semibold text-start">{{ __('messages.description') }}</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-start">{{ __('messages.section') }}</div>
                        </th>
                        <th class="p-2 whitespace-nowrap"></th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm divide-y divide-gray-100 dark:divide-gray-500 dark:text-white">
                    @foreach ($permissions as $permission)
                        <tr class=" text-center transition duration-300 ease-in-out hover:bg-neutral-100 dark:hover:bg-gray-600">
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-start">{{ $permission->id }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 shrink-0 me-2 sm:me-3">
                                        <img class="rounded-full"
                                            src="{{ 'https://ui-avatars.com/api/?name=' . urlencode($permission->description) . '&color=7F9CF5&background=EBF4FF' }}"
                                            width="40" height="40" alt="Alex Shatov" />
                                    </div>
                                    <div class="font-medium text-gray-800 dark:text-gray-200">{{ $permission->name }}</div>
                                </div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-start">{{ $permission->description }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-start">{{ $permission->section_name }}</div>
                            </td>

                            <td class="p-2 whitespace-nowrap">
                                <div class="text-lg text-center">
                                    <div class="flex gap-3 justify-end">
                                        @can('permissions_edit')
                                            <button x-data="{}"
                                                x-on:click="window.livewire.emitTo('permission-form','showModal',{{ $permission }})">
                                                <x-svgs.edit />
                                            </button>
                                        @endcan
                                        @can('permissions_delete')
                                            <button onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                                wire:click="delete({{ $permission }})" class="text-red-400">
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
        <div class="px-6 py-4">{{ $permissions->links() }}</div>
    </div>
</div>
