<?php
use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use function Livewire\Volt\form;
use function Livewire\Volt\layout;
layout('layouts.guest');
form(LoginForm::class);
$login = function () {
    $this->validate();
    $this->form->authenticate();
    Session::regenerate();
    $this->redirect(session('url.intended', RouteServiceProvider::HOME));
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
                <span class="text-brandRed">In</span>
            </h1>
            <div data-aos="slide-right" class="mt-1 brandline"></div>
        </div>
        <div
            class="flex flex-col items-center justify-center mt-4 rounded-md bg-brandRed md:flex-row md:shadow-lg md:shadow-brandRed">
            <x-smi-baner />
            <div class="w-full p-10 md:w-1/2">
                <form wire:submit="login" class="p-4 border rounded-lg bg-brand100" method="POST">
                    <!-- Email Address -->
                    <div class="mb-2">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input wire:model="form.email" class="block w-full mt-1" type="email" name="email"
                            autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>
                    <!-- Password -->
                    <div class="mb-2">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input wire:model="form.password" class="block w-full mt-1" type="password"
                            name="password" autocomplete="password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />


                    </div>
                    <x-checkbox wire:model="form.remember" label="Remember me" name="remember"
                        textcolor="text-brandBlack/90" />
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="text-sm underline rounded-md text-brandBlack/90 hover:text-brandBlack focus:ring-none focus:outline-none"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                        <x-primary-button class="ms-3">
                            {{ __('Log in') }}
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
