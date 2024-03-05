@props(['label', 'name', 'id', 'textcolor' => 'brandBlack'])
<label class="flex items-center">
    <input type="checkbox" {!! $attributes->merge([
        'class' => 'w-5 h-5 text-brandRed  border-brandRed rounded focus:ring-brandRed/70  focus:none ',
        'name' => $name,
        'id' => $name,
    ]) !!}>
    <span class="ml-1  text-md {{ $textcolor }}">{{ ucfirst($label) }}</span>
</label>
