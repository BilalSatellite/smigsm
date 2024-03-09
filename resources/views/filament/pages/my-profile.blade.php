{{-- Profile Information --}}
<x-filament-panels::page>
    <x-filament::section>
        <x-slot name="heading">
            Profile Information
        </x-slot>
        <x-slot name="description">
            Update your account\'s profile information and email address.
        </x-slot>
        @livewire('profile.update-profile-information-form')
    </x-filament::section>
    {{-- Update Password --}}
    <x-filament::section>
        <x-slot name="heading">
            Update Password
        </x-slot>
        <x-slot name="description">
            Ensure your account is using a long, random password to stay secure.
        </x-slot>
        @livewire('profile.update-password-form')
    </x-filament::section>
    {{-- Two Factor Authentication --}}
    <x-filament::section>
        <x-slot name="heading">
            Two Factor Authentication
        </x-slot>
        <x-slot name="description">
            Add additional security to your account using two factor authentication.
        </x-slot>
        @livewire('profile.two-factor-authentication-form')
    </x-filament::section>
    {{-- Browser Sessions --}}
    <x-filament::section>
        <x-slot name="heading">
            Browser Sessions
        </x-slot>
        <x-slot name="description">
            Manage and log out your active sessions on other browsers and devices.
        </x-slot>
        @livewire('profile.logout-other-browser-sessions-form')
    </x-filament::section>
    {{-- Browser Sessions --}}
    <x-filament::section>
        <x-slot name="heading">
            Browser Sessions
        </x-slot>
        <x-slot name="description">
            Manage and log out your active sessions on other browsers and devices.
        </x-slot>
        @livewire('profile.delete-user-form')
    </x-filament::section>
</x-filament-panels::page>
