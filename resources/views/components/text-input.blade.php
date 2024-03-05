@props(['disabled' => false, 'type' => 'text', 'name', 'placeholder' => '', 'id'])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'rounded-lg border border-brandRed bg-brand50 p-2.5 text-sm text-brand900 placeholder-brand700 shadow-md shadow-brandRed focus:border-brandRed focus:ring-brandRed',
    'type' => $type,
    'name' => $name,
    'id' => $name,
    'placeholder' => $placeholder ? '' : '',
]) !!}>
