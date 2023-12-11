@props(['value'])
<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-white dark:text-gray-white']) }}>
    {{ $value ?? $slot }}
</label>
