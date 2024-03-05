<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @stack('styles')
    @livewireStyles
</head>

<body x-cloak class="relative overflow-x-hidden" x-data="{ scrolledFromTop: false, NavisOpen: false }" x-init="window.pageYOffset >= 200 ? scrolledFromTop = true : scrolledFromTop = false"
    @scroll.window="window.pageYOffset >= 200 ? scrolledFromTop = true : scrolledFromTop = false">
    <header class="fixed z-50 w-full" :class="{ 'bg-brand50': NavisOpen }">
        <!-- Topbar Start -->
        <div class="flex items-center justify-between w-full px-2 py-1 mx-auto backdrop-blur-sm"
            :class="{ 'hidden': scrolledFromTop, 'block': !scrolledFromTop }">
            <div class="flex justify-start">
                <p class="hidden text-md text-brand300 md:block">
                    Call For Mobile course:
                </p>
                <p class="flex text-sm text-brand200 md:text-lg" :class="{ 'text-brand800': NavisOpen }">
                    <ion-icon class="w-4 h-4 text-brandRed md:h-6 md:w-6" name="phone-portrait-outline"></ion-icon>
                    9727070188
                </p>
            </div>
            <div class="flex justify-end">
                <p class="hidden text-md text-brand300 md:block">
                    Call For Mobile Repairing:
                </p>
                <p class="flex text-sm text-brand200 md:text-lg" :class="{ 'text-brand800': NavisOpen }">
                    <ion-icon class="w-4 h-4 text-brandRed md:h-6 md:w-6" name="phone-portrait-outline"></ion-icon>
                    9825364015
                </p>
            </div>
        </div>
        <!-- Topbar End -->
        <!-- NavBar -->
        <div class="relative flex w-full">
            <livewire:pages.main-menu-view />
        </div>
        <!-- NavBar End -->
    </header>
    {{ $slot }}
    {{-- <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
            <div>
                <a href="/" wire:navigate>
                    <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
                </a>
            </div>

            <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg">
                {{ $slot }}
            </div>
        </div> --}}

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <script>
        AOS.init({
            duration: 1000, // values from 0 to 3000, with step 50ms
            offset: 300, // offset (in px) from the original trigger point
        });
    </script>
    <!-- Scripts -->
    @stack('scripts')
    @livewireScripts
</body>

</html>
