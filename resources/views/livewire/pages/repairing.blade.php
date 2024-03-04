<div>
    <!-- welcome to -->
    <section class="relative flex flex-col justify-center w-full overflow-hidden h-72 bg-brandRed/50">
        <img class="object-cover object-top w-full h-full mix-blend-overlay md:object-center"
            src="{{ asset('img/repairing/mobile_repairing.jpg') }}" alt="" />
        <div class="absolute inset-0">
            <div class="flex flex-col items-center justify-center h-full">
                <h2 class="text-center text-3xl font-bold text-brand50 [text-shadow:_0_2px_0_rgb(255_0_0_/_90%)] md:text-4xl lg:text-5xl"
                    data-aos="fade" data-aos-offset="0" data-aos-duration="1000">
                    {{ __('मोबाइल चाहें कोई भी हो हम हैं ना !!!') }}
                </h2>
            </div>
        </div>
    </section>
    <!-- welcome to End-->
    <!-- We offer you -->
    <section class="overflow-hidden">
        <div class="text-center">
            <p class="mx-auto text-brandRed">{{ __('Welcome') }}</p>
            <h1 class="brandTitel">
                {{ __('Satellite') }}
                <span class="text-brandRed">{{ __('Service Center') }}</span>
            </h1>
            <div data-aos="slide-right" class="brandline"></div>
        </div>
        <div class="relative px-0 item-container">
            <img class="object-cover" src="{{ asset('img/repairing/Trouble_With_Your_Phone.jpg') }}" alt="" />
            <div class="absolute inset-0">
                <div class="flex items-center justify-center h-full">
                    <div class="flex flex-col items-center justify-center w-1/2 h-full bg-brandRed/50">
                        <h2 data-aos="zoom-in-up" data-aos-offset="100"
                            class="text-center text-2xl font-bold text-brand100 [text-shadow:_0_1px_0_rgb(0_0_0_/_90%)] md:text-4xl lg:text-5xl">
                            {{ __('Trouble With Your Phone?') }}
                        </h2>
                        <p data-aos="zoom-in-up" data-aos-delay="500" data-aos-offset="100"
                            class="text-center text-md text-brand100 md:text-lg">
                            {{ __('we offer you a fast qualit repair service.') }}
                        </p>
                    </div>
                    <div class="w-1/2"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- We offer you End -->
    <!-- iPhone Repair & Services -->
    <section class="relative mt-4 overflow-hidden item-container">
        <div class="grid grid-cols-3">
            <img class="object-cover duration-300 ml-14 md:ml-24" data-aos="fade-up" data-aos-delay="300"
                src="{{ asset('img/repairing/i1.png') }}" alt="" />
            <img class="object-cover -z-10" src="{{ asset('img/repairing/IPhone X - 500x500.png') }}" alt="" />
            <img class="object-cover duration-300 -ml-14 md:-ml-20" data-aos="fade-up" data-aos-delay="500"
                src="{{ asset('img/repairing/i2.png') }}" alt="" />
        </div>
        <div class="absolute inset-0">
            <div class="flex flex-col items-center justify-center h-full">
                <h1 class="brandTitel">
                    {{ __('iPhone') }}
                    <span class="text-brandRed"> {{ __('Repair & Services') }}</span>
                </h1>
                <div data-aos="slide-right" class="mt-2 brandline"></div>
            </div>
        </div>
    </section>
    <!-- iPhone Repair & Services End-->
    <!-- We Are Expert -->
    <div class="relative overflow-hidden">
        <img data-aos="flip-down" data-aos-offset="80" class="relative object-cover w-full"
            src="{{ asset('img/repairing/Apple iPhone X - 1280x438.png') }}" alt="" />
        <div class="absolute inset-x-0 item-container data-scene top-3 md:top-10">
            <div class="flex flex-col items-center justify-center h-full">
                <h2 data-aos="fade-up" data-aos-offset="80"
                    class="text-lg font-bold text-center text-brand50 md:text-3xl">
                    <span
                        class="text-transparent bg-gradient-to-r from-pink-500 via-red-500 to-purple-700 bg-clip-text">
                        {{ __('We Are Expert All Apple Device Repairs') }}</span>
                </h2>
                <p data-aos="fade-up" data-aos-offset="80" data-aos-delay="300"
                    class="text-center text-sm text-brand800 [text-shadow:_0_1px_0_rgb(255_255_255_/_90%)] md:text-lg">
                    <span
                        class="">{{ __('iPhone,iPod Touch,iPad,iPad Mini,iPad Pro,Apple Watch
                                                                                                Repair.') }}</span>
                </p>
            </div>
        </div>
    </div>
    <!-- We Are Expert End-->
    <!-- Samsung Repair & Services -->
    <section class="relative overflow-hidden item-container">
        <div class="flex justify-center -space-x-28 md:-space-x-10">
            <img class="" src="{{ asset('img/repairing/Samsung Galaxy S102.png') }}" data-aos="flip-left"
                data-aos-delay="300" alt="" />
            <img class="" src="{{ asset('img/repairing/Samsung Galaxy S10 4.png') }}" data-aos="flip-right"
                data-aos-delay="500" alt="" />
            <img class="" src="{{ asset('img/repairing/Samsung Galaxy S10 1.png') }}" data-aos="flip-left"
                data-aos-delay="700" alt="" />
            <img class="" src="{{ asset('img/repairing/Samsung Galaxy S105.png') }}" data-aos="flip-right"
                data-aos-delay="900" alt="" />
            <img class="" src="{{ asset('img/repairing/Samsung Galaxy S103.png') }}" data-aos="flip-left"
                data-aos-delay="1100" alt="" />
        </div>
        <div class="absolute inset-0">
            <div class="flex flex-col items-center justify-center h-full">
                <h1 class="brandTitel">
                    {{ __('Suamsung') }} <span class="text-brandRed">{{ __('Repair & Services') }}</span>
                </h1>
                <div data-aos="slide-right" class="mt-2 brandline"></div>
                <p class="text-sm text-center text-brand800 md:text-lg">
                    <span
                        class="">{{ __('Galaxy fold,Galaxy S6,Galaxy S6 Edge,Galaxy S6 Edge Plus,Galaxy
                                                                                                Note 5 Repair.') }}</span>
                </p>
            </div>
        </div>
    </section>
    <!-- Samsung Repair & Services End -->
    <!-- ANY BRANDS ANY MOBILES -->
    <section class="py-4 overflow-hidden item-container">
        <div class="grid grid-cols-2 gap-4 place-content-center place-items-center md:grid-cols-4">
            <div class="flex flex-col items-center col-span-2">
                <h1 class="brandTitel">
                    Any Brands <span class="text-brandRed">Any Mobiles</span>
                </h1>
                <div data-aos="slide-right" class="mt-2 brandline"></div>
            </div>
            <p class="col-span-2 text-sm text-center text-brand800 md:row-start-2 md:text-lg">
                <span class="">We specialise in Phone repairs for Sony, HTC, Nexus, Motorola,
                    Blackberry, Xiaomi.Lenovo,Oppo,Vivo, All Android based Phones.</span>
            </p>
            <img class="col-span-2" data-aos="slide-right" data-aos-delay="0" data-aos-offset="120"
                src="{{ asset('img/allbrand/OnePlus-Logo.wine.png') }}" alt="" />
            <img class="rounded-lg shadow-lg shadow-brandRed" data-aos="flip-left" data-aos-delay="200"
                data-aos-offset="120" src="{{ asset('img/allbrand/vivo.jpg') }}" alt="" />
            <img class="rounded-lg shadow-lg shadow-brandRed" data-aos="flip-right" data-aos-delay="200"
                data-aos-offset="120" src="{{ asset('img/allbrand/oppo.jpg') }}" alt="" />
            <img class="rounded-lg shadow-lg shadow-brandRed" data-aos="zoom-in" data-aos-delay="200"
                data-aos-offset="120" src="{{ asset('img/allbrand/xiomi.jpg') }}" alt="" />
            <img class="rounded-lg shadow-lg shadow-brandRed" data-aos="zoom-in-up" data-aos-delay="200"
                data-aos-offset="120" src="{{ asset('img/allbrand/huawei.jpg') }}" alt="" />
            <img class="rounded-lg shadow-lg shadow-brandRed" data-aos="zoom-in-down" data-aos-delay="200"
                data-aos-offset="120" src="{{ asset('img/allbrand/lenovo.jpg') }}" alt="" />
            <img class="rounded-lg shadow-lg shadow-brandRed" data-aos="zoom-in-left" data-aos-delay="200"
                data-aos-offset="120" src="{{ asset('img/allbrand/motorola.jpg') }}" alt="" />
            <img class="rounded-lg shadow-lg shadow-brandRed" data-aos="zoom-in-right" data-aos-delay="200"
                data-aos-offset="120" src="{{ asset('img/allbrand/micromax.jpg') }}" alt="" />
            <img class="rounded-lg shadow-lg shadow-brandRed" data-aos="zoom-out" data-aos-delay="200"
                data-aos-offset="120" src="{{ asset('img/allbrand/asus.jpg') }}" alt="" />
            <img class="rounded-lg shadow-lg shadow-brandRed" data-aos="zoom-out-up" data-aos-delay="200"
                data-aos-offset="120" src="{{ asset('img/allbrand/acer.jpg') }}" alt="" />
            <img class="rounded-lg shadow-lg shadow-brandRed" data-aos="zoom-out-down" data-aos-delay="200"
                data-aos-offset="120" src="{{ asset('img/allbrand/nokia.jpg') }}" alt="" />
            <img class="rounded-lg shadow-lg shadow-brandRed" data-aos="zoom-out-left" data-aos-delay="200"
                data-aos-offset="70" src="{{ asset('img/allbrand/lyf.jpg') }}" alt="" />
            <img class="rounded-lg shadow-lg shadow-brandRed" data-aos="zoom-out-right" data-aos-delay="200"
                data-aos-offset="70" src="{{ asset('img/allbrand/lg.jpg') }}" alt="" />
            <img class="rounded-lg shadow-lg shadow-brandRed" data-aos="flip-left" data-aos-delay="200"
                data-aos-offset="70" src="{{ asset('img/allbrand/alcatel.jpg') }}" alt="" />
            <img class="rounded-lg shadow-lg shadow-brandRed" data-aos="flip-right" data-aos-delay="200"
                data-aos-offset="70" src="{{ asset('img/allbrand/sony.jpg') }}" alt="" />
        </div>
    </section>
    <!-- ANY BRANDS ANY MOBILES End -->
    <!-- brack glass -->
    <section class="relative -mt-20 flex h-[500px] w-full flex-col overflow-hidden lg:h-[783px]">
        <div class="w-full h-full">
            <img class="relative z-10 object-cover h-full" data-aos="fade-up" data-aos-offset="500"
                src="{{ asset('img/repairing/Broken-Phone.png') }}" alt="" />
        </div>
        <div class="absolute inset-0">
            <div class="relative flex flex-col items-center justify-center h-full">
                <div class="absolute w-full bg-brandRed/40">
                    <img class="object-cover w-full mix-blend-overlay"
                        src="{{ asset('img/repairing/brackglass.jpg') }}" alt="" />
                </div>
                <h1 class="z-20 brandTitel">
                    Broken
                    <span class="text-brandRed">Phone?</span>
                </h1>
                <div data-aos="slide-right" class="relative z-20 brandline"></div>
                <p
                    class="text-md z-20 rounded-md p-1 text-center text-brandBlack [text-shadow:_0_1px_0_rgb(255_255_255_/_90%)] md:text-lg">
                    <span class="">We can fix broken LCDS & TOUCHSCREENS so that they look as goog
                        as new! <br />
                        <span class="font-bold text-brandBlack">We are specialised for mobile curved display repair in
                            Bharuch.</span></span>
                </p>
            </div>
        </div>
    </section>
    <!-- brack glass -->
    <section
        class="relative z-20 -mt-16 overflow-hidden transition-all duration-500 item-container md:-mt-20 lg:-mt-28">
        <div class="flex flex-col items-center justify-center h-full">
            <h1 class="brandTitel">
                Why
                <span class="text-brandRed">Choose Us?</span>
            </h1>
            <div data-aos="slide-right" class="mt-2 brandline"></div>
            <p class="text-center text-sm text-brand800 [text-shadow:_0_1px_0_rgb(255_255_255_/_90%)] md:text-lg">
                <span class="">Solutions To The Most Common Smartphone Problems.</span>
            </p>
        </div>
        <div class="grid grid-cols-1 mt-4 place-items-center gap-y-2 md:grid-cols-3">
            <img class="object-cover h-96 md:order-2 md:h-full" src="{{ asset('img/repairing/phonerepair.png') }}"
                alt="" />
            <!-- items 1 -->
            <div class="grid w-96 place-content-center gap-y-2 md:order-1 md:w-72 md:gap-y-5 lg:w-full">
                <div data-aos="fade-right" data-aos-offset="120"
                    class="flex items-center justify-center p-2 rounded-md shadow-md gap-x-2 bg-brand50 shadow-brandRed">
                    <div class="w-20 h-20 p-2 rounded-lg bg-brandRed text-brand100 md:order-2">
                        <ion-icon class="w-full h-full" name="tablet-portrait-outline"></ion-icon>
                    </div>
                    <div class="flex-1 text-left md:text-right">
                        <h2 class="text-lg font-semibold text-brandRed">BROKEN LCDS</h2>
                        <p class="text-sm text-brandBlack">
                            We repair your LCD screen or replacing.<span
                                class="text-brand50 md:hidden">..........</span>
                        </p>
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-offset="120"
                    class="flex items-center justify-center p-2 rounded-md shadow-md gap-x-2 bg-brand50 shadow-brandRed">
                    <div class="w-20 h-20 p-2 rounded-lg bg-brandRed text-brand100 md:order-2">
                        <ion-icon class="w-full h-full" name="water-outline"></ion-icon>
                    </div>
                    <div class="flex-1 text-left md:text-right">
                        <h2 class="text-lg font-semibold text-brandRed">WATER DAMAGE</h2>
                        <p class="text-sm text-brandBlack">
                            We repair your water damage Phone's.
                        </p>
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-offset="120"
                    class="flex items-center justify-center p-2 rounded-md shadow-md gap-x-2 bg-brand50 shadow-brandRed">
                    <div class="w-20 h-20 p-2 rounded-lg bg-brandRed text-brand100 md:order-2">
                        <ion-icon class="w-full h-full" name="power-outline"></ion-icon>
                    </div>
                    <div class="flex-1 text-left md:text-right">
                        <h2 class="text-lg font-semibold text-brandRed">POWER BUTTONS</h2>
                        <p class="text-sm text-brandBlack">
                            We repair your Phone's Power switch.
                        </p>
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-offset="120"
                    class="flex items-center justify-center p-2 rounded-md shadow-md gap-x-2 bg-brand50 shadow-brandRed">
                    <div class="w-20 h-20 p-2 rounded-lg bg-brandRed text-brand100 md:order-2">
                        <ion-icon class="w-full h-full" name="mic-off-outline"></ion-icon>
                    </div>
                    <div class="flex-1 text-left md:text-right">
                        <h2 class="text-lg font-semibold text-brandRed">SPEAKERS/MICS</h2>
                        <p class="text-sm text-brandBlack">
                            We repair your Speakers|Mics issue.
                        </p>
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-offset="120"
                    class="flex items-center justify-center p-2 rounded-md shadow-md gap-x-2 bg-brand50 shadow-brandRed">
                    <div class="w-20 h-20 p-2 rounded-lg bg-brandRed text-brand100 md:order-2">
                        <ion-icon class="w-full h-full" name="cellular-outline"></ion-icon>
                    </div>
                    <div class="flex-1 text-left md:text-right">
                        <h2 class="text-lg font-semibold text-brandRed">NETWORK</h2>
                        <p class="text-sm text-brandBlack">
                            We repair! your Network issue Phone's.
                        </p>
                    </div>
                </div>
            </div>
            <!-- items 1 end -->
            <!-- items 2 -->
            <div class="grid w-96 place-content-center gap-y-2 md:order-3 md:w-72 md:gap-y-5 lg:w-full">
                <div data-aos="fade-left" data-aos-offset="120"
                    class="flex items-center justify-center p-2 rounded-md shadow-md gap-x-2 bg-brand50 shadow-brandRed">
                    <div class="w-20 h-20 p-2 rounded-lg bg-brandRed text-brand100 md:order-1">
                        <ion-icon class="w-full h-full" name="tablet-portrait-outline"></ion-icon>
                    </div>
                    <div class="flex-1 md:order-2">
                        <h2 class="text-lg font-semibold text-brandRed">TOUCHSCREENS</h2>
                        <p class="text-sm text-brandBlack">
                            We repair your TOUCHSCREENS or replacing.
                        </p>
                    </div>
                </div>
                <div data-aos="fade-left" data-aos-offset="120"
                    class="flex items-center justify-center p-2 rounded-md shadow-md gap-x-2 bg-brand50 shadow-brandRed">
                    <div class="w-20 h-20 p-2 rounded-lg bg-brandRed text-brand100 md:order-1">
                        <ion-icon class="w-full h-full" name="battery-dead-outline"></ion-icon>
                    </div>
                    <div class="flex-1 md:order-2">
                        <h2 class="text-lg font-semibold text-brandRed">NEW BATTERIES</h2>
                        <p class="text-sm text-brandBlack">
                            We replacing Your phone's new Batteries.
                        </p>
                    </div>
                </div>
                <div data-aos="fade-left" data-aos-offset="120"
                    class="flex items-center justify-center p-2 rounded-md shadow-md gap-x-2 bg-brand50 shadow-brandRed">
                    <div class="w-20 h-20 p-2 rounded-lg bg-brandRed text-brand100 md:order-1">
                        <ion-icon class="w-full h-full" name="stop-circle-outline"></ion-icon>
                    </div>
                    <div class="flex-1 md:order-2">
                        <h2 class="text-lg font-semibold text-brandRed">HOME BUTTONS</h2>
                        <p class="text-sm text-brandBlack">
                            We repair Your phone's keypad issue.
                        </p>
                    </div>
                </div>
                <div data-aos="fade-left" data-aos-offset="120"
                    class="flex items-center justify-center p-2 rounded-md shadow-md gap-x-2 bg-brand50 shadow-brandRed">
                    <div class="w-20 h-20 p-2 rounded-lg bg-brandRed text-brand100 md:order-1">
                        <ion-icon class="w-full h-full" name="flash-off-outline"></ion-icon>
                    </div>
                    <div class="flex-1 md:order-2">
                        <h2 class="text-lg font-semibold text-brandRed">CHARGING PORT</h2>
                        <p class="text-sm text-brandBlack">
                            We repair Your phone's Charging issue.
                        </p>
                    </div>
                </div>
                <div data-aos="fade-left" data-aos-offset="120"
                    class="flex items-center justify-center p-2 rounded-md shadow-md gap-x-2 bg-brand50 shadow-brandRed">
                    <div class="w-20 h-20 p-2 rounded-lg bg-brandRed text-brand100 md:order-1">
                        <ion-icon class="w-full h-full" name="lock-open-outline"></ion-icon>
                    </div>
                    <div class="flex-1 md:order-2">
                        <h2 class="text-lg font-semibold text-brandRed">UNLOCK PHONE</h2>
                        <p class="text-sm text-brandBlack">
                            We Unlock your Phone's if Locked.
                        </p>
                    </div>
                </div>
            </div>
            <!-- items 2 end -->
            <!-- items 3 We Fix Software Problem -->
            <div data-aos="fade-down" data-aos-offset="120"
                class="flex items-center justify-center p-2 mb-2 rounded-md shadow-md w-96 gap-x-2 bg-brand50 shadow-brandRed md:order-3 md:col-start-2 md:w-72 md:gap-y-5 lg:w-full">
                <div class="w-20 h-20 p-2 rounded-lg bg-brandRed text-brand100 md:order-1">
                    <ion-icon class="w-full h-full" name="tv-outline"></ion-icon>
                </div>
                <div class="flex-1 md:order-2">
                    <h2 class="text-lg font-semibold text-brandRed">
                        We Fix Software Problem
                    </h2>
                    <p class="text-sm text-brandBlack">
                        we repair your smartphone software problem. like hanging issue,
                        restarting issue.
                    </p>
                </div>
            </div>
            <!-- items 3 We Fix Software Problem end -->
        </div>
        <div
            class="flex flex-col items-center justify-center h-full my-4 rounded-lg shadow-md bg-brandRed shadow-brandRed">
            <h2
                class="text-center text-2xl font-bold text-brand100 [text-shadow:_0_1px_0_rgb(0_0_0_/_90%)] md:text-4xl lg:text-5xl">
                <span class="">Call Us: 98253 64015</span>
            </h2>
            <p class="text-sm text-center text-brand200 md:text-lg">
                <span class="">Mon to Sat: 10:00 AM to 8:00 PM</span>
            </p>
        </div>
    </section>
    <!-- why chose us end -->
    <!-- footer -->
    @include('layouts.include.guest.footer')
    <!-- footer END -->
</div>
