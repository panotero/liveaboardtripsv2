<!doctype html>
<html lang="en">

<x-head>
    Home
</x-head>


<body class="bg-sky-50 text-gray-800">
    <x-navbar />

    <!-- Hero Search Section -->
    <section
        class="relative min-h-screen pt-28 flex items-center overflow-hidden bg-gradient-to-br from-blue-400 via-cyan-300 to-teal-400">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-blue-900 opacity-20"></div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <!-- LEFT SIDE — HEADLINE -->
            <div class="text-white animate-slide-in">
                <h1 class="text-5xl md:text-7xl font-bold leading-tight drop-shadow-lg mb-6">
                    Your adventure<br />starts here.
                </h1>

                <p class="text-lg md:text-xl opacity-95 mb-8 max-w-xl">
                    Discover world-class dive destinations, luxury liveaboards, and
                    unforgettable underwater experiences.
                </p>

                <div class="hidden md:block">
                    <button
                        class="bg-white text-blue-600 hover:bg-blue-50 px-10 py-4 rounded-full text-lg font-semibold transition-all duration-300 hover:scale-105 shadow-2xl">
                        Explore Trips
                    </button>
                </div>
            </div>

            <!-- RIGHT SIDE — SEARCH CARD -->
            <div class="bg-white/95 backdrop-blur-lg rounded-3xl shadow-2xl p-8 w-full max-w-xl mx-auto">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">
                    Find Your Dive Destination
                </h2>

                <div class="space-y-5">
                    <!-- Location -->
                    <div>
                        <label class=" text-sm font-semibold text-gray-600 mb-2 flex">
                            Destination<p class="text-red-600 ml-1">*</p>
                        </label>
                        <input type="text" id="destination" placeholder="e.g. Tubbataha, Maldives, Raja Ampat"
                            class="w-full px-5 py-4 rounded-xl border border-gray-200 focus:ring-2 focus:ring-cyan-400 outline-none" />
                    </div>

                    <!-- Date -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="h-auto">
                            <label class="block text-sm font-semibold text-gray-600 mb-2">
                                Check-in
                                <p class="text-[12px]">(leave blank to get all available trip dates)</p>
                            </label>
                            <input type="date" id="date"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-cyan-400 outline-none" />
                        </div>
                        <div class="h-auto flex flex-col justify-end">
                            <label class="block text-sm font-semibold text-gray-600 mb-2">
                                Duration
                            </label>
                            <select id="duration"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-cyan-400 outline-none">
                                <option value="3-4">3–4 Nights</option>
                                <option value="5-7">5–7 Nights</option>
                                <option value="8-10">8–10 Nights</option>
                                <option value="11">11+ Nights</option>
                            </select>
                        </div>
                    </div>

                    <!-- Divers -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-2">
                            Number of PAX
                        </label>
                        <select id="PAX"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-cyan-400 outline-none">
                            <option value="1">1 PAX</option>
                            <option value="2">2 PAX</option>
                            <option value="5">3 PAX</option>
                            <option value="4">4+ PAX</option>
                        </select>
                    </div>

                    <!-- Search Button -->
                    <button id="searchbutton"
                        class="w-full bg-gradient-to-r from-cyan-500 to-teal-500 text-white font-semibold py-4 rounded-xl text-lg shadow-lg hover:scale-[1.02] transition-all duration-300">
                        Search Liveaboards
                    </button>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <h2
                class="text-5xl font-bold text-center mb-16 bg-gradient-to-r from-blue-600 to-teal-500 bg-clip-text text-transparent">
                Why Choose Us
            </h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div
                    class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-3xl p-8 hover:shadow-xl transition-all duration-300 hover:scale-105 border border-blue-100">
                    <div
                        class="bg-gradient-to-br from-blue-500 to-blue-600 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-blue-700">
                        Certified Crew
                    </h3>
                    <p class="text-gray-600 leading-relaxed">
                        Professional dive masters and instructors with years of experience
                        ensuring your safety and unforgettable underwater adventures.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div
                    class="bg-gradient-to-br from-teal-50 to-cyan-50 rounded-3xl p-8 hover:shadow-xl transition-all duration-300 hover:scale-105 border border-teal-100">
                    <div
                        class="bg-gradient-to-br from-teal-500 to-teal-600 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-teal-700">Luxury Cabins</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Comfortable air-conditioned cabins with ensuite bathrooms,
                        providing a relaxing retreat after exciting dives.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div
                    class="bg-gradient-to-br from-cyan-50 to-blue-50 rounded-3xl p-8 hover:shadow-xl transition-all duration-300 hover:scale-105 border border-cyan-100">
                    <div
                        class="bg-gradient-to-br from-cyan-500 to-blue-500 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-cyan-700">
                        Gourmet Dining
                    </h3>
                    <p class="text-gray-600 leading-relaxed">
                        Freshly prepared meals with international and local cuisine,
                        accommodating dietary preferences and restrictions.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div
                    class="bg-gradient-to-br from-blue-50 to-teal-50 rounded-3xl p-8 hover:shadow-xl transition-all duration-300 hover:scale-105 border border-blue-100">
                    <div
                        class="bg-gradient-to-br from-blue-600 to-teal-500 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-blue-700">
                        Best Dive Sites
                    </h3>
                    <p class="text-gray-600 leading-relaxed">
                        Carefully selected routes covering pristine reefs, thrilling drift
                        dives, and encounters with magnificent marine life.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Underwater Gallery Section -->
    <section class="py-20 px-6 bg-gradient-to-br from-cyan-100 via-blue-50 to-teal-100">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-5xl font-bold text-center mb-16 text-blue-800">
                Explore Liveaboard Destinations
            </h2>
            <div id="galleryGrid" class="grid md:grid-cols-3 gap-6">
                <!-- Dynamic gallery items will populate here -->
            </div>
        </div>
    </section>
    <section class="py-20 px-6 bg-gradient-to-br from-cyan-100 via-blue-50 to-teal-100 hidden">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold text-center mb-14 text-blue-800">
                Underwater Wonders
            </h2>

            <!-- Masonry Columns -->
            <div class="columns-2 sm:columns-3 lg:columns-4 gap-4 space-y-4">
                <!-- TILE -->
                <div class="break-inside-avoid relative group overflow-hidden rounded-2xl shadow-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800"
                        class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110"
                        alt="Coral Gardens" loading="lazy" />
                    <div
                        class="absolute inset-0 flex items-end p-4 bg-gradient-to-t from-black/80 via-black/30 to-transparent text-white font-semibold text-lg">
                        Coral Gardens
                    </div>
                </div>

                <div class="break-inside-avoid relative group overflow-hidden rounded-2xl shadow-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=600"
                        class="w-full h-40 object-cover transition-transform duration-500 group-hover:scale-110"
                        alt="Sea Turtles" loading="lazy" />
                    <div
                        class="absolute inset-0 flex items-end p-4 bg-gradient-to-t from-black/80 via-black/30 to-transparent text-white font-semibold">
                        Sea Turtles
                    </div>
                </div>

                <div class="break-inside-avoid relative group overflow-hidden rounded-2xl shadow-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1682687220742-aba13b6e50ba?w=1000"
                        class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110"
                        alt="Schools of Fish" loading="lazy" />
                    <div
                        class="absolute inset-0 flex items-end p-4 bg-gradient-to-t from-black/80 via-black/30 to-transparent text-white font-semibold">
                        Schools of Fish
                    </div>
                </div>

                <div class="break-inside-avoid relative group overflow-hidden rounded-2xl shadow-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1583212292454-1fe6229603b7?w=600"
                        class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-110"
                        alt="Manta Rays" loading="lazy" />
                    <div
                        class="absolute inset-0 flex items-end p-4 bg-gradient-to-t from-black/80 via-black/30 to-transparent text-white font-semibold text-lg">
                        Manta Rays
                    </div>
                </div>

                <div class="break-inside-avoid relative group overflow-hidden rounded-2xl shadow-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1546026423-cc4642628d2b?w=600"
                        class="w-full h-44 object-cover transition-transform duration-500 group-hover:scale-110"
                        alt="Reef Life" loading="lazy" />
                    <div
                        class="absolute inset-0 flex items-end p-4 bg-gradient-to-t from-black/80 via-black/30 to-transparent text-white font-semibold">
                        Reef Life
                    </div>
                </div>

                <div class="break-inside-avoid relative group overflow-hidden rounded-2xl shadow-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1583212292454-1fe6229603b7?w=1000"
                        class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110"
                        alt="Shark Encounters" loading="lazy" />
                    <div
                        class="absolute inset-0 flex items-end p-4 bg-gradient-to-t from-black/80 via-black/30 to-transparent text-white font-semibold">
                        Shark Encounters
                    </div>
                </div>

                <div class="break-inside-avoid relative group overflow-hidden rounded-2xl shadow-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=600"
                        class="w-full h-60 object-cover transition-transform duration-500 group-hover:scale-110"
                        alt="Wreck Diving" loading="lazy" />
                    <div
                        class="absolute inset-0 flex items-end p-4 bg-gradient-to-t from-black/80 via-black/30 to-transparent text-white font-semibold">
                        Wreck Diving
                    </div>
                </div>

                <div class="break-inside-avoid relative group overflow-hidden rounded-2xl shadow-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=600"
                        class="w-full h-40 object-cover transition-transform duration-500 group-hover:scale-110"
                        alt="Macro Life" loading="lazy" />
                    <div
                        class="absolute inset-0 flex items-end p-4 bg-gradient-to-t from-black/80 via-black/30 to-transparent text-white font-semibold">
                        Macro Life
                    </div>
                </div>

                <div class="break-inside-avoid relative group overflow-hidden rounded-2xl shadow-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1682687220742-aba13b6e50ba?w=600"
                        class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110"
                        alt="Octopus" loading="lazy" />
                    <div
                        class="absolute inset-0 flex items-end p-4 bg-gradient-to-t from-black/80 via-black/30 to-transparent text-white font-semibold">
                        Octopus
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Destinations Slideshow -->
    <section class="py-20 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <h2
                class="text-5xl font-bold text-center mb-16 bg-gradient-to-r from-blue-600 to-teal-500 bg-clip-text text-transparent">
                Featured Destinations
            </h2>
            <div class="relative rounded-3xl overflow-hidden shadow-2xl" style="height: 500px">
                <div id="slideshow" class="relative w-full h-full">
                    <div class="slideshow-item absolute inset-0">
                        <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=1200"
                            alt="Destination 1" class="w-full h-full object-cover" />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-blue-900 via-transparent to-transparent flex items-end p-12">
                            <div>
                                <h3 class="text-4xl font-bold text-white mb-2">Raja Ampat</h3>
                                <p class="text-gray-200 text-lg">
                                    The heart of coral diversity
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex gap-3">
                    <button onclick="changeSlide(0)"
                        class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition-opacity"></button>
                    <button onclick="changeSlide(1)"
                        class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition-opacity"></button>
                    <button onclick="changeSlide(2)"
                        class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition-opacity"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Partner Vessels Section -->
    <section class="py-20 px-6 bg-sky-50 hidden">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-5xl font-bold text-center mb-16 text-blue-800">
                Our Fleet of Vessels
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center">
                <div
                    class="bg-white rounded-2xl p-8 flex items-center justify-center h-32 hover:shadow-lg transition-all duration-300 border border-blue-100">
                    <span class="text-2xl font-bold text-blue-600">MV Ocean Explorer</span>
                </div>
                <div
                    class="bg-white rounded-2xl p-8 flex items-center justify-center h-32 hover:shadow-lg transition-all duration-300 border border-teal-100">
                    <span class="text-2xl font-bold text-teal-600">SS Blue Horizon</span>
                </div>
                <div
                    class="bg-white rounded-2xl p-8 flex items-center justify-center h-32 hover:shadow-lg transition-all duration-300 border border-cyan-100">
                    <span class="text-2xl font-bold text-cyan-600">MV Coral Dream</span>
                </div>
                <div
                    class="bg-white rounded-2xl p-8 flex items-center justify-center h-32 hover:shadow-lg transition-all duration-300 border border-blue-100">
                    <span class="text-2xl font-bold text-blue-600">SS Wave Rider</span>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">

            <div class="mb-16">
                <p class="text-4xl font-black uppercase tracking-tighter text-slate-900 leading-none">The <span
                        class="bg-gradient-to-r from-blue-600 to-teal-500 bg-clip-text text-transparent">Reader</span>
                    Review</p>
            </div>

            <div id="reviews-carousel" class="relative w-full" data-carousel="slide">
                <div class="relative h-[500px] overflow-hidden rounded-[3rem] md:h-[350px]" id="testimonial-carousel">

                    <!-- SLIDE TEMPLATE -->
                    <div class="hidden duration-700 ease-in-out testimonial-slide" data-carousel-item>
                        <div
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2
                   bg-slate-50 border border-slate-100 p-8 md:p-12
                   flex flex-col md:flex-row items-center gap-10 shadow-sm">

                            <!-- Avatar -->
                            <div
                                class="w-32 h-32 md:w-44 md:h-44 rounded-full overflow-hidden
                       flex-shrink-0 border-4 border-white shadow-lg">
                                <img class="avatar w-full h-full object-cover grayscale" alt="User">
                            </div>

                            <!-- Content -->
                            <div class="flex-grow">
                                <!-- Stars -->
                                <div class="flex items-center gap-1 mb-4 text-amber-400">
                                    <template id="stars-template">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </template>
                                </div>

                                <p
                                    class="comment text-xl md:text-2xl font-light text-slate-700 leading-snug mb-6 italic">
                                </p>

                                <div class="flex items-center gap-4">
                                    <span class="h-[1px] w-8 bg-blue-600"></span>
                                    <p class="name text-[10px] font-black uppercase tracking-widest text-slate-900">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="absolute z-30 flex space-x-3 -bottom-10 left-1/2 -translate-x-1/2"
                    id="carousel-indicators">
                    <button type="button" class="w-2 h-2 rounded-full bg-blue-600" aria-current="true"
                        aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-2 h-2 rounded-full bg-slate-300" aria-current="false"
                        aria-label="Slide 2" data-carousel-slide-to="1"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Us Section -->
    <section class="py-20 px-6 bg-white">
        <div class="max-w-4xl mx-auto">
            <h2
                class="text-5xl font-bold text-center mb-6 bg-gradient-to-r from-blue-600 to-teal-500 bg-clip-text text-transparent">
                Book Your Dive Trip
            </h2>
            <p class="text-center text-gray-600 text-xl mb-12">
                Ready to explore the underwater world? Get in touch with us today!
            </p>
            <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-3xl p-10 border border-blue-200 shadow-xl">
                <div class="space-y-6">
                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Email Address</label>
                        <input type="email" placeholder="your.email@example.com"
                            class="w-full px-6 py-4 rounded-2xl bg-white border border-blue-200 text-gray-800 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-300 transition-all duration-300" />
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Contact Number</label>
                        <input type="tel" placeholder="+1 (555) 123-4567"
                            class="w-full px-6 py-4 rounded-2xl bg-white border border-blue-200 text-gray-800 placeholder-gray-400 focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-300 transition-all duration-300" />
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Your Message</label>
                        <textarea rows="6" placeholder="Tell us about your diving experience and preferences..."
                            class="w-full px-6 py-4 rounded-2xl bg-white border border-blue-200 text-gray-800 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-300 transition-all duration-300 resize-none"></textarea>
                    </div>
                    <button
                        class="w-full bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-500 hover:to-teal-400 py-4 rounded-2xl text-white font-bold text-lg transition-all duration-300 hover:scale-105 shadow-lg">
                        Send Inquiry
                    </button>
                </div>
            </div>
        </div>
    </section>

    <x-footer />

    <script>
        const slides = [{
                img: "https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=1200",
                title: "Raja Ampat",
                desc: "The heart of coral diversity",
            },
            {
                img: "https://images.unsplash.com/photo-1583212292454-1fe6229603b7?w=1200",
                title: "Komodo National Park",
                desc: "Incredible marine biodiversity",
            },
            {
                img: "https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=1200",
                title: "Maldives Atolls",
                desc: "Pristine reefs and manta encounters",
            },
        ];

        let currentSlide = 0;

        function changeSlide(index) {
            currentSlide = index;
            updateSlide();
        }

        function updateSlide() {
            const slideshow = document.getElementById("slideshow");
            const slide = slides[currentSlide];

            slideshow.innerHTML = `
                <div class="slideshow-item absolute inset-0">
                    <img src="${slide.img}" alt="Destination ${currentSlide + 1}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900 via-transparent to-transparent flex items-end p-12">
                        <div>
                            <h3 class="text-4xl font-bold text-white mb-2">${slide.title}</h3>
                            <p class="text-gray-200 text-lg">${slide.desc}</p>
                        </div>
                    </div>
                </div>
            `;

            // Update dots
            const buttons = document.querySelectorAll(
                'button[onclick^="changeSlide"]',
            );
            buttons.forEach((btn, idx) => {
                if (idx === currentSlide) {
                    btn.classList.remove("opacity-50");
                    btn.classList.add("opacity-100");
                } else {
                    btn.classList.remove("opacity-100");
                    btn.classList.add("opacity-50");
                }
            });
        }

        // Auto-advance slideshow
        setInterval(() => {
            currentSlide = (currentSlide + 1) % slides.length;
            updateSlide();
        }, 5000);


        const searchbutton = document.getElementById("searchbutton");
        const destination = document.getElementById("destination");
        const date = document.getElementById("date");
        const duration = document.getElementById("duration");
        const PAX = document.getElementById("PAX");

        searchbutton.addEventListener("click", function() {

            const errors = validateSearchForm({
                destination: destination.value
            });
            if (errors.length > 0) {
                console.group("Form validation errors");
                errors.forEach(err => {
                    console.warn(`${err.field}: ${err.message}`);
                });
                console.groupEnd();
                return;
            }
            const params = new URLSearchParams({
                destination: destination.value.trim(),
                date: date.value,
                duration: duration.value,
                pax: PAX.value,
            });

            // Basic validation
            if (!destination.value) {
                alert("Please enter destination and date.");
                return;
            }

            window.location.href = `/search?${params.toString()}`;
        });

        function validateSearchForm({
            destination,
            date,
            duration,
            pax
        }) {
            const errors = [];

            // Destination
            if (!destination || destination.trim().length < 2) {
                errors.push({
                    field: "destination",
                    message: "Destination is null or too short"
                });
            }




            return errors;
        }
    </script>

    <script>
        const testimonials = [{
                name: "Julian Vane",
                role: "Underwater Photographer",
                comment: "The liveaboard experience was unreal. Waking up directly above world-class dive sites saved so much time and gave us more bottom time every day.",
                image: "https://randomuser.me/api/portraits/men/32.jpg"
            },
            {
                name: "Elena Cross",
                role: "Certified Rescue Diver",
                comment: "Everything was seamless — from dive briefings to meals. The crew knew the sites perfectly and always put safety first.",
                image: "https://randomuser.me/api/portraits/women/44.jpg"
            },
            {
                name: "Marcus Lee",
                role: "Tech Diver",
                comment: "Plenty of space for gear, clean cabins, and smooth sailing between destinations. This is how liveaboard diving should be done.",
                image: "https://randomuser.me/api/portraits/men/75.jpg"
            },
            {
                name: "Sophia Hart",
                role: "Travel Content Creator",
                comment: "I loved being completely offline and focused on diving. Sunrise dives, sunset decks, and incredible routes — pure freedom.",
                image: "https://randomuser.me/api/portraits/women/68.jpg"
            },
            {
                name: "Daniel Frost",
                role: "Advanced Open Water Diver",
                comment: "Best value for serious divers. Multiple dives per day, amazing food, and unforgettable dive sites you can’t reach from shore.",
                image: "https://randomuser.me/api/portraits/men/18.jpg"
            }
        ];

        // Duplicate template per testimonial
        const carousel = document.getElementById("testimonial-carousel");
        const template = carousel.querySelector(".testimonial-slide");
        const starsTemplate = document.getElementById("stars-template").innerHTML;

        testimonials.forEach((t, index) => {
            const slide = index === 0 ? template : template.cloneNode(true);

            slide.querySelector(".avatar").src = t.image;
            slide.querySelector(".comment").textContent = `"${t.comment}"`;
            slide.querySelector(".name").textContent = `${t.name} — ${t.role}`;

            // 5 stars
            const starsContainer = slide.querySelector(".flex.items-center.gap-1");
            starsContainer.innerHTML = starsTemplate.repeat(5);

            slide.classList.remove("hidden");
            carousel.appendChild(slide);
        });

        // Remove original template if duplicated
        template.remove();
    </script>


    <script>
        // Array of liveaboard destinations
        const liveaboardDestinations = [{
                name: "Tubbataha Reefs, Philippines",
                description: "A remote UNESCO World Heritage marine park in the Sulu Sea with dramatic coral walls, abundant sharks, rays, turtles, and huge schools of fish — accessible only by liveaboard during the dive season. :contentReference[oaicite:0]{index=0}",
                image: "https://www.zubludiving.com/images/Philippines/Palawan/Tubbataha/Tubbataha-Reefs-Diving-Philippines-Banner.jpg"
            },
            {
                name: "Raja Ampat, Indonesia",
                description: "Part of the Coral Triangle, Raja Ampat is one of the most biodiverse places on Earth, with vibrant reefs, manta rays, sharks, turtles, and endless photo opportunities — best experienced via liveaboard. :contentReference[oaicite:1]{index=1}",
                image: "https://www.indonesia.travel/contentassets/aad7d1e73a3a408fbbd031f5bf435dc6/discover-raja-ampat-travel-inspiration-to-indonesias-heavenly-eastern-archipelago.jpg"
            },
            {
                name: "Komodo National Park, Indonesia",
                description: "World‑famous liveaboard destination between Flores and Sumbawa where divers encounter whale sharks, manta rays, and dramatic reef scenery during multi‑day sea safaris. :contentReference[oaicite:2]{index=2}",
                image: "https://res.cloudinary.com/zublu/image/fetch/f_webp,w_600,h_360,c_scale,q_50/https://www.zubludiving.com/images/Indonesia/NTT/Komodo-Sangeang/Komodo-Darat-Indonesia-Banner.jpg"
            },
            {
                name: "Similan Islands, Thailand",
                description: "Thai Andaman Sea liveaboard site with clear water, granite islands, Richelieu Rock, manta rays, whale sharks, and rich macro life — perfect for underwater photography. :contentReference[oaicite:3]{index=3}",
                image: "https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0e/c7/ed/7b/photo4jpg.jpg?w=1200&h=-1&s=1"
            },
            {
                name: "Palau, Micronesia",
                description: "Palau’s Blue Corner and German Channel are legendary dive sites, offering sharks, barracudas, giant schools of fish, and easy access for multi‑day liveaboards. :contentReference[oaicite:4]{index=4}",
                image: "https://www.worldtravelguide.net/wp-content/uploads/2017/04/Think-PIoM-Palau-626815916-Norimoto-copy.jpg"
            }
        ];

        // Function to populate the gallery
        function populateGallery() {
            const galleryGrid = document.getElementById("galleryGrid");
            galleryGrid.innerHTML = ""; // Clear any existing content

            liveaboardDestinations.forEach(dest => {
                const card = document.createElement("div");
                card.className = "group relative overflow-hidden rounded-3xl h-80 bg-blue-200 shadow-lg";

                card.innerHTML = `
            <img src="${dest.image}" alt="${dest.name}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
            <div class="absolute inset-0 bg-gradient-to-t from-blue-900 via-transparent to-transparent opacity-0 group-hover:opacity-90 transition-opacity duration-300 flex flex-col justify-end p-6">
                <p class="text-white text-xl font-semibold">${dest.name}</p>
                <p class="text-white text-sm mt-1">${dest.description}</p>
            </div>
        `;
                galleryGrid.appendChild(card);
            });
        }

        // Initialize gallery on page load
        populateGallery();
    </script>
</body>

</html>
