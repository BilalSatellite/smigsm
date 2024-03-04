@props(['label', 'for'])
<label for="{{ $for }}" class="inline-flex items-center">
    <input id="{{ $for }}" type="checkbox" {!! $attributes->merge([
        'class' => 'text-brandRed border-brandRed/70 rounded shadow-sm focus:ring-brandRed/90 ring-offset-zinc-800"',
    ]) !!} name="{{ $for }}">
    <span class="text-sm text-brandBlack ms-2">{{ $label }}</span>
</label>
