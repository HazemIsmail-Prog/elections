    <div class="p-3" wire:poll>

        <div class="flex flex-col md:flex-row justify-start gap-3">
            <x-text-input wire:model="search" class="py-1 px-3 mb-3" type="text"
            placeholder="{{ __('messages.search') }}" />
            
        </div>
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <!-- Table header -->
                <thead
                    class="text-xs font-semibold uppercase text-gray-400 dark:text-gray-800 bg-gray-50 dark:bg-gray-400">
                    <tr>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-start px-6">{{ __('messages.name') }}</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-end px-6">{{ __('messages.status') }}</div>
                        </th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm divide-y divide-gray-100 dark:divide-gray-500 dark:text-white">
                    @foreach ($voters as $voter)
                        <tr
                            class=" text-center transition duration-300 ease-in-out hover:bg-neutral-100 dark:hover:bg-gray-600">
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-start px-6">{{ $voter->name }}</div>
                            </td>
                            <td class="text-end px-6 py-4">
                                @if ($voter->vote_date_time)
                                    <button wire:click="unvote({{ $voter }})"
                                        class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $voter->vote_date_time->format('H:i') }}</button>
                                @else
                                    <button wire:click="vote({{ $voter }})"
                                        class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ __('messages.vote') }}</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-2">{{ $voters->links() }}</div>
    </div>