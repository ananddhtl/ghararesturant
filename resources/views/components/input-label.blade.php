@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-white-700 dark:text-white-300']) }} style="color:white">
    {{ $value ?? $slot }}
</label>
