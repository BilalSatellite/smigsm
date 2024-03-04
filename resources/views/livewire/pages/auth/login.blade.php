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
    <section class="relative flex flex-col justify-center w-full h-72 bg-brandBlack/80">
        <img class="object-cover object-top w-full h-full mix-blend-overlay md:object-center" src="img/bg/contactus.jpg"
            alt="" />
        <div class="absolute inset-0">
            <div class="flex flex-col items-center justify-center h-full">
                <h2 class="text-center text-3xl font-bold text-brand50 [text-shadow:_0_2px_0_rgb(255_0_0_/_90%)] md:text-4xl lg:text-5xl"
                    data-aos="fade" data-aos-offset="0" data-aos-duration="1000">
                    WelCome
                </h2>
            </div>
        </div>
    </section>

    <section class="my-4 item-container">
        <div class="flex flex-col items-center justify-center h-full">
            <h1 class="brandTitel">
                Log
                <span class="text-brandRed">In</span>
            </h1>

            <div data-aos="slide-right" class="brandline"></div>
        </div>
        <div
            class="flex flex-col items-center justify-center mt-4 rounded-md bg-brandRed md:flex-row md:shadow-lg md:shadow-brandRed">
            <div class="w-full space-y-1 md:w-1/2">
                <div class="flex flex-col py-2 bg-brand100 md:rounded-tr-full md:pl-4">
                    <div class="flex justify-center md:justify-start">
                        <img src="img/logo/smi3.png" alt="satellite  Logo" class="h-16 transform scale-100" />
                        <div>
                            <h2
                                class="-mb-1 font-[Poppins] text-3xl font-semibold leading-tight tracking-widest text-brandBlack">
                                Satellite
                            </h2>
                            <p class="-mt-1 text-sm leading-tight text-center text-brandRed">
                                Mobile Institute
                            </p>
                        </div>
                    </div>
                    <div class="mt-1">
                        <div class="flex items-center">
                            <ion-icon class="w-8 h-8 text-brandRed" name="location-outline"></ion-icon>
                            <p class="text-md text-brand800">
                                F-5,Second Floor,Millennium Market,Panch Batti.Bharuch. 392001
                            </p>
                        </div>
                        <p class="ml-8 text-md text-brand800">Gujarat.India.</p>
                        <div class="flex items-center mt-1">
                            <ion-icon class="w-8 h-8 text-brandRed" name="call-outline"></ion-icon>
                            <p class="font-bold text-md text-brand800">
                                : 97270 70188
                                <span class="font-normal">Mon to Sat: 11:00 AM to 6:00 PM</span>
                            </p>
                        </div>
                        <div class="flex items-center mt-1">
                            <ion-icon class="w-8 h-8 text-brandRed" name="mail-open-outline"></ion-icon>
                            <p class="text-md text-brand800">
                                : satellitebharuch@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col py-2 bg-brand100 md:rounded-br-full md:pl-4">
                    <div class="flex justify-center md:justify-start">
                        <img src="img/logo/smi3.png" alt="satellite  Logo" class="h-16 transform scale-100" />
                        <div>
                            <h2
                                class="-mb-1 font-[Poppins] text-3xl font-semibold leading-tight tracking-widest text-brandBlack">
                                Satellite
                            </h2>
                            <p class="-mt-1 text-sm leading-tight text-center text-brandRed">
                                Service Center
                            </p>
                        </div>
                    </div>
                    <div class="mt-1">
                        <div class="flex items-center">
                            <ion-icon class="w-8 h-8 text-brandRed" name="location-outline"></ion-icon>
                            <p class="text-md text-brand800">
                                G-35,Millennium Market,Panch Batti.Bharuch. 392001
                            </p>
                        </div>
                        <p class="ml-8 text-md text-brand800">Gujarat.India.</p>
                        <div class="flex items-center mt-1">
                            <ion-icon class="w-8 h-8 text-brandRed" name="call-outline"></ion-icon>
                            <p class="font-bold text-md text-brand800">
                                98253 64015
                                <span class="font-normal">Mon to Sat: 10:00 AM to 8:00 PM</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full p-10 md:w-1/2">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4 " :status="session('status')" />
                <form wire:submit="login" class="p-4 border rounded-lg bg-brand100" method="POST"
                    action="https://herotofu.com/start">
                    <div class="mb-6">
                        <label for="success" class="block mb-2 text-sm font-medium text-brand800">Email</label>
                        <input wire:model="form.email" id="email" type="email" id="success"
                            class="block w-full rounded-lg border border-brandRed bg-brand50 p-2.5 text-sm text-brand900 placeholder-brand700 shadow-md shadow-brandRed focus:border-brandRed focus:ring-brandRed"
                            placeholder="Enter Your email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block mb-2 text-sm font-medium text-brand800">Password</label>
                        <input wire:model="form.password" type="password" id="password"
                            class="block w-full rounded-lg border border-brandRed bg-brand50 p-2.5 text-sm text-brand900 placeholder-brand700 shadow-md shadow-brandRed focus:border-brandRed focus:ring-brandRed"
                            placeholder="Enter Your Password" />

                    </div>
                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember" class="inline-flex items-center">
                            <input wire:model="form.remember" id="remember" type="checkbox"
                                class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500"
                                name="remember">
                            <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                        <x-primary-button
                            class="mr-3 rounded-lg bg-brandRed px-5 py-2.5 text-center text-sm font-medium text-brand50 shadow-md shadow-brandRed hover:bg-brandRed/80 focus:outline-none focus:ring-4 focus:ring-brandRed/70 md:mr-0">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>


                    {{-- <button type="button"
                        class="mr-3 rounded-lg bg-brandRed px-5 py-2.5 text-center text-sm font-medium text-brand50 shadow-md shadow-brandRed hover:bg-brandRed/80 focus:outline-none focus:ring-4 focus:ring-brandRed/70 md:mr-0">
                        Send Message
                    </button> --}}
                </form>
            </div>
        </div>
    </section>
    {{-- <div class="flex flex-col items-center min-h-screen pt-6 sm:justify-center sm:pt-0">


        <div class="w-full px-6 py-4 mt-6 overflow-hidden shadow-md sm:max-w-md sm:rounded-lg">


            <!-- Session Status -->
            <x-auth-session-status class="mb-4 " :status="session('status')" />
            <form wire:submit="login">
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input wire:model="form.email" id="email" class="block w-full mt-1" type="email"
                        name="email" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input wire:model="form.password" id="password" class="block w-full mt-1" type="password"
                        name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember" class="inline-flex items-center">
                        <input wire:model="form.remember" id="remember" type="checkbox"
                            class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
                    </label>
                </div>
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
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
    </div> --}}
</div>
