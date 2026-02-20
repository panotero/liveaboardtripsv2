<!DOCTYPE html>
<html lang="en">

<head>

    <x-icon />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LiveAboardTrips - Destinations</title>
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

<body class="bg-sky-50 text-slate-900 antialiased">
    <x-navbar />

    <main class="max-w-7xl mx-auto px-6 pt-32 pb-20">
        <header class="mb-24 border-b border-slate-100 pb-12 relative font-sans">
            <div class="flex flex-col md:flex-row justify-between items-end gap-8">
                <div class="max-w-3xl">

                    <h1 class="text-6xl md:text-8xl font-black uppercase tracking-tighter leading-[0.9] text-slate-900">
                        The <span
                            class="bg-gradient-to-r from-blue-600 to-teal-500 bg-clip-text text-transparent">Azure</span>
                        Index
                    </h1>
                </div>

                <div
                    class="md:text-right max-w-xs border-t md:border-t-0 md:border-l border-slate-100 pt-6 md:pt-0 md:pl-8">
                    <p class="text-slate-400 font-light text-sm uppercase tracking-widest leading-relaxed">
                        Our definitive guide to the world's most breathtaking blue spaces.
                    </p>
                </div>
            </div>
        </header>

        <section class="grid grid-cols-1 md:grid-cols-12 gap-y-24 md:gap-x-12 mb-32">

            <div class="md:col-span-12 group">
                <div class="relative overflow-hidden rounded-[3rem] shadow-2xl shadow-blue-200/50 h-[500px]">
                    <img src="https://images.unsplash.com/photo-1506929113670-b42d0763870d?auto=format&fit=crop&w=1400"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000"
                        alt="Santorini">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-blue-900/80 via-transparent to-transparent flex items-end p-12">
                        <div>
                            <span class="text-7xl font-serif italic text-white/30 font-black">01</span>
                            <h2 class="text-4xl md:text-6xl font-bold text-white uppercase tracking-tighter">Santorini,
                                Greece</h2>
                        </div>
                    </div>
                </div>
                <div class="mt-8 grid md:grid-cols-3 gap-8 items-start">
                    <div class="md:col-span-2">
                        <p class="text-xl leading-relaxed text-slate-700">
                            The crown jewel of the Cyclades, where every street corner offers a masterclass in the color
                            blue. From the deep navy of the Aegean to the pale cerulean of the church domes, it is a
                            living painting.
                        </p>
                    </div>
                    <div class="bg-white p-6 rounded-3xl border border-blue-100 shadow-sm">
                        <h4 class="font-black uppercase text-xs text-sky-500 tracking-widest mb-2">Editor's Note</h4>
                        <p class="text-sm italic text-slate-500">"Skip the crowds in Oia; head to Pyrgos for the same
                            sunset but twice the soul."</p>
                    </div>
                </div>
            </div>

            <div class="md:col-span-5 space-y-6 group">
                <div class="aspect-[4/5] rounded-[2.5rem] overflow-hidden shadow-xl">
                    <img src="https://images.unsplash.com/photo-1544550581-5f7ceaf7f992?auto=format&fit=crop&w=800"
                        class="w-full h-full object-cover" alt="Iceland">
                </div>
                <div class="px-4">
                    <h3 class="text-3xl font-bold text-slate-900 uppercase">Grindavík, Iceland</h3>
                    <p class="text-slate-500 mt-2 font-medium">Geothermal silica meets the midnight sun.</p>
                </div>
            </div>

            <div class="md:col-span-7 pt-20 group">
                <div class="aspect-video rounded-[2.5rem] overflow-hidden shadow-xl relative">
                    <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1000"
                        class="w-full h-full object-cover" alt="Bali">
                    <div
                        class="absolute top-6 right-6 bg-white/90 backdrop-blur px-4 py-2 rounded-full font-black text-xs uppercase tracking-widest text-blue-600">
                        Top Rated
                    </div>
                </div>
                <div class="mt-8">
                    <h3 class="text-3xl font-bold text-slate-900 uppercase leading-none">Ubud, Bali</h3>
                    <p class="text-slate-700 mt-4 leading-relaxed max-w-lg">
                        The blue here isn't in the ocean—it's in the sky reflected in the terraced rice paddies at dawn.
                    </p>
                    <button
                        class="mt-6 px-8 py-3 bg-gradient-to-r from-blue-600 to-teal-500 text-white font-bold rounded-xl shadow-lg shadow-blue-200 hover:scale-105 transition-transform">Explore
                        Full Gallery</button>
                </div>
            </div>
        </section>
        <section class="py-24 px-6 bg-white">
            <div class="max-w-7xl mx-auto">

                <div class="mb-16 flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div>
                        <h2 class="text-4xl font-black uppercase tracking-tighter text-slate-900 leading-none">
                            Diver <span
                                class="bg-gradient-to-r from-blue-600 to-teal-500 bg-clip-text text-transparent">Perspectives</span>
                        </h2>
                        <div class="h-1 w-20 bg-sky-400 mt-4"></div>
                    </div>
                </div>

                <div class="space-y-6">

                    <div
                        class="group flex flex-col md:flex-row items-stretch bg-slate-50 rounded-[2.5rem] overflow-hidden border border-slate-100 hover:border-blue-200 transition-all duration-500">
                        <div class="md:w-1/3 h-48 md:h-auto relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800"
                                class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700"
                                alt="Diver">
                        </div>
                        <div class="md:w-2/3 p-8 md:p-12 flex flex-col justify-center">
                            <div class="flex gap-1 mb-4">
                                <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                                <span class="w-2 h-2 rounded-full bg-blue-400"></span>
                                <span class="w-2 h-2 rounded-full bg-blue-200"></span>
                            </div>
                            <blockquote class="text-xl md:text-2xl font-medium text-slate-800 leading-tight mb-6">
                                "The crystal clear visibility in Raja Ampat was unlike anything I've seen. The crew's
                                technical knowledge made me feel safe every second."
                            </blockquote>
                            <div class="flex items-center gap-4">
                                <span class="h-[1px] w-8 bg-sky-400"></span>
                                <p class="uppercase text-[10px] font-black tracking-widest text-slate-900">Marcus Rivera
                                    — PADI Master</p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="group flex flex-col md:flex-row-reverse items-stretch bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 shadow-xl shadow-blue-50 transition-all duration-500">
                        <div class="md:w-1/3 h-48 md:h-auto relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 to-teal-500/20 z-10"></div>
                            <img src="https://images.unsplash.com/photo-1583212292454-1fe6229603b7?w=800"
                                class="w-full h-full object-cover" alt="Marine Life">
                        </div>
                        <div
                            class="md:w-2/3 p-8 md:p-12 flex flex-col justify-center bg-gradient-to-r from-white to-sky-50/30">
                            <p class="text-xs font-black uppercase tracking-[0.3em] text-teal-600 mb-4">Top Rated
                                Expedition</p>
                            <blockquote class="text-xl md:text-2xl font-bold text-slate-900 leading-tight mb-6">
                                "Luxury cabins and gourmet dining between dives? This is the only way to experience the
                                Great Barrier Reef."
                            </blockquote>
                            <div class="flex items-center gap-4">
                                <span class="h-[1px] w-8 bg-teal-400"></span>
                                <p class="uppercase text-[10px] font-black tracking-widest text-slate-900">Lisa Kim —
                                    Advanced Open Water</p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="group flex flex-col md:flex-row items-stretch bg-slate-900 rounded-[2.5rem] overflow-hidden transition-all duration-500">
                        <div class="md:w-1/3 h-48 md:h-auto opacity-60 group-hover:opacity-100 transition-opacity">
                            <img src="https://images.unsplash.com/photo-1682687220742-aba13b6e50ba?w=800"
                                class="w-full h-full object-cover" alt="Wreck Dive">
                        </div>
                        <div class="md:w-2/3 p-8 md:p-12 flex flex-col justify-center text-white">
                            <div class="mb-6 flex text-sky-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                            <blockquote class="text-xl md:text-2xl font-light italic leading-relaxed mb-8">
                                "The itinerary was a perfect balance. One moment you're exploring a WWII wreck, the next
                                you're floating in a calm lagoon. Professionalism at its finest."
                            </blockquote>
                            <p class="uppercase text-[10px] font-black tracking-[0.4em] text-sky-400">Tom Bradley —
                                Rescue Diver</p>
                        </div>
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
                    <div class="relative h-[500px] overflow-hidden rounded-[3rem] md:h-[350px]">

                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <div
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 bg-slate-50 border border-slate-100 p-8 md:p-12 flex flex-col md:flex-row items-center gap-10 shadow-sm">
                                <div
                                    class="w-32 h-32 md:w-44 md:h-44 rounded-full overflow-hidden flex-shrink-0 border-4 border-white shadow-lg">
                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?fit=crop&w=400&h=400"
                                        class="w-full h-full object-cover grayscale" alt="User">
                                </div>
                                <div class="flex-grow">
                                    <div class="flex items-center gap-1 mb-4 text-amber-400">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>
                                    <p class="text-xl md:text-2xl font-light text-slate-700 leading-snug mb-6 italic">
                                        "A visual masterpiece. The minimalist aesthetic perfectly captures the serenity
                                        of the locations."</p>
                                    <div class="flex items-center gap-4">
                                        <span class="h-[1px] w-8 bg-blue-600"></span>
                                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-900">
                                            Julian Vane — Photographer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <div
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 bg-slate-50 border border-slate-100 p-8 md:p-12 flex flex-col md:flex-row items-center gap-10 shadow-sm">
                                <div
                                    class="w-32 h-32 md:w-44 md:h-44 rounded-full overflow-hidden flex-shrink-0 border-4 border-white shadow-lg">
                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?fit=crop&w=400&h=400"
                                        class="w-full h-full object-cover grayscale" alt="User">
                                </div>
                                <div class="flex-grow">
                                    <div class="flex items-center gap-1 mb-4 text-amber-400">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>
                                    <p class="text-xl md:text-2xl font-light text-slate-700 leading-snug mb-6 italic">
                                        "A visual masterpiece. The minimalist aesthetic perfectly captures the serenity
                                        of the locations."</p>
                                    <div class="flex items-center gap-4">
                                        <span class="h-[1px] w-8 bg-blue-600"></span>
                                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-900">
                                            Julian Vane — Photographer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <div
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 bg-slate-50 border border-slate-100 p-8 md:p-12 flex flex-col md:flex-row items-center gap-10 shadow-sm">
                                <div
                                    class="w-32 h-32 md:w-44 md:h-44 rounded-full overflow-hidden flex-shrink-0 border-4 border-white shadow-lg">
                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?fit=crop&w=400&h=400"
                                        class="w-full h-full object-cover grayscale" alt="User">
                                </div>
                                <div class="flex-grow">
                                    <div class="flex items-center gap-1 mb-4 text-amber-400">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>
                                    <p class="text-xl md:text-2xl font-light text-slate-700 leading-snug mb-6 italic">
                                        "A visual masterpiece. The minimalist aesthetic perfectly captures the serenity
                                        of the locations."</p>
                                    <div class="flex items-center gap-4">
                                        <span class="h-[1px] w-8 bg-blue-600"></span>
                                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-900">
                                            Julian Vane — Photographer</p>
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

    </main>
    <x-footer />
    <script>
        (function() {
            const carousel = document.getElementById('reviews-carousel');
            const indicatorContainer = document.getElementById('carousel-indicators');
            const items = carousel.querySelectorAll('[data-carousel-item]');

            // 1. Clear any hardcoded buttons
            indicatorContainer.innerHTML = '';

            // 2. Loop through items and create a button for each
            items.forEach((_, index) => {
                const button = document.createElement('button');
                button.type = 'button';
                button.className = 'w-2 h-2 rounded-full transition-all duration-300';

                // Set accessibility and Flowbite attributes
                button.setAttribute('aria-label', `Slide ${index + 1}`);
                button.setAttribute('data-carousel-slide-to', index);

                // Set initial state for the first button
                if (index === 0) {
                    button.classList.add('bg-blue-600');
                    button.setAttribute('aria-current', 'true');
                } else {
                    button.classList.add('bg-slate-300');
                    button.setAttribute('aria-current', 'false');
                }

                indicatorContainer.appendChild(button);
            });

            /**
             * OPTIONAL: Re-initialize Flowbite
             * If the dots don't click immediately, Flowbite needs to "see" them.
             * This line tells Flowbite to look at the DOM again.
             */
            if (typeof Flowbite !== 'undefined') {
                const instance = new Carousel(carousel);
            }
        })();
    </script>
</body>

</html>
