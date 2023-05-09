@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => '
block border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:focus:border-indigo-600 dark:focus:ring-indigo-600 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 mt-1 rounded-md shadow-sm w-full
form-input w-full']) !!}>
