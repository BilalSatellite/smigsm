<x-form-section submit="updatePassword">
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" value="{{ __('Current Password') }}" />
            <x-filament::input.wrapper>
                <x-filament::input id="current_password" type="password" wire:model="state.current_password"
                    autocomplete="current-password" />
            </x-filament::input.wrapper>

            <x-input-error for="current_password" class="mt-2 error-text" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password" value="{{ __('New Password') }}" />
            <x-filament::input.wrapper>
                <x-filament::input id="password" type="password" wire:model="state.password"
                    autocomplete="new-password" />
            </x-filament::input.wrapper>

            <x-input-error for="password" class="mt-2 error-text" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />

            <x-filament::input.wrapper>
                <x-filament::input id="password_confirmation" type="password" wire:model="state.password_confirmation"
                    autocomplete="new-password" />
            </x-filament::input.wrapper>
            <x-input-error for="password_confirmation" class="mt-2 error-text" />
        </div>
    </x-slot>

    <x-slot name="actions">

        <div class="flex items-center justify-end gap-4 mt-2">
            <x-action-message class="me-3" on="saved">
                <x-filament::badge>
                    {{ __('Saved.') }}
                </x-filament::badge>
            </x-action-message>
            <x-filament::button type="submit">
                {{ __('Save') }}
            </x-filament::button>
        </div>
    </x-slot>
</x-form-section>
