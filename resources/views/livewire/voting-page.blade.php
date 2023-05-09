<div
    class="col-span-full xl:col-span-6 bg-white dark:bg-gray-700 shadow-lg rounded-lg border border-gray-200 dark:border-gray-700">
    <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-500 flex justify-between items-center">
        <h2 class="font-semibold text-gray-800 dark:text-white">{{ __('messages.voting') }}</h2>
    </header>

    <div class="p-3">

        <div class="flex flex-col md:flex-row justify-start gap-3">

            
            <select wire:model="selected_section" id="sections_list" class="py-1 px-6 mb-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option disabled value="">-- {{ __('messages.select_section') }} --</option>
                @foreach ($sections as $section)
                <option value="{{ $section->id }}">{{ $section->school->name }} - {{ $section->name }}</option>
                @endforeach
            </select>
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
</div>
