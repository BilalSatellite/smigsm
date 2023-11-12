<?php
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use function Livewire\Volt\state;
state([
    'name' => fn() => auth()->user()->name,
    'email' => fn() => auth()->user()->email,
]);
$updateProfileInformation = function () {
    $user = Auth::user();
    $validated = $this->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
    ]);
    $user->fill($validated);
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }
    $user->save();
    $this->dispatch('profile-updated', name: $user->name);
};
$sendVerification = function () {
    $user = Auth::user();
    if ($user->hasVerifiedEmail()) {
        $path = session('url.intended', RouteServiceProvider::HOME);
        $this->redirect($path);
        return;
    }
    $user->sendEmailVerificationNotification();
    Session::flash('status', 'verification-link-sent');
};
?>
{{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>
    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" required
                autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-full"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
            @if (auth()->user() instanceof MustVerifyEmail &&
    !auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}
                        <button wire:click.prevent="sendVerification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section> --}}
<x-filament::section>
    <x-slot name="heading">
        {{ __('Profile Information') }}
    </x-slot>
    <x-slot name="description">
        {{ __("Update your account's profile information and email address.") }}
    </x-slot>
    <form wire:submit="updateProfileInformation">
        <x-filament::fieldset>
            <x-slot name="label">
                Name
            </x-slot>
            <x-filament::input.wrapper :valid="!$errors->has('name')">
                <x-filament::input type="text" wire:model="name" />
            </x-filament::input.wrapper>
            <x-input-error class="fi-input-wrp mt-2 text-danger-600 dark:text-danger-500" :messages="$errors->get('name')" />
        </x-filament::fieldset>
        <x-filament::fieldset>
            <x-slot name="label">
                Email
            </x-slot>
            <x-filament::input.wrapper :valid="!$errors->has('email')">
                <x-filament::input type="email" wire:model="email" />
            </x-filament::input.wrapper>
            <x-input-error class="fi-input-wrp mt-2 text-danger-600 dark:text-danger-500" :messages="$errors->get('email')" />
            @if (auth()->user() instanceof MustVerifyEmail &&
                    !auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}
                        <button wire:click.prevent="sendVerification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </x-filament::fieldset>
        <div class="flex justify-end items-center mt-2 gap-4">
            <x-action-message class="me-3" on="profile-updated">
                <x-filament::badge>
                    {{ __('Saved.') }}
                </x-filament::badge>
            </x-action-message>
            <x-filament::button type="submit">
                {{ __('Save') }}
            </x-filament::button>
        </div>
    </form>
</x-filament::section>
