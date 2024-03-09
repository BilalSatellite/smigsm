@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm font-medium text-brand800']) }}>
    {{ $value ?? $slot }}
</label>
