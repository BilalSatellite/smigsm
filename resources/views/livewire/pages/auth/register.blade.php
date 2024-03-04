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
    <section class="relative flex flex-col justify-center w-full h-72 bg-brandBlack/80">
        <img class="object-cover object-top w-full h-full mix-blend-overlay md:object-center" src="img/bg/contactus.jpg"
            alt="" />
        <div class="absolute inset-0">
            <div class="flex flex-col items-center justify-center h-full">
                <h2 class="text-center text-3xl font-bold text-brand50 [text-shadow:_0_2px_0_rgb(255_0_0_/_90%)] md:text-4xl lg:text-5xl"
                    data-aos="fade" data-aos-offset="0" data-aos-duration="1000">
                    Register
                </h2>
            </div>
        </div>
    </section>
    <form wire:submit="register">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" class="block w-full mt-1" type="text" name="name"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block w-full mt-1" type="email" name="email"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="password" id="password" class="block w-full mt-1" type="password" name="password"
                required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block w-full mt-1"
                type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <!-- footer -->
    @include('layouts.include.guest.footer')
    <!-- footer END -->
</div>
