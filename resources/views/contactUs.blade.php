<!DOCTYPE html>
<html lang="en">

<head>

    <x-icon />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LiveAboardTrips - Contact Us</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dive Paradise - Liveaboard Adventures</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-in {
            animation: slideIn 0.8s ease-out forwards;
        }

        .slideshow-item {
            transition: opacity 1s ease-in-out;
        }
    </style>
</head>

<body class="bg-sky-50 text-gray-800">
    <x-navbar />

    <main class="max-w-7xl mx-auto px-4 py-8 pt-28">
        <div class="text-center mb-16">
            <h1
                class="text-5xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-blue-600 to-teal-500 bg-clip-text text-transparent">
                Let's Dive In
            </h1>
            <p class="text-gray-600 text-xl max-w-2xl mx-auto">
                Whether you're looking for your first open-water course or a luxury liveaboard expedition, our crew is
                ready to guide you.
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8 mb-20">
            <div
                class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-3xl p-8 border border-blue-100 shadow-sm hover:shadow-xl transition-all duration-300">
                <div
                    class="bg-gradient-to-br from-blue-500 to-blue-600 w-12 h-12 rounded-xl flex items-center justify-center mb-6 shadow-lg shadow-blue-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-blue-700 mb-2">Email Us</h3>
                <p class="text-gray-600 mb-4">Drop us a line anytime.</p>
                <a href="mailto:hello@bluehorizon.com"
                    class="text-blue-600 font-bold hover:underline">hello@bluehorizon.com</a>
            </div>

            <div
                class="bg-gradient-to-br from-teal-50 to-cyan-50 rounded-3xl p-8 border border-teal-100 shadow-sm hover:shadow-xl transition-all duration-300">
                <div
                    class="bg-gradient-to-br from-teal-500 to-teal-600 w-12 h-12 rounded-xl flex items-center justify-center mb-6 shadow-lg shadow-teal-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-teal-700 mb-2">Dive Base</h3>
                <p class="text-gray-600 mb-4">Visit our HQ in paradise.</p>
                <p class="text-teal-700 font-bold">122 Azure Way, San Francisco</p>
            </div>

            <div
                class="bg-gradient-to-br from-cyan-50 to-blue-50 rounded-3xl p-8 border border-cyan-100 shadow-sm hover:shadow-xl transition-all duration-300">
                <div
                    class="bg-gradient-to-br from-cyan-500 to-blue-500 w-12 h-12 rounded-xl flex items-center justify-center mb-6 shadow-lg shadow-cyan-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-cyan-700 mb-2">Crew Hours</h3>
                <p class="text-gray-600 mb-2">Mon - Fri: 9am - 6pm</p>
                <p class="text-gray-600 font-medium italic text-sm">Response time: Within 24 hours</p>
            </div>
        </div>

        <section class="max-w-4xl mx-auto mb-20">
            <div class="bg-white rounded-[3rem] p-10 border border-blue-100 shadow-2xl relative overflow-hidden">
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-blue-100/50 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-teal-100/50 rounded-full blur-3xl"></div>

                <div class="relative z-10">
                    <h2 class="text-3xl font-bold text-blue-800 mb-8">Send a Dispatch</h2>

                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-blue-700 ml-1">Full Name</label>
                            <input type="text" placeholder="John Doe"
                                class="w-full px-6 py-4 rounded-2xl bg-sky-50/50 border border-blue-100 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-50 transition-all">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-blue-700 ml-1">Email Address</label>
                            <input type="email" placeholder="john@example.com"
                                class="w-full px-6 py-4 rounded-2xl bg-sky-50/50 border border-blue-100 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-50 transition-all">
                        </div>
                    </div>

                    <div class="space-y-2 mb-6">
                        <label class="text-sm font-bold text-blue-700 ml-1">Inquiry Type</label>
                        <select
                            class="w-full px-6 py-4 rounded-2xl bg-sky-50/50 border border-blue-100 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-50 transition-all appearance-none cursor-pointer">
                            <option>Booking a Trip</option>
                            <option>Diving Certification</option>
                            <option>Partnership</option>
                            <option>Other</option>
                        </select>
                    </div>

                    <div class="space-y-2 mb-8">
                        <label class="text-sm font-bold text-blue-700 ml-1">Your Message</label>
                        <textarea rows="5" placeholder="Tell us about your next adventure..."
                            class="w-full px-6 py-4 rounded-2xl bg-sky-50/50 border border-blue-100 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-50 transition-all resize-none"></textarea>
                    </div>

                    <button
                        class="w-full bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-700 hover:to-teal-600 py-5 rounded-2xl text-white font-black uppercase tracking-widest shadow-xl shadow-blue-200 hover:scale-[1.02] active:scale-95 transition-all">
                        Confirm Transmission
                    </button>
                </div>
            </div>
        </section>
    </main>

    <x-footer />
</body>

</html>
