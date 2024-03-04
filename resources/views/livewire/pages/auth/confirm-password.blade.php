<?php
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;
layout('layouts.guest');
state(['password' => '']);
rules(['password' => ['required', 'string']]);
$confirmPassword = function () {
    $this->validate();
    if (
        !Auth::guard('web')->validate([
            'email' => Auth::user()->email,
            'password' => $this->password,
        ])
    ) {
        throw ValidationException::withMessages([
            'password' => __('auth.password'),
        ]);
    }
    session(['auth.password_confirmed_at' => time()]);
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
                    Confirm Password
                </h2>
            </div>
        </div>
    </section>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>
    <form wire:submit="confirmPassword">
        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="password" id="password" class="block w-full mt-1" type="password" name="password"
                required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
    <!-- footer -->
    @include('layouts.include.guest.footer')
    <!-- footer END -->
</div>
