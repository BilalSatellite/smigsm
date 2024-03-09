<div>
    <x-filament::section>
        <x-slot name="heading">
            {{ $selectedCommand ?? 'Artisan Command' }}
        </x-slot>
        <x-slot name="description">
            {{ $description ?? 'This is Artisan Command for Laravel Project.' }}<br>
        </x-slot>
        {{ $synopsis ?? 'No Command Selected. Choose a command.' }}
    </x-filament::section>
    @if ($selectedCommand)
        @if ($cmdOputput)
            <pre style="background-color: black; overflow: auto; padding: 10px 15px; font-family: monospace; margin-bottom:10px;">
                    {!! $cmdOputput !!}
            </pre>
            <div class="flex items-center justify-center mt-2 gap-x-2">
                <x-filament::button wire:click="close">
                    OK
                </x-filament::button>
            </div>
        @else
            <form wire:submit.prevent="run" class="mt-2">
                @if ($arguments || $options)
                    <x-filament::fieldset>
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            @if ($arguments)
                                @foreach ($arguments as $key => $argument)
                                    <div class="flex flex-col items-start">
                                        <label for="name"
                                            class="block mb-1 text-sm font-medium text-gray-900 ">
                                            {{ $argument['title'] }}
                                            @if ($argument['required'])
                                                <span class="font-medium error-text">*</span>
                                            @endif
                                        </label>
                                        <div>
                                            <x-filament::input.wrapper :valid="!$errors->has('argumentformData.' . $argument['name'])">
                                                <x-filament::input type="text"
                                                    wire:model="argumentformData.{{ $argument['name'] }}"
                                                    wire:key="{{ $argument['name'] }}" />
                                            </x-filament::input.wrapper>
                                        </div>
                                        @if (!$errors->has('argumentformData.' . $argument['name']))
                                            <div class="text-xs font-medium text-gray-500">
                                                <p class="mt-1">{{ $argument['description'] }}</p>
                                            </div>
                                        @else
                                            <div>
                                                <p class="mt-1 error-text">
                                                    @error('argumentformData.' . $argument['name'])
                                                        {{ $message }}
                                                    @enderror
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            @endif
                            @if ($options)
                                @foreach ($options as $option)
                                    @if ($option['accept_value'])
                                        <div class="flex flex-col items-start">
                                            <label for=" name"
                                                class="block mb-1 text-sm font-medium text-gray-900">
                                                {{ $option['title'] }}
                                                @if ($option['required'])
                                                    @if ($selectedCommand != 'make:controller')
                                                        <span class="font-medium error-text">*</span>
                                                    @endif
                                                @endif
                                            </label>
                                            <x-filament::input.wrapper>
                                                <x-filament::input type="text"
                                                    wire:model="optionformData.{{ $option['name'] }}"
                                                    wire:key="optionformData.{{ $option['name'] }}" />
                                            </x-filament::input.wrapper>
                                            @if (!$errors->has('optionformData.' . $option['name']))
                                                <div class="text-xs font-medium text-gray-500">
                                                    <p class="mt-1">{{ $option['description'] }}</p>
                                                </div>
                                            @else
                                                <div>
                                                    <p class="mt-1 error-text">
                                                        @error('optionformData.' . $option['name'])
                                                            {{ $message }}
                                                        @enderror
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </x-filament::fieldset>
                    @if ($options)
                        <x-filament::fieldset class="mt-2">
                            <div class="grid grid-cols-1 gap-2 md:grid-cols-3">
                                @foreach ($options as $option)
                                    @if (!$option['accept_value'])
                                        <div wire:key="{{ $option['name'] }}"
                                            class="flex p-2 border border-gray-600 rounded-md gap-x-2">
                                            <div>
                                                <x-filament::input.checkbox
                                                    wire:model="optionformData.{{ $option['name'] }}" />
                                            </div>
                                            <div class="">
                                                <label for="helper-checkbox"
                                                    class="ml-2 text-sm font-medium text-gray-900">
                                                    {{ $option['title'] }}
                                                    @if ($option['required'])
                                                        <span class="text-xs font-medium text-red-500">*</span>
                                                    @endif
                                                </label>
                                                <p id="helper-checkbox-text"
                                                    class="text-xs font-medium text-gray-500">
                                                    {{ $option['description'] }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </x-filament::fieldset>
                    @endif
                @endif
                <div class="flex items-center justify-center mt-2 gap-x-2">
                    <div>
                        <x-filament::button color="gray" wire:click="close">
                            Close
                        </x-filament::button>
                    </div>
                    <div>
                        <x-filament::button type="submit">
                            Run
                        </x-filament::button>
                    </div>
                </div>
            </form>
        @endif
    @else
        @foreach ($artisanlists as $key => $artisanlist)
            <x-filament::fieldset class="mt-2">
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
</div>
