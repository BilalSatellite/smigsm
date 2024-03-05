<?php
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;
layout('layouts.guest');
state([
    'name' => '',
    'email' => '',
    'password' => '',
    'password_confirmation' => '',
]);
rules([
    'name' => ['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
    'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
]);
$register = function () {
    $validated = $this->validate();
    $validated['password'] = Hash::make($validated['password']);
    event(new Registered(($user = User::create($validated))));
    Auth::login($user);
    $this->redirect(RouteServiceProvider::HOME);
};
?>
<div>
    <!-- welcome to -->
    <section class="relative flex flex-col justify-center w-full h-32 bg-brandBlack/80">
        <img class="object-cover object-top w-full h-full mix-blend-overlay md:object-center" src="img/bg/contactus.jpg"
            alt="" />

    </section>
    <section class="my-4 item-container">
        <div class="flex flex-col items-center justify-center h-full">
            <h1 class="brandTitel">
                Log
                <span class="text-brandRed">On</span>
            </h1>
            <div data-aos="slide-right" class="mt-1 brandline"></div>
        </div>
        <div
            class="flex flex-col items-center justify-center mt-4 rounded-md bg-brandRed md:flex-row md:shadow-lg md:shadow-brandRed">
            <x-smi-baner />
            <div class="w-full p-10 md:w-1/2">
                <form wire:submit="register" class="p-4 border rounded-lg bg-brand100" method="POST">
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input wire:model="name" id="name" class="block w-full mt-1" type="text"
                            name="name" autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>
                    <!-- Email Address -->
                    <div class="mt-2">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input wire:model="email" id="email" class="block w-full mt-1" type="email"
                            name="email" autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div class="mt-2">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input wire:model="password" id="password" class="block w-full mt-1" type="password"
                            name="password" autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>
                    <!-- Confirm Password -->
                    <div class="mt-2">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input wire:model="password_confirmation" id="password_confirmation"
                            class="block w-full mt-1" type="password" name="password_confirmation"
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <a class="text-sm underline rounded-md text-brandBlack/90 hover:text-brandBlack focus:outline-none focus:ring-none focus:ring-offset-2 "
                            href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                        <x-primary-button class="ms-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- footer -->
    @include('layouts.include.guest.footer')
    <!-- footer END -->

</div>
