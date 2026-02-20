<!-- Navigation -->
<header id="navbar"
    class="fixed top-0 left-0 w-full z-50 backdrop-blur-lg bg-slate-900 border-b border-white/20 shadow-sm transition-all duration-300">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="/" class="text-white text-2xl font-bold tracking-wide">

                <h3 class="text-white text-2xl tracking-tighter m-auto">
                    <span class="font-black uppercase">LiveAboard</span><span class="font-light text-sky-400">Trips</span>
                </h3>
            </a>

            <!-- Desktop Menu -->
            <nav class="hidden md:flex items-center space-x-8 text-white font-medium">
                <a href="/" class="hover:text-cyan-200 transition">Home</a>
                <a href="destinations" class="hover:text-cyan-200 transition">Destinations</a>
                <a href="trips" class="hover:text-cyan-200 transition hidden">Trips</a>
                <a href="contactUs" class="hover:text-cyan-200 transition">Contact Us</a>

                <a href="#"
                    class="bg-white text-blue-600 px-5 py-2 rounded-full font-semibold hover:bg-blue-50 transition shadow-lg">
                    Book Now
                </a>

                <a href="login" class="border border-white/70 px-4 py-2 rounded-full hover:bg-white/10 transition">
                    Partner Login
                </a>
            </nav>

            <!-- Mobile Toggle Button -->
            <button id="menuBtn" class="md:hidden text-white focus:outline-none">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu"
        class="md:hidden overflow-hidden max-h-0 opacity-0 transition-all duration-500 ease-in-out px-6 bg-white/10 backdrop-blur-xl border-t border-white/20">
        <div class="flex flex-col space-y-4 text-white font-medium py-6">
            <a href="/" class="hover:text-cyan-200 transition">Home</a>
            <a href="destinations" class="hover:text-cyan-200 transition">Destinations</a>
            <a href="trips" class="hover:text-cyan-200 transition  hidden">Trips</a>
            <a href="contactUs" class="hover:text-cyan-200 transition">Contact Us</a>

            <a href="#" class="bg-white text-blue-600 px-5 py-3 rounded-full font-semibold text-center shadow-lg">
                Book Now
            </a>

            <a href="login"
                class="border border-white/70 px-4 py-3 rounded-full text-center hover:bg-white/10 transition">
                Partner Login
            </a>
        </div>
    </div>
</header>
