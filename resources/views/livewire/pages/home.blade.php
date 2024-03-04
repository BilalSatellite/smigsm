<div>
    <!-- Carousel -->
    <section x-data="backgroundImage()" x-init="loop" class="relative w-full overflow-hidden bg-brandBlack">
        <img class="object-cover w-full opacity-0" src="{{ asset('img/slider/image11.jpg') }}" alt="" />
        <template x-for="(image,index) in images" :key="index">
            <div x-show="selected === index" class="absolute inset-0 "
                x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-1000"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <img class="object-cover w-full" :src="image" />
            </div>
        </template>
        <div x-data="{
            active: 0,
            loop() {
                setInterval(() => { this.active = this.active === 2 ? 0 : this.active + 1 }, 10000)
            },
        }" x-init="loop" class="absolute inset-0 bg-brandBlack/60">
            <div class="flex items-center justify-between h-full mt-8 md:mt-0 lg:-mt-20">
                <!-- Previous button -->
                <div @click="if (active > 0 ) {active -= 1} else { active = 2 }"
                    class="flex items-center p-1 ml-1 transition duration-300 bg-opacity-50 rounded-full cursor-pointer group bg-brand900 hover:bg-opacity-100 md:p-2">
                    <ion-icon
                        class="w-4 h-4 transition duration-300 text-brand300 text-opacity-30 group-hover:text-opacity-100 md:h-6 md:w-6"
                        name="arrow-undo-outline"></ion-icon>
                </div>
                <!-- End Previous button -->
                <div>
                    <!-- slide 1 -->
                    <template x-if="active == 0">
                        <div class="flex flex-col items-center overflow-hidden">
                            <h2 class="mt-1 bg-[url('/img/slider/gif/redleft.gif')] bg-cover bg-clip-text
                            bg-center bg-no-repeat pt-2 text-lg font-semibold text-transparent sm:text-4xl md:text-6xl"
                                data-aos="fade-right" data-aos-offset="0">
                                हम सिखाये आप कमाए !!!
                            </h2>
                            <h2 class="text-md mt-1 bg-[url('/img/slider/gif/redright.gif')] bg-cover bg-clip-text bg-center bg-no-repeat pt-2 font-semibold text-transparent sm:text-3xl md:text-5xl"
                                data-aos="fade-left" data-aos-offset="0">
                                छोटा कोर्स बड़ी सफ़लता !!!
                            </h2>
                            <p class="mt-0 text-xs font-medium tracking-wider text-center text-brand100 md:text-sm lg:text-lg"
                                data-aos="fade-up" data-aos-delay="500" data-aos-offset="0">
                                We provide computerized mobile repairing course in<span class="lg:hidden"><br /></span>
                                Bharuch. starting from basics to advance chip-level.
                            </p>
                            <a href="#why_chusus" type="button" class="brandBtn" data-aos="fade-up"
                                data-aos-delay="1000" data-aos-offset="0">
                                More Info
                            </a>
                        </div>
                    </template>
                    <!--End slide 1 -->
                    <!-- slide 2 -->
                    <template x-if="active == 1">
                        <div class="flex flex-col items-center mt-3 overflow-hidden">
                            <h2 class="mt-1 bg-[url('/img/slider/gif/mckh.gif')] bg-cover bg-clip-text bg-bottom bg-no-repeat pt-2 text-center text-lg font-semibold text-transparent sm:text-4xl md:text-6xl"
                                data-aos="fade-right" data-aos-offset="0">
                                मोबाइल चाहें कोई भी हो !!!
                            </h2>
                            <h2 class="text-md mt-1 bg-[url('/img/slider/gif/hhn.gif')] bg-cover bg-clip-text bg-center bg-no-repeat pt-2 text-center font-semibold text-transparent sm:text-3xl md:text-5xl"
                                data-aos="fade-left" data-aos-offset="0">
                                हम हैं ना !!!
                            </h2>
                            <p class="text-xs font-medium tracking-widest text-center sm:text-md text-brand100 md:text-lg"
                                data-aos="fade-up" data-aos-delay="500" data-aos-offset="0">
                                We Repair All Brand Mobile Phones.<span class="lg:hidden"><br /></span>
                                Screen Replacement/ Broken screen change.
                                <span class="lg:hidden"><br /></span>
                                <span class="bg-clip-text">we specialist cruve display repair.</span>
                            </p>
                            <a href="repairing.html" type="button" class="brandBtn" data-aos="fade-up"
                                data-aos-delay="1000" data-aos-offset="0">
                                More Info
                            </a>
                        </div>
                    </template>
                    <!-- End slide 2 -->
                    <!-- slide 3 -->
                    <template x-if="active == 2">
                        <div class="flex flex-col items-center overflow-hidden">
                            <h2 class="bg-[url('/img/slider/gif/19.gif')] bg-cover bg-clip-text bg-center bg-no-repeat text-center text-2xl font-semibold text-transparent sm:text-4xl md:text-7xl"
                                data-aos="zoom-in" data-aos-offset="0">
                                Satellite
                            </h2>
                            <h2 class="text-md bg-[url('/img/slider/gif/20.gif')] bg-cover bg-clip-text bg-center bg-no-repeat text-center font-semibold text-transparent sm:text-2xl"
                                data-aos="zoom-in" data-aos-delay="500" data-aos-offset="0">
                                GSM Shop
                            </h2>
                            <p class="mt-2 text-xs font-medium tracking-widest text-center sm:text-md text-brand100 md:text-lg"
                                data-aos="fade-up" data-aos-offset="0" data-aos-delay="700">
                                Buy All Mobile Accessory | Spares Parts.<span class="md:hidden"><br /></span>
                                Repairing Tools & Equipment.
                            </p>
                            <a href="index.html" type="button" class="brandBtn" data-aos="fade-up"
                                data-aos-delay="1000" data-aos-offset="0">
                                More Info
                            </a>
                        </div>
                    </template>
                    <!--End slide 3 -->
                </div>
                <!-- Next button -->
                <div class="flex items-center p-1 mr-1 transition duration-300 bg-opacity-50 rounded-full cursor-pointer group bg-brand900 hover:bg-opacity-100 md:p-2"
                    @click="if (active < 2  ) {active += 1} else { active = 0 }">
                    <ion-icon
                        class="w-4 h-4 transition duration-300 text-brand300 text-opacity-30 group-hover:text-opacity-100 md:h-6 md:w-6"
                        name="arrow-redo-outline"></ion-icon>
                </div>
                <!-- End Next button -->
            </div>
        </div>
    </section>
    <!-- Carousel End -->
    <!-- Why Chose Us -->
    <section id="why_chusus"
        class="grid grid-cols-1 py-2 overflow-hidden item-container md:py-0 lg:grid-cols-2 lg:-space-x-24">
        <div class="">
            <img class="object-cover w-full h-52 md:h-72 lg:h-full"
                src="{{ asset('img/why_chose_us/why_chose_us.jpg') }}" alt="why_chose_us" />
        </div>
        <div class="relative flex items-center justify-center">
            <div class="p-10 rounded-lg shadow-md bg-brand50 shadow-brandRed">
                <h6 data-aos="fade-left" class="text-xs text-uppercase md:text-md text-brand500 sm:text-sm"
                    style="letter-spacing: 2px">
                    Why Chose Us
                </h6>
                <h1 class="mb-3 text-lg font-bold text-brandBlack sm:text-2xl md:text-3xl lg:text-4xl">
                    We Provide Advance Chip-Level
                    <span class="text-brandRed">Mobile Repairing Course</span>
                </h1>
                <p class="text-xs text-brand600 sm:text-sm md:text-lg">
                    Satellite Mobile Institute is a premier mobile phone repair training
                    institute and one of the best in BHARUCH with a well established
                    training centre. We provide computerized mobile repairing course in
                    Bharuch starting from basics to Advance Chip-Level Mobile Repairing
                    Course.
                </p>
                <div class="flex mb-4 gap-x-4">
                    <div class="">
                        <img data-aos="zoom-in" data-aos-offset="80" data-aos-delay="500" class="rounded-md"
                            src="{{ asset('img/why_chose_us/Mobile_Repairing_Course.jpg') }}"
                            alt="Mobile_Repairing_Course" />
                    </div>
                    <div class="">
                        <img data-aos="zoom-in" data-aos-offset="80" data-aos-delay="700" class="rounded-md"
                            src="{{ asset('img/why_chose_us/ISP_&_ChipOff_Unlocking.jpg') }}"
                            alt="ISP_&_ChipOff_Unlocking" />
                    </div>
                </div>
                <button type="button" class="brandBtn">More Info</button>
            </div>
        </div>
    </section>
    <!-- Why Chose Us End -->
    <!-- Service -->
    <section class="overflow-hidden item-container">
        <div
            class="item-container mt-2 grid grid-cols-1 items-center justify-center gap-x-2 border-b-[1px] border-brandRed md:grid-cols-2 lg:grid-cols-3">
            <div data-aos="zoom-in" data-aos-offset="80" data-aos-delay="300" class="flex items-center my-2">
                <img class="w-20 h-20 mr-4 rounded-full" src="{{ asset('img/Service/books.png') }}"
                    alt="Less theory more practicals" />
                <div class="text-sm">
                    <h5 class="text-lg leading-none text-brandRed">Less Theory</h5>
                    <p class="text-brand600">
                        Less theory more practicals. 25% theory 75% practical course.
                    </p>
                </div>
            </div>
            <div data-aos="zoom-in" data-aos-offset="80" data-aos-delay="600" class="flex items-center my-2">
                <img class="w-20 h-20 mr-4 rounded-full" src="{{ asset('img/Service/help.png') }}"
                    alt="Free lifetime technical help and support" />
                <div class="text-sm">
                    <h5 class="text-lg leading-none text-brandRed">Lifetime Support</h5>
                    <p class="text-brand600">
                        Free lifetime technical help and support after completion of the
                        course.
                    </p>
                </div>
            </div>
            <div data-aos="zoom-in" data-aos-offset="80" data-aos-delay="900" class="flex items-center my-2">
                <img class="w-20 h-20 mr-4" src="{{ asset('img/Service/certificate.png') }}"
                    alt=" A certificate will be issued" />
                <div class="text-sm">
                    <h5 class="text-lg leading-none text-brandRed">
                        Certificate After Successful
                    </h5>
                    <p class="text-brand600">
                        A certificate will be issued after successful completion of the
                        course.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Service End -->
    <!-- Salient Features  -->
    <section class="overflow-hidden " id="salient_features">
        <div class="pt-10 my-2 item-container">
            <div class="text-center">
                <h1 class="brandTitel">
                    Salient Features of Our
                    <span class="text-brandRed">Mobile Repairing Course</span>
                </h1>
                <div data-aos="slide-right" class="brandline"></div>
                <p class="mx-auto text-base leading-relaxed text-brand600 lg:w-3/4 xl:w-2/4">
                    Teaching is conducted at our fully equipped training centre in
                    Bharuch, India. Advance training by highly experienced & qualified
                    professionals. Less theory more practicals.
                </p>
            </div>
            <div class="grid justify-center grid-cols-1 gap-2 sm:grid-cols-2 sm:gap-3 md:grid-cols-3">
                <div data-aos="fade-right" data-aos-offset="80" data-aos-delay="300"
                    class="relative flex justify-center overflow-hidden rounded-lg group bg-brandBlack/50">
                    <img class="object-cover transition-all duration-300 rounded-lg mix-blend-overlay group-hover:scale-105"
                        src="{{ asset('img/salient_features/double_decker_CPU_reballing.jpg') }}"
                        alt="double_decker_CPU_reballing" />
                    <div class="absolute inset-0 flex items-center justify-center rounded-lg">
                        <h2
                            class="p-1 font-bold tracking-wider text-center duration-300 rounded-md bg-brandBlack group-hover:translate-y-10 group-hover:bg-brandRed">
                            <span class="duration-100 text-brand50">Double Decker CPU Reballing</span>
                        </h2>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-offset="80" data-aos-delay="300"
                    class="relative flex justify-center overflow-hidden rounded-lg group bg-brandBlack/50">
                    <img class="object-cover duration-300 rounded-lg mix-blend-overlay group-hover:scale-105"
                        src="{{ asset('img/salient_features/Black_&_White_Pasted_Ic_Reballing.jpg') }}"
                        alt="Black & White Pasted Ic Reballing" />
                    <div class="absolute inset-0 flex items-center justify-center rounded-lg">
                        <h2
                            class="p-1 font-bold tracking-wider text-center duration-300 rounded-md bg-brandBlack group-hover:translate-y-10 group-hover:bg-brandRed">
                            <span class="duration-100 text-brand50">Black & White Pasted Ic Reballing</span>
                        </h2>
                    </div>
                </div>
                <div data-aos="fade-left" data-aos-offset="80" data-aos-delay="300"
                    class="relative flex justify-center overflow-hidden rounded-lg group bg-brandBlack/50">
                    <img class="object-cover duration-300 rounded-lg y mix-blend-overlay group-hover:scale-105"
                        src="{{ asset('img/salient_features/Micro_Soldering.jpg') }}" alt="Micro_Soldering" />
                    <div class="absolute inset-0 flex items-center justify-center rounded-lg">
                        <h2
                            class="p-1 font-bold tracking-wider text-center duration-300 rounded-md bg-brandBlack group-hover:translate-y-10 group-hover:bg-brandRed">
                            <span class="duration-100 text-brand50">Micro Soldering</span>
                        </h2>
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-offset="80" data-aos-delay="300"
                    class="relative flex justify-center overflow-hidden rounded-lg group bg-brandBlack/50">
                    <img class="object-cover duration-300 rounded-lg mix-blend-overlay group-hover:scale-105"
                        src="{{ asset('img/salient_features/eMMC_&_UFS_Programming.jpg') }}"
                        alt="eMMC & UFS Programming" />
                    <div class="absolute inset-0 flex items-center justify-center rounded-lg">
                        <h2
                            class="p-1 font-bold tracking-wider text-center duration-300 rounded-md bg-brandBlack group-hover:translate-y-10 group-hover:bg-brandRed">
                            <span class="duration-100 text-brand50">eMMC & UFS Programming</span>
                        </h2>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-offset="80" data-aos-delay="300"
                    class="relative flex justify-center overflow-hidden rounded-lg group bg-brandBlack/50">
                    <img class="object-cover duration-300 rounded-lg mix-blend-overlay group-hover:scale-105"
                        src="{{ asset('img/salient_features/ISP_&_ChipOff_Unlocking.jpg') }}"
                        alt="ISP & ChipOff Unlocking" />
                    <div class="absolute inset-0 flex items-center justify-center rounded-lg">
                        <h2
                            class="p-1 font-bold tracking-wider text-center duration-300 rounded-md bg-brandBlack group-hover:translate-y-10 group-hover:bg-brandRed">
                            <span class="duration-100 text-brand50">ISP & ChipOff Unlocking</span>
                        </h2>
                    </div>
                </div>
                <div data-aos="fade-left" data-aos-offset="80" data-aos-delay="300"
                    class="relative flex justify-center overflow-hidden rounded-lg group bg-brandBlack/50">
                    <img class="object-cover duration-300 rounded-lg mix-blend-overlay group-hover:scale-105"
                        src="{{ asset('img/salient_features/Flashing_and_Unlocking.jpg') }}"
                        alt="Flashing and Unlocking" />
                    <div class="absolute inset-0 flex items-center justify-center rounded-lg">
                        <h2
                            class="p-1 font-bold tracking-wider text-center duration-300 rounded-md bg-brandBlack group-hover:translate-y-10 group-hover:bg-brandRed">
                            <span class="duration-100 text-brand50">Flashing and Unlocking</span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Salient Features END -->
    <!-- Hardware Course -->
    <section id="hardware_course" class="overflow-hidden scroll-mt-14">
        <div class="pt-10 my-2 item-container">
            <div class="mb-6 text-center">
                <h1 class="brandTitel">
                    Hardware <span class="text-brandRed">Course Syllabus</span>
                </h1>
                <div data-aos="slide-right" class="brandline"></div>
                <p class="mx-auto text-base leading-relaxed text-brand600 lg:w-3/4 xl:w-2/4">
                    What we do and what can you expect from us.
                </p>
            </div>
            <div class="flex flex-col items-center w-full md:flex-row">
                <div class="w-full md:w-1/2 md:py-6 md:pr-10">
                    <div class="relative flex pb-3">
                        <div class="absolute inset-0 flex items-center justify-center w-10 h-full">
                            <div class="w-1 h-full pointer-events-none bg-brandRed/80"></div>
                        </div>
                        <div
                            class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-white rounded-full bg-brandRed">
                            <ion-icon class="w-6 h-6" name="hardware-chip-outline"></ion-icon>
                        </div>
                        <div data-aos="fade-left" data-aos-offset="80" class="flex-grow pl-4">
                            <h2 class="mb-1 text-lg font-medium tracking-wider title-font text-brandBlack">
                                Basic Electronics Components
                            </h2>
                            <p class="leading-relaxed text-brand600">
                                How to identify and testing electronic components.How to use a
                                multimeter.How to measuring voltage, current, resistance and
                                continuity...
                            </p>
                        </div>
                    </div>
                    <div class="relative flex pb-3">
                        <div class="absolute inset-0 flex items-center justify-center w-10 h-full">
                            <div class="w-1 h-full pointer-events-none bg-brandRed/80"></div>
                        </div>
                        <div
                            class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-white rounded-full bg-brandRed">
                            <ion-icon class="w-6 h-6" name="pencil-outline"></ion-icon>
                        </div>
                        <div data-aos="fade-left" data-aos-offset="80" class="flex-grow pl-4">
                            <h2 class="mb-1 text-lg font-medium tracking-wider title-font text-brandBlack">
                                Soldering and Desoldering
                            </h2>
                            <p class="leading-relaxed text-brand600">
                                Proper procedure of soldering and desoldering.Micro
                                jumpering.Plastic connector replace with smd rework station.
                            </p>
                        </div>
                    </div>
                    <div class="relative flex pb-3">
                        <div class="absolute inset-0 flex items-center justify-center w-10 h-full">
                            <div class="w-1 h-full pointer-events-none bg-brandRed/80"></div>
                        </div>
                        <div
                            class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-white rounded-full bg-brandRed">
                            <ion-icon class="w-6 h-6" name="phone-portrait-outline"></ion-icon>
                        </div>
                        <div data-aos="fade-left" data-aos-offset="80" class="flex-grow pl-4">
                            <h2 class="mb-1 text-lg font-medium tracking-wider title-font text-brandBlack">
                                Mobile Display Repair
                            </h2>
                            <p class="leading-relaxed text-brand600">
                                How to replace mobile screen and mobile touch screen.How to
                                separate glass. Used OCA machine.
                            </p>
                        </div>
                    </div>
                    <div class="relative flex pb-3">
                        <div class="absolute inset-0 flex items-center justify-center w-10 h-full">
                            <div class="w-1 h-full pointer-events-none bg-brandRed/80"></div>
                        </div>
                        <div
                            class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-white rounded-full bg-brandRed">
                            <ion-icon class="w-6 h-6" name="reader-outline"></ion-icon>
                        </div>
                        <div data-aos="fade-left" data-aos-offset="80" class="flex-grow pl-4">
                            <h2 class="mb-1 text-lg font-medium tracking-wider title-font text-brandBlack">
                                Schematic diagram
                            </h2>
                            <p class="leading-relaxed text-brand600">
                                How to read mobile schematic diagram.Try recognizing which
                                sections are which, and following the flow of circuit from
                                input to output.
                            </p>
                        </div>
                    </div>
                    <div class="relative flex pb-3">
                        <div class="absolute inset-0 flex items-center justify-center w-10 h-full">
                            <div class="w-1 h-full pointer-events-none bg-brandRed/80"></div>
                        </div>
                        <div
                            class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-white rounded-full bg-brandRed">
                            <ion-icon class="w-6 h-6" name="construct-outline"></ion-icon>
                        </div>
                        <div data-aos="fade-left" data-aos-offset="80" class="flex-grow pl-4">
                            <h2 class="mb-1 text-lg font-medium tracking-wider title-font text-brandBlack">
                                Fault Finding
                            </h2>
                            <p class="leading-relaxed text-brand600">
                                How to check fault step by step in All brand mobile phones.
                            </p>
                        </div>
                    </div>
                    <div class="relative flex">
                        <div
                            class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-white rounded-full bg-brandRed">
                            <ion-icon class="w-6 h-6" name="ribbon-outline"></ion-icon>
                        </div>
                        <div data-aos="fade-left" data-aos-offset="80" class="flex-grow pl-4">
                            <h2 class="mb-1 text-lg font-medium tracking-wider title-font text-brandBlack">
                                After Completing The Course
                            </h2>
                            <p class="leading-relaxed text-brand600">
                                A certificate will be issued.Free technical help and support.
                                We will help you decide if you want to start your cell phone
                                repair business.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-12 rounded-lg h-80 min-h-max bg-brandBlack/50 md:mt-0 md:h-full md:w-1/2">
                    <img class="object-cover object-center w-full h-full rounded-lg mix-blend-overlay"
                        src="{{ asset('img/Hardware_Course_Syllabus.jpg') }}" alt="Hardware_Course_Syllabus" />
                </div>
            </div>
        </div>
    </section>
    <!-- Hardware Course END -->
    <!-- Software Course -->
    <section id="software_course" class="overflow-hidden scroll-mt-14">
        <div class="pt-10 my-2 item-container">
            <div class="mb-6 text-center">
                <h1 class="brandTitel">
                    Software <span class="text-brandRed">Course Syllabus</span>
                </h1>
                <div data-aos="slide-right" class="brandline"></div>
                <p class="mx-auto text-base leading-relaxed text-brand600 lg:w-3/4 xl:w-2/4">
                    Advance mobile software solutions.
                </p>
            </div>
            <div class="flex flex-col items-center w-full gap-x-2 md:flex-row">
                <div class="w-full md:order-2 md:w-1/2 md:py-6 md:pr-10">
                    <div class="relative flex pb-3 lg:pb-8">
                        <div class="absolute inset-0 flex items-center justify-center w-10 h-full">
                            <div class="w-1 h-full pointer-events-none bg-brandRed/80"></div>
                        </div>
                        <div
                            class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-white rounded-full bg-brandRed">
                            <ion-icon class="w-6 h-6" name="laptop-outline"></ion-icon>
                        </div>
                        <div data-aos="fade-left" data-aos-offset="80" class="flex-grow pl-4">
                            <h2 class="mb-1 text-lg font-medium tracking-wider title-font text-brandBlack">
                                Basic Computer Knowledge
                            </h2>
                            <p class="leading-relaxed text-brand600">
                                Basic computer knowledge is about how computers work and how
                                to use them. Driver and Software instalation. how to os
                                installation.
                            </p>
                        </div>
                    </div>
                    <div class="relative flex pb-3 lg:pb-8">
                        <div class="absolute inset-0 flex items-center justify-center w-10 h-full">
                            <div class="w-1 h-full pointer-events-none bg-brandRed/80"></div>
                        </div>
                        <div
                            class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-white rounded-full bg-brandRed">
                            <ion-icon class="w-6 h-6" name="information-circle-outline"></ion-icon>
                        </div>
                        <div data-aos="fade-left" data-aos-offset="80" class="flex-grow pl-4">
                            <h2 class="mb-1 text-lg font-medium tracking-wider title-font text-brandBlack">
                                Introduction GSM Box
                            </h2>
                            <p class="leading-relaxed text-brand600">
                                Which software is used for Flashing and Unlocking phones. and
                                how to use them.
                            </p>
                        </div>
                    </div>
                    <div class="relative flex pb-3 lg:pb-8">
                        <div class="absolute inset-0 flex items-center justify-center w-10 h-full">
                            <div class="w-1 h-full pointer-events-none bg-brandRed/80"></div>
                        </div>
                        <div
                            class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-white rounded-full bg-brandRed">
                            <ion-icon class="w-6 h-6" name="swap-horizontal-outline"></ion-icon>
                        </div>
                        <div data-aos="fade-left" data-aos-offset="80" class="flex-grow pl-4">
                            <h2 class="mb-1 text-lg font-medium tracking-wider title-font text-brandBlack">
                                Interface In Mobile
                            </h2>
                            <p class="leading-relaxed text-brand600">
                                What is interface work and it's use.like USB,UART and ISP.
                            </p>
                        </div>
                    </div>
                    <div class="relative flex pb-3 lg:pb-8">
                        <div class="absolute inset-0 flex items-center justify-center w-10 h-full">
                            <div class="w-1 h-full pointer-events-none bg-brandRed/80"></div>
                        </div>
                        <div
                            class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-white rounded-full bg-brandRed">
                            <ion-icon class="w-6 h-6" name="enter-outline"></ion-icon>
                        </div>
                        <div data-aos="fade-left" data-aos-offset="80" class="flex-grow pl-4">
                            <h2 class="mb-1 text-lg font-medium tracking-wider title-font text-brandBlack">
                                How to Flashing & Updating
                            </h2>
                            <p class="leading-relaxed text-brand600">
                                How do you Flash and Update your phone?. How do you flash a
                                locked phone?
                            </p>
                        </div>
                    </div>
                    <div class="relative flex pb-3 lg:pb-8">
                        <div class="absolute inset-0 flex items-center justify-center w-10 h-full">
                            <div class="w-1 h-full pointer-events-none bg-brandRed/80"></div>
                        </div>
                        <div
                            class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-white rounded-full bg-brandRed">
                            <ion-icon class="w-6 h-6" name="lock-open-outline"></ion-icon>
                        </div>
                        <div data-aos="fade-left" data-aos-offset="80" class="flex-grow pl-4">
                            <h2 class="mb-1 text-lg font-medium tracking-wider title-font text-brandBlack">
                                How to Unlocking
                            </h2>
                            <p class="leading-relaxed text-brand600">
                                How do you Unlock your phone?.
                            </p>
                        </div>
                    </div>
                    <div class="relative flex">
                        <div
                            class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-white rounded-full bg-brandRed">
                            <ion-icon class="w-6 h-6" name="search-outline"></ion-icon>
                        </div>
                        <div data-aos="fade-left" data-aos-offset="80" class="flex-grow pl-4">
                            <h2 class="mb-1 text-lg font-medium tracking-wider title-font text-brandBlack">
                                Data Recovery
                            </h2>
                            <p class="leading-relaxed text-brand600">
                                how to data recovery in android and iphone phone.
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="w-full mt-12 rounded-lg h-80 min-h-max bg-brandBlack/50 md:order-1 md:mt-0 md:h-full md:w-1/2">
                    <img class="object-cover object-center w-full h-full rounded-lg mix-blend-overlay"
                        src="{{ asset('img/Software_Course_Syllabus.jpg') }}" alt="Software Course Syllabus" />
                </div>
            </div>
        </div>
    </section>
    <!-- Software Course END -->
    <!-- Trouble With Your Phone?-->
    <section>
        <div class="flex flex-col items-center justify-center h-48 mb-6 item-container md:h-64">
            <div
                class="relative flex flex-col items-center w-full h-full py-6 overflow-hidden text-center rounded-md border-1 border-brandRed">
                <img class="absolute inset-0 object-cover" src="{{ asset('img/Trouble_With_Your_Phone.jpg') }}"
                    alt="" />
                <div class="absolute inset-0 object-cover bg-brandRed bg-opacity-40"></div>
                <div class="absolute w-full transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <h2 class="text-2xl font-bold text-brandBlack md:text-4xl">
                        Trouble With <span class="text-brand100">Your Phone?</span>
                    </h2>
                    <p class="mb-4 text-sm text-brand300">
                        We offer you a fast qualit repair service.
                    </p>
                    <a href="repairing.html" class="brandBtn">More Info</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Trouble With Your Phone? END-->
    <!-- footer -->
    @include('layouts.include.guest.footer')
    <!-- footer END -->

</div>
@push('scripts')
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
                    "{{ asset('img/slider/image6.jpg') }}",
                    "{{ asset('img/slider/image7.jpg') }}",
                    "{{ asset('img/slider/image8.jpg') }}",
                    "{{ asset('img/slider/image9.jpg') }}",
                    "{{ asset('img/slider/image10.jpg') }}",
                    "{{ asset('img/slider/image11.jpg') }}",
                    "{{ asset('img/slider/image12.jpg') }}",
                    "{{ asset('img/slider/image13.jpg') }}",
                    "{{ asset('img/slider/image14.jpg') }}",
                    "{{ asset('img/slider/image15.jpg') }}",
                ],
            };
        };
    </script>
@endpush
