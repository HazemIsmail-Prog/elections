<x-modal wire:model="showModal" name="user" maxWidth="2xl">
    <form method="post" wire:submit.prevent="save">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    {{ $modalTitle }}
                </h3>
            </div>
            <!-- Modal body -->
            <div class="p-4 space-y-4">
                <div>
                    {{-- <x-input-label for="name" :value="__('Name')" /> --}}
                    <x-text-input placeholder="{{ __('الاسم') }}" wire:model="user.name" type="text"
                        class="mt-1 block w-full" autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('user.name')" />
                </div>

                <div>
                    {{-- <x-input-label for="username" :value="__('Username')" /> --}}
                    <x-text-input placeholder="{{ __('الرقم المدني') }}" wire:model="user.username" type="text"
                        class="mt-1 block w-full" autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('user.username')" />
                </div>

                <div>
                    {{-- <x-input-label for="email" :value="__('Email')" /> --}}
                    <x-text-input placeholder="{{ __('الايميل') }}" wire:model="user.email" type="email"
                        class="mt-1 block w-full" autocomplete="email" />
                    <x-input-error class="mt-2" :messages="$errors->get('user.email')" />
                </div>
                <div>
                    {{-- <x-input-label for="password" :value="__('Password')" /> --}}
                    <x-text-input placeholder="{{ __('كلمة المرور') }}" wire:model="user.password" type="password"
                        class="mt-1 block w-full" autocomplete="password" />
                    <x-input-error class="mt-2" :messages="$errors->get('user.password')" />
                </div>
                <div class="flex items-center">
                    <input checked id="checked-checkbox" type="checkbox" wire:model="user.active"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('نشط') }}</label>
                </div>

                <div wire:ignore id="rolesList" class=" border rounded p-2 dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">{{ __('الأدوار') }}</h3>
                    @foreach ($roles as $role)
                        <div class="flex items-center">
                            <input id="role{{ $role->id }}" type="checkbox" value="{{ $role->id }}"
                                wire:model="selected_roles"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="role{{ $role->id }}"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $role->name }}</label>
                        </div>
                    @endforeach
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('selected_roles')" />




                <div wire:ignore id="sectionsList" class=" border rounded p-2 dark:border-gray-600 overflow-hidden">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">{{ __('اللجان') }}</h3>
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-left text-sm font-light">
                                    <thead class="border-b font-medium dark:border-gray-700">
                                        <tr class=" text-center">
                                            <th scope="col" class="px-2 py-4 text-center">{{ __('المقر') }}</th>
                                            <th scope="col" class="px-2 py-4 text-center">{{ __('لجنة 1') }}</th>
                                            <th scope="col" class="px-2 py-4 text-center">{{ __('لجنة 2') }}</th>
                                            <th scope="col" class="px-2 py-4 text-center">{{ __('لجنة 3') }}</th>
                                            <th scope="col" class="px-2 py-4 text-center">{{ __('لجنة 4') }}</th>
                                            <th scope="col" class="px-2 py-4 text-center">{{ __('لجنة 5') }}</th>
                                            <th scope="col" class="px-2 py-4 text-center">{{ __('لجنة 6') }}</th>
                                            <th scope="col" class="px-2 py-4 text-center">{{ __('لجنة 7') }}</th>
                                        </tr>
                                    </thead>
                                    @foreach ($schools as $school)
                                        <tr
                                            class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-gray-700 dark:hover:bg-neutral-600">
                                            <td class="whitespace-nowrap px-2 py-4 text-start">{{ $school->name }}</td>
                                            @foreach ($school->sections as $section)
                                                <td class="whitespace-nowrap px-2 py-4 text-center">
                                                    <input id="section{{ $section->id }}" type="checkbox"
                                                        value="{{ $section->id }}" wire:model="selected_sections"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('selected_sections')" />
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 space-x-1 border-t border-gray-200 rounded-b dark:border-gray-600">
                <x-primary-button type="submit">{{ __('حفظ') }}</x-primary-button>
                <x-secondary-button wire:click="$set('showModal',false)"
                    class=" dark:text-red-400 text-red-400 border-none shadow-none dark:bg-transparent">
                    {{ __('تراجع') }}
                </x-secondary-button>
            </div>
        </div>
    </form>
</x-modal>
