<?php
use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;
state(['password' => '']);
rules(['password' => ['required', 'string', 'current_password']]);
$deleteUser = function (Logout $logout) {
    $this->validate();
    tap(Auth::user(), $logout(...))->delete();
    $this->redirect('/', navigate: true);
};
$confirmuserdeletionModal = function () {
    $this->resetErrorBag();
    $this->reset('password');
    $this->dispatch('open-modal', id: 'confirm-user-deletion');
};
$closeModal = function () {
    $this->dispatch('close-modal', id: 'confirm-user-deletion');
    // $this->resetValidation();
};
?>
{{-- <section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>
    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>
    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="deleteUser" class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>
            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                <x-text-input
                    wire:model="password"
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section> --}}
<x-filament::section>
    <x-slot name="heading">
        {{ __('Delete Account') }}
    </x-slot>
    <x-slot name="description">
        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
    </x-slot>
    <x-filament::button color="danger" wire:click="confirmuserdeletionModal">
        {{ __('Delete Account') }}
    </x-filament::button>
    <x-filament::modal width="3xl" id="confirm-user-deletion">
        <x-slot name="heading">
            {{ __('Are you sure you want to delete your account?') }}
        </x-slot>
        <x-slot name="description">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
        </x-slot>
        <form wire:submit="deleteUser" class="p-2">
            <x-filament::fieldset>
                <x-slot name="label">
                    Password
                </x-slot>
                <x-filament::input.wrapper :valid="!$errors->has('password')">
                    <x-filament::input type="password" wire:model="password" />
                </x-filament::input.wrapper>
                <x-input-error class="fi-input-wrp mt-2 text-danger-600 dark:text-danger-500" :messages="$errors->get('password')" />
            </x-filament::fieldset>
            <div class="mt-6 flex justify-end gap-x-2">
                <x-filament::button wire:click="closeModal">
                    {{ __('Cancel') }}
                </x-filament::button>
                <x-filament::button color="danger" type="submit">
                    {{ __('Delete Account') }}
                </x-filament::button>
            </div>
        </form>
    </x-filament::modal>
</x-filament::section>
