<!DOCTYPE html>
<html lang="en">


<x-head>
    Info
</x-head>

<body class="bg-sky-50 text-gray-800">

    <x-navbar />
    <main class="max-w-7xl mx-auto px-4 py-8 pt-28 flex flex-col lg:flex-row gap-8">


        <!-- Main Section -->
        <section class="w-full space-y-8">

            <!-- Destination & Vessel Info Card -->
            <div
                class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden flex flex-col md:flex-row hover:border-blue-300 transition-all">
                <div class="md:w-96 h-64 md:h-auto flex-shrink-0 relative">
                    <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5"
                        class="absolute block w-full h-full object-cover" alt="Destination Image">
                    <span
                        class="absolute top-3 left-3 z-40 bg-blue-600 text-white text-[10px] font-bold uppercase tracking-widest px-2 py-1 rounded shadow-lg">Most
                        Booked</span>
                </div>
                <div class="p-6 flex-1 flex flex-col min-w-0">
                    <h3 class="text-2xl font-black text-slate-800 uppercase tracking-tight" id="destination-name"></h3>
                    <p class="text-slate-500 text-sm italic mb-4" id="destination-description"></p>
                    <div>
                        <span class="text-xs font-bold text-slate-400 uppercase block mb-1">Vessel</span>
                        <span class="text-lg font-bold text-blue-600" id="vessel-name"></span>
                    </div>
                </div>
            </div>

            <!-- Schedules Card -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                <h3 class="font-bold text-slate-800 text-lg mb-4">Available Schedules</h3>
                <div class="space-y-4" id="schedule-list">

                    {{-- put each schedule based on search to this --}}
                    <div
                        class="grid grid-cols-2 md:grid-cols-5 gap-4 py-4 items-center hover:bg-slate-50 transition-colors px-2 rounded-lg border-b border-slate-100">

                        <div>
                            <span class="text-[10px] font-bold text-slate-400 uppercase block mb-1">Dates</span>
                            <p class="text-xs font-bold text-slate-700">${s.dates}</p>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold text-slate-400 uppercase block mb-1">Guests</span>
                            <p class="text-xs font-semibold text-slate-600">${s.guests}</p>
                        </div>
                        <div class="col-span-1 md:col-span-1">
                            <span class="text-[10px] font-bold text-slate-400 uppercase block mb-1">Route
                                Highlights</span>
                            <p class="text-xs font-semibold text-slate-600 truncate">${s.route}</p>
                        </div>
                        <div class="col-span-1 md:col-span-1">
                            <span class="text-[10px] font-bold text-slate-400 uppercase block mb-1">Available
                                Slots</span>
                            <p class="text-xs font-semibold text-slate-600 truncate">${s.slots}</p>
                        </div>
                        <div class="col-span-1 md:col-span-1 flex justify-end">
                            <button class="py-5 px-6 text-white bg-blue-600 rounded-md font-semibold"> Book Now</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Cabin Prices Card -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                <h3 class="font-bold text-slate-800 text-lg mb-4">Cabin Prices</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4" id="cabin-prices">
                    <div class="bg-slate-100 p-4 rounded-lg flex flex-col items-start">
                        <span class="font-bold text-slate-800">${c.name}</span><span
                            class="text-sm text-slate-600">${c.price}</span>
                    </div>
                    <div class="bg-slate-100 p-4 rounded-lg flex flex-col items-start">
                        <span class="font-bold text-slate-800">${c.name}</span><span
                            class="text-sm text-slate-600">${c.price}</span>
                    </div>
                    <div class="bg-slate-100 p-4 rounded-lg flex flex-col items-start">
                        <span class="font-bold text-slate-800">${c.name}</span><span
                            class="text-sm text-slate-600">${c.price}</span>
                    </div>
                </div>
            </div>

            <!-- Vessel Specifications Card -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                <h3 class="font-bold text-slate-800 text-lg mb-4">Vessel Specifications</h3>
                <ul class="list-disc pl-5 space-y-2" id="vessel-specs"></ul>
            </div>

            <!-- Features Card -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                <h3 class="font-bold text-slate-800 text-lg mb-4">Features</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4" id="features-list"></div>
            </div>

            <!-- Reviews Card -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                <h3 class="font-bold text-slate-800 text-lg mb-4">Reviews</h3>
                <div class="space-y-4" id="reviews-list"></div>
            </div>

        </section>

    </main>
    <x-footer />

    <script>
        // Sample Data Arrays
        const destination = {
            name: "Tubbataha Reef, Philippines",
            description: "UNESCO World Heritage marine sanctuary known for pristine reefs and large pelagic sightings."
        };

        const vessel = {
            name: "M/Y Ocean Explorer"
        };

        const schedules = [{
                dates: "Mar 03 - Mar 10, 2026",
                guests: "10 Cabins / Max 20 Guests",
                route: "Shark Airport, Washing Machine, Amos Rock"
            },
            {
                dates: "Apr 05 - Apr 12, 2026",
                guests: "8 Cabins / Max 16 Guests",
                route: "South Atoll, North Atoll"
            }
        ];

        const cabinPrices = [{
                name: "Deluxe Cabin",
                price: "$2,450 / person"
            },
            {
                name: "Premium Cabin",
                price: "$3,100 / person"
            },
            {
                name: "Suite Cabin",
                price: "$4,200 / person"
            }
        ];

        const vesselSpecs = ["Length: 40m", "Beam: 10m", "Draft: 3m", "Max Speed: 15 knots", "Engine: Twin Diesel"];

        const features = ["Boat Features", "Foods", "Network", "Entertainment", "Spa", "Gym", "Diving Equipment",
            "Photography Gear"
        ];

        const reviews = [{
                user: "John Doe",
                comment: "Amazing experience, highly recommend!"
            },
            {
                user: "Jane Smith",
                comment: "Crew was friendly and the reef was beautiful."
            },
            {
                user: "Alex Brown",
                comment: "A trip of a lifetime!"
            }
        ];

        // Populate Destination & Vessel Info
        document.getElementById("destination-name").textContent = destination.name;
        document.getElementById("destination-description").textContent = destination.description;
        document.getElementById("vessel-name").textContent = vessel.name;

        // Populate Schedules
        const scheduleList = document.getElementById("schedule-list");
        schedules.forEach(s => {
            const div = document.createElement("div");
            div.className =
                "grid grid-cols-2 md:grid-cols-3 gap-4 py-4 items-center hover:bg-slate-50 transition-colors px-2 rounded-lg border-b border-slate-100";
            div.innerHTML = `
            <div>
                <span class="text-[10px] font-bold text-slate-400 uppercase block mb-1">Dates</span>
                <p class="text-xs font-bold text-slate-700">${s.dates}</p>
            </div>
            <div>
                <span class="text-[10px] font-bold text-slate-400 uppercase block mb-1">Guests</span>
                <p class="text-xs font-semibold text-slate-600">${s.guests}</p>
            </div>
            <div class="col-span-2 md:col-span-1">
                <span class="text-[10px] font-bold text-slate-400 uppercase block mb-1">Route Highlights</span>
                <p class="text-xs font-semibold text-slate-600 truncate">${s.route}</p>
            </div>
        `;
            // scheduleList.appendChild(div);
        });

        // Populate Cabin Prices
        const cabinContainer = document.getElementById("cabin-prices");
        cabinPrices.forEach(c => {
            const div = document.createElement("div");
            div.className = "bg-slate-100 p-4 rounded-lg flex flex-col items-start";
            div.innerHTML =
                `<span class="font-bold text-slate-800">${c.name}</span><span class="text-sm text-slate-600">${c.price}</span>`;
            cabinContainer.appendChild(div);
        });

        // Populate Vessel Specs
        const specsList = document.getElementById("vessel-specs");
        vesselSpecs.forEach(spec => {
            const li = document.createElement("li");
            li.textContent = spec;
            specsList.appendChild(li);
        });

        // Populate Features
        const featuresContainer = document.getElementById("features-list");
        features.forEach(f => {
            const div = document.createElement("div");
            div.className = "bg-blue-50 text-blue-700 px-3 py-2 rounded-lg text-center font-semibold text-sm";
            div.textContent = f;
            featuresContainer.appendChild(div);
        });

        // Populate Reviews
        const reviewsContainer = document.getElementById("reviews-list");
        reviews.forEach(r => {
            const div = document.createElement("div");
            div.className = "border-b border-slate-100 pb-2";
            div.innerHTML =
                `<span class="font-bold text-slate-800">${r.user}</span><p class="text-slate-600 text-sm">${r.comment}</p>`;
            reviewsContainer.appendChild(div);
        });
    </script>

</body>

</html>
