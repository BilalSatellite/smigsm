<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'mr-3 border border-brandRed rounded-lg bg-brandRed px-5 py-2.5 text-center text-sm font-medium text-red-100 shadow-md shadow-brandRed hover:bg-brandRed/10 hover:text-brandRed focus:outline-none focus:ring-4 focus:ring-brandRed/70 md:mr-0']) }}>
    {{ $slot }}
</button>

{{-- inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 --}}
