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
            <nav x-cloak @click.outside="NavisOpen = false" class="z-10 w-full px-2 mx-auto"
                :class="{ 'bg-brand50': scrolledFromTop }">
                <div class="flex flex-wrap items-center justify-between mx-auto">
                    <a href="index.html">
                        <div class="flex items-center">
                            <img src="img/logo/smi3.png" alt="satellite  Logo"
                                class="h-8 transform scale-100 md:h-16" />
                            <div>
                                <h2
                                    class="-mb-1 font-[Poppins] text-xs font-semibold leading-tight tracking-widest text-brandBlack sm:text-2xl md:text-3xl">
                                    Satellite
                                </h2>
                                <p class="-mt-1 text-xs leading-tight text-center text-brandRed/80 sm:text-sm">
                                    Mobile Institute
                                </p>
                            </div>
                        </div>
                    </a>
                    <div class="md:order-2">
                        <div class="flex">
                            <a href="{{ route('login') }}" class="brandBtn">Login</a>
                            <!-- Hamburger Icon -->
                            <button @click="NavisOpen = !NavisOpen" class="md:hidden">
                                <ion-icon class="w-6 h-6"
                                    :class="{
                                        'hidden': NavisOpen,
                                        'text-brand900': scrolledFromTop,
                                        'text-brand50': !
                                            scrolledFromTop
                                    }"
                                    name="menu-outline"></ion-icon>
                                <ion-icon class="w-6 h-6 rotate-45" :class="{ 'hidden': !NavisOpen }"
                                    name="add-outline"></ion-icon>
                            </button>
                        </div>
                    </div>
                    <div class="items-center justify-between w-full md:order-1 md:flex md:w-auto"
                        :class="{ 'hidden': !NavisOpen }">
                        <ul class="md:text-md mb-1 flex flex-col gap-y-1 bg-brand50 font-[Poppins] text-sm md:flex-row md:gap-y-0 md:space-x-8 md:bg-transparent md:font-semibold lg:text-lg"
                            :class="{
                                'text-brand50 md:text-brand900': scrolledFromTop,
                                'text-brand50': !
                                    scrolledFromTop,
                                'items-center': !NavisOpen
                            }">
                            <li>
                                <a href="index.html"
                                    class="block py-2 pl-3 pr-4 font-semibold transition-all border-b-4 rounded-md duration-30 border-brandBlack bg-brandRed hover:text-brand200 md:border-0 md:bg-transparent md:p-0 md:hover:text-brandRed"
                                    aria-current="page">Home</a>
                            </li>
                            <!-- dropdown -->
                            <li x-data="{ dropDownOpen: false }"
                                class="relative border-b-4 rounded-md border-brandBlack bg-brandRed md:overflow-y-visible md:border-0 md:bg-transparent">
                                <button href="#"
                                    class="flex py-2 pl-3 pr-4 font-semibold transition-colors duration-300 rounded-md outline-none hover:text-brand200 focus:outline-none md:border-0 md:hover:text-brandRed"
                                    x-on:click="dropDownOpen = ! dropDownOpen">
                                    Services &#9660;
                                </button>
                                <!-- dropdown menu -->
                                <div class="right-0 w-full p-2 mt-1 rounded-md shadow bg-brandRed md:absolute md:w-48"
                                    x-show="dropDownOpen" x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 scale-90"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-300"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-90" @click.away="dropDownOpen = false"
                                    @click.outside="dropDownOpen = false" x-on:click="dropDownOpen = ! dropDownOpen">
                                    <ul class="w-full space-y-2 transition-all duration-300 rounded-md">
                                        <li>
                                            <a href="index.html#hardware_course" x-on:click="NavisOpen = false"
                                                class="flex p-2 font-semibold border-b-2 rounded-md border-brandBlack bg-brand100 text-brandBlack hover:text-brandRed">Hardware
                                                Course</a>
                                        </li>
                                        <li>
                                            <a href="index.html#software_course" x-on:click="NavisOpen = false"
                                                class="flex p-2 font-semibold border-b-2 rounded-md border-brandBlack bg-brand100 text-brandBlack hover:text-brandRed">Software
                                                Course</a>
                                        </li>
                                        <li>
                                            <a href="repairing.html"
                                                class="flex p-2 font-semibold border-b-2 rounded-md border-brandBlack bg-brand100 text-brandBlack hover:text-brandRed">Mobile
                                                Repairing</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- dropdown menu -->
                            </li>
                            <!-- dropdown -->
                            <li>
                                <a href="about.html"
                                    class="block py-2 pl-3 pr-4 font-semibold transition-all border-b-4 rounded-md duration-30 border-brandBlack bg-brandRed hover:text-brand200 md:border-0 md:bg-transparent md:p-0 md:hover:text-brandRed">About</a>
                            </li>

                            <li>
                                <a href="contact.html"
                                    class="block py-2 pl-3 pr-4 font-semibold transition-all border-b-4 rounded-md duration-30 border-brandBlack bg-brandRed hover:text-brand200 md:border-0 md:bg-transparent md:p-0 md:hover:text-brandRed">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <!-- NavBar End -->
    </header>

    {{ $slot }}
    <!-- FREE DEMO -->
    <div class="item-container">
        <div
            class="flex items-center justify-center border-t-4 rounded-t-full h-14 border-x-4 border-brandRed bg-brand100">
            <p class="relative text-xs font-semibold animate-pulse text-brandBlack md:text-sm">
                We would like to invite you for a
                <span class="uppercase text-brandRed">Free Demo Class</span>
            </p>
        </div>
    </div>
    <!-- FREE DEMO end -->
    <!-- footer -->
    <footer class="py-4 bg-brandRed">
        <div class="item-container">
            <div class="lg:flex">
                <div class="w-full -mx-6 lg:w-2/5">
                    <div class="px-6">
                        <div>
                            <a href="#">
                                <div class="flex items-center">
                                    <img src="img/logo/smi3.png" alt="satellite  Logo"
                                        class="h-16 transform scale-100" />
                                    <div>
                                        <h2
                                            class="-mb-1 font-[Poppins] text-3xl font-semibold leading-tight tracking-widest text-brandBlack">
                                            Satellite
                                        </h2>
                                        <p class="-mt-1 text-sm leading-tight text-center text-brand300">
                                            Mobile Institute
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <p class="max-w-sm mt-2 text-brand200">
                            Join Us and never miss out on new tips, tutorials, and more.
                        </p>

                        <div class="flex mt-6 -mx-2">
                            <a href="#"
                                class="mx-2 transition-colors duration-300 text-brand100 hover:text-brand300"
                                aria-label="Reddit">
                                <ion-icon class="w-5 h-5" name="logo-instagram"></ion-icon>
                            </a>

                            <a href="#"
                                class="mx-2 transition-colors duration-300 text-brand100 hover:text-brand300"
                                aria-label="Facebook">
                                <ion-icon class="w-5 h-5" name="logo-facebook"></ion-icon>
                            </a>

                            <a href="#"
                                class="mx-2 transition-colors duration-300 text-brand100 hover:text-brand300"
                                aria-label="Github">
                                <ion-icon class="w-5 h-5" name="logo-whatsapp"></ion-icon>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="mt-6 lg:mt-0 lg:flex-1">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        <div>
                            <h3 class="uppercase text-brandBlack">About</h3>
                            <a href="#" class="block mt-2 text-sm text-brand100 hover:underline">Service
                                Center</a>
                            <a href="#" class="block mt-2 text-sm text-brand100 hover:underline">Institute</a>
                            <a href="#" class="block mt-2 text-sm text-brand100 hover:underline">Careers</a>
                        </div>

                        <div>
                            <h3 class="uppercase text-brandBlack">Blog</h3>
                            <a href="#" class="block mt-2 text-sm text-brand100 hover:underline">Tec</a>
                            <a href="#" class="block mt-2 text-sm text-brand100 hover:underline">Music</a>
                            <a href="#" class="block mt-2 text-sm text-brand100 hover:underline">Videos</a>
                        </div>

                        <div>
                            <h3 class="uppercase text-brandBlack">Products</h3>
                            <a href="#" class="block mt-2 text-sm text-brand100 hover:underline">Mega cloud</a>
                            <a href="#" class="block mt-2 text-sm text-brand100 hover:underline">Aperion UI</a>
                            <a href="#" class="block mt-2 text-sm text-brand100 hover:underline">Meraki UI</a>
                        </div>

                        <div>
                            <h3 class="uppercase text-brandBlack">Contact</h3>
                            <span class="block mt-2 text-sm text-brand100 hover:underline">+91 97270 70188</span>
                            <span
                                class="block mt-2 text-sm text-brand100 hover:underline">satellitebharuch@gmail.com</span>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="h-px my-2 border-none bg-brand800" />

            <div class="flex flex-col justify-between md:flex-row">
                <p class="text-xs text-center transition-colors duration-300 text-brand100 hover:text-brand200">
                    Satellite Mobile Institute - All rights reserved © 2022-23
                </p>
                <a href="#"
                    class="text-xs text-center transition-colors duration-300 text-brand100 hover:text-brand200">Web
                    Design By : Bilal Khatri</a>
            </div>
        </div>
    </footer>
    <!-- footer END -->

    <script>
        const backgroundImage = () => {
            return {
                selected: 0,
                loop() {
                    setInterval(() => {
                        this.selected =
                            this.selected === this.images.length - 1 ?
                            0 :
                            this.selected + 1;
                    }, 7000);
                },
                images: [
                    "img/slider/image6.jpg",
                    "img/slider/image7.jpg",
                    "img/slider/image8.jpg",
                    "img/slider/image9.jpg",
                    "img/slider/image10.jpg",
                    "img/slider/image11.jpg",
                    "img/slider/image12.jpg",
                    "img/slider/image13.jpg",
                    "img/slider/image14.jpg",
                    "img/slider/image15.jpg",
                ],
            };
        };
    </script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script>
        AOS.init({
            duration: 1000, // values from 0 to 3000, with step 50ms
            offset: 300, // offset (in px) from the original trigger point
        });
    </script>
    @livewireScripts
</body>

</html>
