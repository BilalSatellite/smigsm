<nav x-cloak @click.outside="NavisOpen = false" class="z-10 w-full px-2 mx-auto"
    :class="{ 'bg-brand50': scrolledFromTop }">
    <div class="flex flex-wrap items-center justify-between mx-auto">
        <a href="{{ url('/') }}">
            <div class="flex items-center">
                <img src="{{ asset('img/logo/smi3.png') }}" alt="satellite  Logo"
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
                @if (Route::has('login'))
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex items-center text-sm transition border-2 border-transparent rounded-full text-brand100 focus:outline-none focus:border-none">
                                        Hi, {{ Auth::user()->name }}
                                        <img class="object-cover w-8 h-8 ml-1 rounded-full"
                                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 transition border border-transparent rounded-mdfocus:outline-none">
                                            {{ Auth::user()->name }}
                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>
                            <x-slot name="content">
                                @role('admin')
                                    <x-dropdown-link href="{{ route('dashboard') }}"
                                        class="m-1 font-[Poppins] rounded-md  bg-brand100 p-2 font-semibold text-brandBlack hover:text-brandRed">
                                        {{ __('Dashboard') }}
                                    </x-dropdown-link>
                                @endrole
                                <x-dropdown-link href="{{ route('profile.show') }}"
                                    class="m-1 font-[Poppins] rounded-md border-b-2 border-brandBlack bg-brand100 p-2 font-semibold text-brandBlack hover:text-brandRed">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                {{-- <div class="border-t border-brand300"></div> --}}
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}"
                                        class="m-1 font-[Poppins] rounded-md border-b-2 border-brandBlack bg-brand100 p-2 font-semibold text-brandBlack hover:text-brandRed"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @else
                        <a href="{{ route('register') }}" class="brandBtn">{{ __('Log On') }}</a>
                        {{-- <a href="{{ route('register') }}" class="brandBtn">Register</a> --}}
                    @endauth
                @endif
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
                    <ion-icon class="w-6 h-6 rotate-45" :class="{ 'hidden': !NavisOpen }" name="add-outline">
                    </ion-icon>
                </button>
            </div>
        </div>
        <div class="items-center justify-between w-full md:order-1 md:flex md:w-auto" :class="{ 'hidden': !NavisOpen }">
            <ul class="md:text-md mb-1 flex flex-col gap-y-1 bg-brand50 font-[Poppins] text-sm md:flex-row md:gap-y-0 md:space-x-8 md:bg-transparent md:font-semibold lg:text-lg"
                :class="{
                    'text-brand50 md:text-brand900': scrolledFromTop,
                    'text-brand50': !
                        scrolledFromTop,
                    'items-center': !NavisOpen
                }">
                {{-- @foreach ($data as $menuitem)
                    @if ($menuitem->getSubMenuItem->count())
                        <!-- dropdown -->
                        <li x-data="{ dropDownOpen: false }"
                            class="relative border-b-4 rounded-md border-brandBlack bg-brandRed md:overflow-y-visible md:border-0 md:bg-transparent">
                            <button
                                href="{{ Route::has($menuitem->url) ? route($menuitem->url) : url($menuitem->url) }}"
                                class="flex py-2 pl-3 pr-4 font-semibold transition-colors duration-300 rounded-md outline-none hover:text-brand200 focus:outline-none md:border-0 md:hover:text-brandRed"
                                x-on:click="dropDownOpen = ! dropDownOpen">
                                {{ $menuitem->label }} &#9660;
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
                                    <x-menu.submenuitemmenushow :menuitem="$menuitem" />
                                </ul>
                            </div>
                            <!-- dropdown menu -->
                        </li>
                        <!-- dropdown -->
                    @endif
                    @if ($menuitem->getSubMenuItem->isEmpty())
                        <x-nav-link
                            href="{{ Route::has($menuitem->url) ? route($menuitem->url) : url($menuitem->url) }}"
                            :active="request()->routeIs($menuitem->url)">
                            {{ $menuitem->label }}
                        </x-nav-link>
                    @endif
                @endforeach --}}
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
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                        @click.away="dropDownOpen = false" @click.outside="dropDownOpen = false"
                        x-on:click="dropDownOpen = ! dropDownOpen">
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
