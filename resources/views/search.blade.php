<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AquaVenture | Liveaboard Search</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Custom scrollbar for the schedule list */
        .schedule-overflow::-webkit-scrollbar {
            width: 5px;
        }

        .schedule-overflow::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        .schedule-overflow::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-slate-50 font-sans">



    <nav class="bg-slate-900 text-white shadow-lg p-4 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold tracking-tight flex items-center">
                <i class="fa-solid fa-anchor mr-2 text-blue-400"></i>AquaVenture
            </h1>
            <div class="hidden md:flex space-x-6 text-slate-300 font-medium text-sm">
                <a href="#" class="hover:text-white transition">Destinations</a>
                <a href="#" class="hover:text-white transition">Vessels</a>
                <a href="#" class="hover:text-white transition">Expeditions</a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 py-8 flex flex-col lg:flex-row gap-8">

        <aside class="w-full lg:w-1/4 space-y-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                <h3 class="font-bold text-slate-800 text-lg mb-4">Refine Voyage</h3>

                <div class="mb-6">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Vessel
                        Type</label>
                    <div class="space-y-2">
                        <label class="flex items-center text-slate-600"><input type="checkbox"
                                class="rounded text-blue-600 mr-3"> Luxury Yacht</label>
                        <label class="flex items-center text-slate-600"><input type="checkbox"
                                class="rounded text-blue-600 mr-3"> Expedition Catamaran</label>
                        <label class="flex items-center text-slate-600"><input type="checkbox"
                                class="rounded text-blue-600 mr-3"> Traditional Phinisi</label>
                    </div>
                </div>

                <div class="mb-6">
                    <label
                        class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Activities</label>
                    <div class="space-y-2">
                        <label class="flex items-center text-slate-600"><input type="checkbox" checked
                                class="rounded text-blue-600 mr-3"> Scuba Diving</label>
                        <label class="flex items-center text-slate-600"><input type="checkbox" checked
                                class="rounded text-blue-600 mr-3"> Snorkeling</label>
                        <label class="flex items-center text-slate-600"><input type="checkbox"
                                class="rounded text-blue-600 mr-3"> Free Diving</label>
                    </div>
                </div>
            </div>
        </aside>

        <section class="w-full lg:w-3/4">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-slate-800">Expeditions in El Nido</h2>
                <p class="text-slate-500">Discover hidden lagoons and crystal clear waters in Palawan, Philippines.</p>
            </div>

            <div id="vessel-list" class="space-y-6"></div>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script>
        const expeditions = [{
                id: "exp1",
                destination: "El Nido, Philippines",
                description: "Beautiful beaches and lagoons in Palawan.",
                vessel: "Ocean Explorer",
                cabins: 5,
                maxGuests: 20,
                schedule: {
                    0: {
                        dateStart: "Jan 11, 2026",
                        dateEnd: "Jan 15, 2026",
                        itinerary: "Island hopping, snorkeling"
                    },
                    1: {
                        dateStart: "Jan 20, 2026",
                        dateEnd: "Jan 25, 2026",
                        itinerary: "Hidden Beach BBQ"
                    }
                },
                price: 1250,
                images: [
                    "https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=800&q=80",
                    "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80"
                ],
                badge: "Top Rated"
            },
            {
                id: "exp2",
                destination: "Coron & Linapacan",
                description: "Shipwrecks and the clearest waters in the world.",
                vessel: "Azure Winds",
                cabins: 8,
                maxGuests: 16,
                schedule: {
                    0: {
                        dateStart: "Feb 02, 2026",
                        dateEnd: "Feb 08, 2026",
                        itinerary: "Wreck diving, hidden beach BBQ"
                    },
                    1: {
                        dateStart: "Feb 15, 2026",
                        dateEnd: "Feb 21, 2026",
                        itinerary: "Deep sea exploration"
                    },
                    2: {
                        dateStart: "Mar 01, 2026",
                        dateEnd: "Mar 07, 2026",
                        itinerary: "Culion historical tour"
                    },
                    3: {
                        dateStart: "Mar 15, 2026",
                        dateEnd: "Mar 21, 2026",
                        itinerary: "Barracuda Lake diving"
                    }
                },
                price: 1890,
                images: [
                    "https://images.unsplash.com/photo-1505144808419-1957a94ca61e?auto=format&fit=crop&w=800&q=80",
                    "https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?auto=format&fit=crop&w=800&q=80",
                    "https://images.unsplash.com/photo-1439066615861-d1af74d74000?auto=format&fit=crop&w=800&q=80"
                ],
                badge: "Best for Diving"
            }
        ];

        function renderExpeditions() {
            const container = document.getElementById('vessel-list');
            container.innerHTML = expeditions.map(exp => `
                <div class="bg-white rounded-2xl md:h-[450px] shadow-sm border border-slate-200 overflow-hidden flex flex-col md:flex-row hover:border-blue-300 transition-all">

                    <div class="md:w-96 h-64 md:h-auto flex-shrink-0 relative">
                        <div id="carousel-${exp.id}" class="relative w-full h-full" data-carousel="slide">
                            <div class="relative h-full overflow-hidden">
                                ${exp.images.map((img, index) => `
                                                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                                                    <img src="${img}" class="absolute block w-full h-full object-cover" alt="Vessel Image ${index + 1}">
                                                                </div>
                                                            `).join('')}
                            </div>
                            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/30 group-hover:bg-white/50 ring-1 ring-white/50">
                                    <i class="fa-solid fa-chevron-left text-white text-xs"></i>
                                </span>
                            </button>
                            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/30 group-hover:bg-white/50 ring-1 ring-white/50">
                                    <i class="fa-solid fa-chevron-right text-white text-xs"></i>
                                </span>
                            </button>
                        </div>
                        <span class="absolute top-3 left-3 z-40 bg-blue-600 text-white text-[10px] font-bold uppercase tracking-widest px-2 py-1 rounded shadow-lg">
                            ${exp.badge}
                        </span>
                    </div>

                    <div class="p-6 flex-1 flex flex-col min-w-0">
                        <div class="flex justify-between items-start mb-4 flex-shrink-0">
                            <div>
                                <h3 class="text-2xl font-black text-slate-800 uppercase tracking-tight">${exp.destination}</h3>
                                <p class="text-slate-500 text-sm italic">${exp.description}</p>
                            </div>
                            <div class="text-right">
                                <span class="text-xs font-bold text-slate-400 block uppercase tracking-tighter leading-none">Vessel</span>
                                <span class="text-lg font-bold text-blue-600 leading-none">${exp.vessel}</span>
                            </div>
                        </div>

                        <div class="flex-1 overflow-y-auto schedule-overflow pr-2 mb-4">
                            <div class="divide-y divide-slate-100">
                                ${Object.values(exp.schedule).map(sched => `
                                                                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 py-4 items-center hover:bg-slate-50 transition-colors px-2 rounded-lg">
                                                                    <div>
                                                                        <span class="text-[10px] font-bold text-slate-400 uppercase block mb-1">Dates</span>
                                                                        <p class="text-xs font-bold text-slate-700">${sched.dateStart} - ${sched.dateEnd}</p>
                                                                    </div>
                                                                    <div>
                                                                        <span class="text-[10px] font-bold text-slate-400 uppercase block mb-1">Guests</span>
                                                                        <p class="text-xs font-semibold text-slate-600">${exp.cabins} Cabins / Max ${exp.maxGuests}</p>
                                                                    </div>
                                                                    <div class="col-span-2 md:col-span-1">
                                                                        <span class="text-[10px] font-bold text-slate-400 uppercase block mb-1">Route Highlights</span>
                                                                        <p class="text-xs font-semibold text-slate-600 truncate">${sched.itinerary}</p>
                                                                    </div>
                                                                </div>
                                                            `).join('')}
                            </div>
                        </div>

                        <div class="mt-auto pt-4 border-t border-slate-100 flex justify-between items-center flex-shrink-0">
                            <div>
                                <span class="text-xs font-bold text-slate-400 block uppercase">From</span>
                                <div class="flex items-baseline gap-1">
                                    <span class="text-3xl font-black text-slate-900">$${exp.price}</span>
                                    <span class="text-slate-500 text-xs font-bold">/ person</span>
                                </div>
                            </div>
                            <button class="bg-slate-900 text-white px-8 py-3 rounded-xl font-extrabold hover:bg-blue-600 transition-all shadow-md active:scale-95">
                                Select Cabin
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');

            // Re-initialize Flowbite carousels after adding to DOM
            if (typeof initCarousels === 'function') {
                initCarousels();
            }
        }

        renderExpeditions();
    </script>
</body>

</html>
