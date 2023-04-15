@props(['value'])

<label {{ $attributes->merge(['class' => 'text-md mb-1 text-gray-600']) }}>
    {{ $value ?? $slot }}
</label>
