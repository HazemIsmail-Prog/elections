<div class="px-2 sm:px-6 lg:px-8 py-2 w-full max-w-9xl mx-auto">

    <!-- Cards -->
    <div class="grid grid-cols-12 gap-6">

        <div
            class="col-span-full xl:col-span-6 bg-white dark:bg-gray-700 dark:border-gray-600 rounded-lg shadow-lg border border-gray-200 ">
            <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-600">
                <h2 class="font-semibold text-gray-800 dark:text-white">{{ __('messages.voting_results') }}</h2>
            </header>
            <div class="p-3 overflow-auto">
                <!-- Table -->
                <table wire:poll=refresh class="table-auto w-full">
                    <!-- Table header -->
                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-start">{{ __('messages.total') }}</th>
                            <th class="px-6 py-4 font-bold">{{ $voters['total'] }}</th>
                            <th class="px-6 py-4 text-green-500 font-bold">{{ $voters['voted'] }}</th>
                            <th class="px-6 py-4 text-red-500 font-bold">{{ $voters['nonvoted'] }}</th>
                        </tr>
                        <tr>
                            <th class="p-2">
                                <div class="font-semibold text-start">{{ __('messages.providers') }}</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">{{ __('messages.total_voters') }}</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">{{ __('messages.voted') }}</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">{{ __('messages.unvoted') }}</div>
                            </th>
                        </tr>
                    </thead>
                    <!-- Table body -->
                    <tbody class="text-sm divide-y divide-gray-100 dark:divide-gray-600 max-h-96 overflow-auto">
                        @foreach ($providers as $provider)
                            <tr class="transition duration-300 ease-in-out hover:bg-neutral-100 dark:hover:bg-gray-600">
                                <td class="p-2">
                                    <div class="font-medium text-gray-800 dark:text-white">
                                        <div>{{ $provider->name }}</div>
                                        <div>{{ $provider->phone }}</div>
                                    </div>
                                </td>
                                <td class="p-2">
                                    <div class="text-center dark:text-white">{{ $provider->voters_count }}</div>
                                </td>
                                <td class="p-2">
                                    <div class="text-center font-medium text-green-500">
                                        {{ $provider->voted_voters_count }}</div>
                                </td>
                                <td class="p-2">
                                    <div class="text-center font-medium text-red-500">
                                        {{ $provider->nonvoted_voters_count }}</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
