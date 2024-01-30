{{-- <div class="p-2">
    <div
        class="w-full p-2 text-center bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <h5 class="text-lg font-bold text-gray-900 dark:text-white">{{ $selectedCommand ?? 'Artisan Command' }}</h5>
        <p class="text-sm text-gray-600 dark:text-gray-500">
            {{ $description ?? 'This is Artisan Command for Laravel Project.' }}</p>
        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $synopsis ?? 'No Command Selected. Choose a command.' }}
        </p>
    </div>
    @if ($selectedCommand)
        <div class="mt-4">
            @if ($cmdOputput)
                <div class="grid grid-cols-1">
                    <pre style="background-color: black; overflow: auto; padding: 10px 15px; font-family: monospace;">
                    {!! $cmdOputput !!}
                    </pre>
                    <div>
                        <button type="button" wire:click="close"
                            class="text-white mt-4 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 inline-flex items-center">
                            OK
                        </button>
                    </div>
                </div>
            @else
                <form wire:submit.prevent="run">
                    @if ($arguments || $options)
                        <div
                            class="grid grid-cols-1 gap-4 p-2 m-8 border border-gray-200 rounded-md md:grid-cols-2 lg:grid-cols-3">
                            @if ($arguments)
                                
                                @foreach ($arguments as $key => $argument)
                                    <div class="flex flex-col items-start">
                                        <label for="name"
                                            class="block mb-1 text-sm font-medium text-gray-500 dark:text-gray-300 ">
                                            {{ $argument['title'] }}
                                            @if ($argument['required'])
                                                <span class="text-xs font-medium text-red-500">*</span>
                                            @endif
                                        </label>
                                        <input wire:model="argumentformData.{{ $argument['name'] }}"
                                            wire:key="{{ $argument['name'] }}" type="text"
                                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                            placeholder="{{ $argument['name'] }}">
                                        <div class="text-xs font-medium text-gray-500 dark:text-gray-300">
                                            <p>{{ $argument['description'] }}</p>
                                        </div>
                                        <div class="text-sm text-red-500 dark:text-red-500">
                                            <p>
                                                @error('argumentformData.' . $argument['name'])
                                                    {{ $message }}
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            @if ($options)
                                @foreach ($options as $option)
                                    @if ($option['accept_value'])
                                        <div class="flex flex-col items-start">
                                            <label for=" name"
                                                class="block mb-1 text-sm font-medium text-gray-500 dark:text-gray-300">
                                                {{ $option['title'] }}
                                                @if ($option['required'])
                                                    @if ($selectedCommand != 'make:controller')
                                                        <span class="text-xs font-medium text-red-500">*</span>
                                                    @endif
                                                @endif
                                            </label>
                                            <input wire:model="optionformData.{{ $option['name'] }}"
                                                wire:key="{{ $option['name'] }}" type="text"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                placeholder="{{ $option['name'] }}">
                                            <div class="text-xs font-medium text-gray-500 dark:text-gray-300">
                                                <p>{{ $option['description'] }}</p>
                                                <p>{{ $option['default'] }}</p>
                                            </div>
                                            <div class="text-sm text-red-500 dark:text-red-500">
                                                <p>
                                                    @error('optionformData.' . $option['name'])
                                                        {{ $message }}
                                                    @enderror
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        @if ($options)
                            <div
                                class="grid grid-cols-1 gap-4 p-2 m-8 border border-gray-200 rounded-md md:grid-cols-2 lg:grid-cols-3">
                                @foreach ($options as $option)
                                    @if (!$option['accept_value'])
                                        <div wire:key="{{ $option['name'] }}"
                                            class="flex p-1 border border-gray-200 rounded-md shadow-lg bg-gray-50 dark:border-gray-700 shadow-gray-400">
                                            <div class="flex items-center h-5">
                                                <input wire:model="optionformData.{{ $option['name'] }}"
                                                    id="helper-checkbox" aria-describedby="helper-checkbox-text"
                                                    type="checkbox" value=""
                                                    class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            </div>
                                            <div class="text-sm ms-2">
                                                <label for="helper-checkbox"
                                                    class="font-medium text-gray-600 dark:text-gray-300">
                                                    {{ $option['title'] }}
                                                    @if ($option['required'])
                                                        <span class="text-xs font-medium text-red-500">*</span>
                                                    @endif
                                                </label>
                                                <p id="helper-checkbox-text"
                                                    class="text-xs font-medium text-gray-500 dark:text-gray-300">
                                                    {{ $option['description'] }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    @endif
                    <div class="flex items-center justify-center mt-4 gap-y-1">
                        <button type="button" wire:click="close"
                            class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 inline-flex items-center">
                            Close
                        </button>
                        <button type="submit"
                            class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 inline-flex items-center">
                            Run
                        </button>
                    </div>
                </form>
            @endif
        </div>
    @else
        <div class="w-full">
            @foreach ($artisanlists as $key => $artisanlist)
                <div class="w-full mt-2 overflow-hidden border rounded-lg border-cyan-950 ">
                    <div class="flex items-center justify-between py-2 text-gray-200 bg-gray-600 ">
                        <p class="ml-2">{{ ucfirst($key) }}</p>
                    </div>
                    <div class="grid grid-cols-1 gap-4 m-8 md:grid-cols-3 lg:grid-cols-4">
                        @foreach ($artisanlist as $i)
                            <button wire:click="cmdclick('{{ $i }}')"
                                class="py-2.5 px-5 me-2 mb-2 text-sm font-medium shadow-lg shadow-gray-400 hover:shadow-none  transition duration-300 ease-in-out  text-gray-700 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                {{ $i }}
                            </button>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div> --}}
<x-filament::section>
    <x-slot name="heading">
        {{ $selectedCommand ?? 'Artisan Command' }}
    </x-slot>

    <x-slot name="description">
        {{ $description ?? 'This is Artisan Command for Laravel Project.' }}<br>
        {{ $synopsis ?? 'No Command Selected. Choose a command.' }}
    </x-slot>
    @if ($selectedCommand)
        @if ($cmdOputput)
            <pre style="background-color: black; overflow: auto; padding: 10px 15px; font-family: monospace; margin-bottom:10px;">
                    {!! $cmdOputput !!}
            </pre>
            <x-filament::button wire:click="close">
                OK
            </x-filament::button>
        @else
            <form wire:submit.prevent="run">
                @if ($arguments || $options)
                    <div
                        class="grid grid-cols-1 gap-4 p-2 m-8 border border-gray-200 rounded-md md:grid-cols-2 lg:grid-cols-3">
                        @if ($arguments)

                            @foreach ($arguments as $key => $argument)
                                <div class="flex flex-col items-start">

                                    <label for="name"
                                        class="block mb-1 text-sm font-medium text-gray-500 dark:text-gray-300 ">
                                        {{ $argument['title'] }}
                                        @if ($argument['required'])
                                            <span class="text-xs font-medium text-red-500">*</span>
                                        @endif
                                    </label>
                                    {{--  <input wire:model="argumentformData.{{ $argument['name'] }}"
                                        wire:key="{{ $argument['name'] }}" type="text"
                                        class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="{{ $argument['name'] }}"> --}}
                                    <x-filament::input.wrapper>

                                        <x-filament::input type="text"
                                            wire:model="argumentformData.{{ $argument['name'] }}"
                                            wire:key="{{ $argument['name'] }}" />
                                    </x-filament::input.wrapper>
                                    <div class="text-xs font-medium text-gray-500 dark:text-gray-300">
                                        <p>{{ $argument['description'] }}</p>
                                    </div>
                                    <div class="text-sm text-red-500 dark:text-red-500">
                                        <p>
                                            @error('argumentformData.' . $argument['name'])
                                                {{ $message }}
                                            @enderror
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if ($options)
                            @foreach ($options as $option)
                                @if ($option['accept_value'])
                                    <div class="flex flex-col items-start">
                                        <label for=" name"
                                            class="block mb-1 text-sm font-medium text-gray-500 dark:text-gray-300">
                                            {{ $option['title'] }}
                                            @if ($option['required'])
                                                @if ($selectedCommand != 'make:controller')
                                                    <span class="text-xs font-medium text-red-500">*</span>
                                                @endif
                                            @endif
                                        </label>
                                        <input wire:model="optionformData.{{ $option['name'] }}"
                                            wire:key="{{ $option['name'] }}" type="text"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                            placeholder="{{ $option['name'] }}">
                                        <div class="text-xs font-medium text-gray-500 dark:text-gray-300">
                                            <p>{{ $option['description'] }}</p>
                                            <p>{{ $option['default'] }}</p>
                                        </div>
                                        <div class="text-sm text-red-500 dark:text-red-500">
                                            <p>
                                                @error('optionformData.' . $option['name'])
                                                    {{ $message }}
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                    @if ($options)
                        <div
                            class="grid grid-cols-1 gap-4 p-2 m-8 border border-gray-200 rounded-md md:grid-cols-2 lg:grid-cols-3">
                            @foreach ($options as $option)
                                @if (!$option['accept_value'])
                                    <div wire:key="{{ $option['name'] }}"
                                        class="flex p-1 border border-gray-200 rounded-md shadow-lg bg-gray-50 dark:border-gray-700 shadow-gray-400">
                                        <div class="flex items-center h-5">
                                            <input wire:model="optionformData.{{ $option['name'] }}"
                                                id="helper-checkbox" aria-describedby="helper-checkbox-text"
                                                type="checkbox" value=""
                                                class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        </div>
                                        <div class="text-sm ms-2">
                                            <label for="helper-checkbox"
                                                class="font-medium text-gray-600 dark:text-gray-300">
                                                {{ $option['title'] }}
                                                @if ($option['required'])
                                                    <span class="text-xs font-medium text-red-500">*</span>
                                                @endif
                                            </label>
                                            <p id="helper-checkbox-text"
                                                class="text-xs font-medium text-gray-500 dark:text-gray-300">
                                                {{ $option['description'] }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                @endif
                <div class="flex items-center justify-center mt-4 gap-y-1">
                    <button type="button" wire:click="close"
                        class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 inline-flex items-center">
                        Close
                    </button>
                    <button type="submit"
                        class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 inline-flex items-center">
                        Run
                    </button>
                </div>
            </form>
        @endif
    @else
        @foreach ($artisanlists as $key => $artisanlist)
            <x-filament::fieldset class="mt-10">
                <x-slot name="label">
                    {{ $key }}
                </x-slot>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3 lg:grid-cols-4">
                    @foreach ($artisanlist as $i)
                        <x-filament::button wire:click="cmdclick('{{ $i }}')" color="gray">
                            {{ $i }}
                        </x-filament::button>
                    @endforeach
                </div>
            </x-filament::fieldset>
        @endforeach

    @endif


</x-filament::section>
