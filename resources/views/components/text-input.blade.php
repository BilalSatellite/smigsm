@props(['disabled' => false, 'type'])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'rounded-lg border border-brandRed bg-brand50 p-2.5 text-sm text-brand900 placeholder-brand700 shadow-md shadow-brandRed focus:border-brandRed focus:ring-brandRed',
]) !!}>
{{-- <input type="text" id="success"
              class="block w-full rounded-lg border border-brandRed bg-brand50 p-2.5 text-sm text-brand900 placeholder-brand700 shadow-md shadow-brandRed focus:border-brandRed focus:ring-brandRed"
              placeholder="Enter Your name" /> --}}
{{-- border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm --}}
