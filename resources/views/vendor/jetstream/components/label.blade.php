@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm font-medium mb-1 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
