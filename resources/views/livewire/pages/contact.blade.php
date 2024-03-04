<div>
    <!-- welcome to -->
    <section class="relative flex flex-col justify-center w-full h-72 bg-brandBlack/80">
        <img class="object-cover object-top w-full h-full mix-blend-overlay md:object-center" src="img/bg/contactus.jpg"
            alt="" />
        <div class="absolute inset-0">
            <div class="flex flex-col items-center justify-center h-full">
                <h2 class="text-center text-3xl font-bold text-brand50 [text-shadow:_0_2px_0_rgb(255_0_0_/_90%)] md:text-4xl lg:text-5xl"
                    data-aos="fade" data-aos-offset="0" data-aos-duration="1000">
                    Contact Us
                </h2>
            </div>
        </div>
    </section>
    <section class="my-4 item-container">
        <div class="flex flex-col items-center justify-center h-full">
            <h1 class="brandTitel">
                Get In
                <span class="text-brandRed">Touch</span>
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
                <form class="p-4 border rounded-lg bg-brand100" method="POST" action="https://herotofu.com/start">
                    <div class="mb-6">

                        <x-input-label for="name" value="{{ __('Your Name') }}" />
                        <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus
                            autocomplete="name" />
                    </div>
                    <div class="mb-6">

                        {{-- <x-label for="email" value="{{ __('Email') }}" /> --}}
                        <x-text-input id="email" type="email" name="email" :value="old('email')" required />
                    </div>
                    <div class="mb-6">
                        <label for="success" class="block mb-2 text-sm font-medium text-brand800">Your Message</label>
                        <textarea rows="4"
                            class="block w-full rounded-lg border border-brandRed bg-brand50 p-2.5 text-sm text-brand900 placeholder-brand700 shadow-md shadow-brandRed focus:border-brandRed focus:ring-brandRed"
                            placeholder="Your message..."></textarea>
                    </div>
                    <button type="button"
                        class="mr-3 rounded-lg bg-brandRed px-5 py-2.5 text-center text-sm font-medium text-brand50 shadow-md shadow-brandRed hover:bg-brandRed/80 focus:outline-none focus:ring-4 focus:ring-brandRed/70 md:mr-0">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>
    <!-- component -->
    <section class="my-8 item-container">
        <div class="flex flex-col items-center justify-center h-full">
            <h1 class="brandTitel">
                Our
                <span class="text-brandRed"> Location</span>
            </h1>
            <div data-aos="slide-right" class="brandline"></div>
        </div>
        <div class="mt-4 rounded-lg shadow-lg h-96 shadow-brandRed">
            <iframe width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" title="map"
                scrolling="no"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3707.084600466851!2d72.98568731433845!3d21.699438985638864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be02735dd94270b%3A0xe34c746b41f7f69f!2sSatellite+Mobile+Institute!5e0!3m2!1sen!2sin!4v1545472010287"></iframe>
        </div>
    </section>
    <!-- footer -->
    @include('layouts.include.guest.footer')
    <!-- footer END -->
</div>
