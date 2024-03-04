<?php

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state(['email' => '']);

rules(['email' => ['required', 'string', 'email']]);

$sendPasswordResetLink = function () {
    $this->validate();

    // We will send the password reset link to this user. Once we have attempted
    // to send the link, we will examine the response then see the message we
    // need to show to the user. Finally, we'll send out a proper response.
    $status = Password::sendResetLink($this->only('email'));

    if ($status != Password::RESET_LINK_SENT) {
        $this->addError('email', __($status));

        return;
    }

    $this->reset('email');

    Session::flash('status', __($status));
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
                    Forgot your password?
                </h2>
            </div>
        </div>
    </section>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block w-full mt-1" type="email" name="email"
                required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
    <!-- footer -->
    @include('layouts.include.guest.footer')
    <!-- footer END -->
</div>
