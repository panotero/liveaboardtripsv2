<!DOCTYPE html>
{{-- @dd($getrequest); --}}
<html lang="en">


<x-head>
    Search
</x-head>

<body class="bg-sky-50 text-gray-800">
    <x-navbar />

    <main class="max-w-7xl mx-auto px-4 py-8 pt-28  flex flex-col lg:flex-row gap-8">
        <aside class="w-full lg:w-1/4 space-y-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                <h3 class="font-bold text-slate-800 text-lg mb-4">Refine Voyage</h3>

                <!-- Destination -->
                <div class="mb-5">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                        Destination <p class="pl-2 text-red-600">*</p>
                    </label>
                    <input id="refine_destination" type="text" placeholder="Enter destination"
                        class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Check-in Date -->
                <div class="mb-5">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                        Check-in Date
                    </label>
                    <input id="refine_date" type="date"
                        class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Number of Pax -->
                <div class="mb-5">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                        Number of Pax
                    </label>
                    <input id="refine_pax" type="number" min="1" value="1"
                        class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Nights -->
                <div class="mb-6">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                        Number of Nights Staying
                    </label>
                    <input id="refine_nights" type="number" min="1" value="3"
                        class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <button id="refine_btn"
                        class="w-full py-2 rounded-md text-white font-semibold bg-blue-600 hover:bg-blue-700 transition">
                        Confirm
                    </button>
                </div>
            </div>
        </aside>

        <section class="w-full lg:w-3/4">

            <div id="vessel-list" class="space-y-6 max-h-screen overflow-y-auto w-full">

                <div class="mx-auto w-full rounded-md p-4">
                    <div class="flex animate-pulse space-x-4">
                        <div class="flex-1 space-y-6 py-1">
                            <div class="h-2 rounded bg-gray-200"></div>
                            <div class="space-y-3">
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="col-span-2 h-2 rounded bg-gray-200"></div>
                                    <div class="col-span-1 h-2 rounded bg-gray-200"></div>
                                </div>
                                <div class="h-2 rounded bg-gray-200"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-footer />
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetchschedules();
            async function fetchschedules() {

                const searchQuery = @json($getrequest);
                const data = await fetchWithRetry(`/api/search`, {
                    method: "POST",
                    headers: {
                        Accept: "application/json",
                        "Content-Type": "application/json", // REQUIRED
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                            .content,
                    },
                    body: JSON.stringify(searchQuery),
                });
                console.log(data);
                if (!data.success) {


                    toast.show({
                        title: "No schedules found",
                        description: "Redirecting to home",
                        type: "warning"
                    });
                    // setTimeout(() => {
                    //     window.location.href = "/";
                    // }, 1000);
                }
                renderScheds(data.data);

            }




            function renderScheds(data) {

                const scheds = data;
                // Generate HTML for all schedules
                const schedRow = scheds.map((s, index) => {

                    function toArray(value) {
                        if (Array.isArray(value)) {
                            return value; // already an array
                        }
                        if (typeof value === "string") {
                            try {
                                const parsed = JSON.parse(value);
                                return Array.isArray(parsed) ? parsed : []; // only return array
                            } catch (e) {
                                return []; // invalid JSON, fallback to empty array
                            }
                        }
                        return []; // fallback for null/undefined/other types
                    }
                    let date = @json($getrequest['date'] ?? date('Y-m-d'));
                    // Usage:
                    const images = [
                        ...toArray(s.destination_info.destination_photos),
                        ...toArray(s.vessel_info.vessel_photos)
                    ];

                    // Generate carousel slides
                    const carouselSlides = images.map((img, i) => `
        <div class="${i === 0 ? '' : 'hidden'} duration-700 ease-in-out" data-carousel-item="${i === 0 ? 'active' : ''}">
            <img src="${img}" class="absolute block w-full h-full object-cover" alt="Image ${i + 1}">
        </div>
    `).join('');

                    // Generate schedules inside card
                    const cabinitems = (s.cabins || []).map(cabin => `
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 py-4 items-center hover:bg-slate-50 transition-colors px-2 rounded-lg">
            <div>
                <span class="text-[10px] font-bold text-slate-400 uppercase block mb-1">Cabin Name</span>
                <p class="text-md font-bold text-slate-700">${cabin.details.cabin_name}</p>
            </div>
            <div>
                <span class="text-[10px] font-bold text-slate-400 uppercase block mb-1">Max Guests</span>
                <p class="text-md font-semibold text-slate-600">${cabin.details.guest_capacity || 'N/A'} Guests</p>
            </div>
            <div class="col-span-2 md:col-span-1">
                <span class="text-[10px] font-bold text-slate-400 uppercase block mb-1">Base Price</span>
                <p class="text-md font-semibold text-slate-600 truncate">$${cabin.cabin_price}</p>
            </div>
        </div>
    `).join('');

                    return `
    <div class="bg-white rounded-2xl md:h-[450px] shadow-sm border border-slate-200 overflow-hidden flex flex-col md:flex-row hover:border-blue-300 transition-all">

        <!-- Image Section -->
        <div class="md:w-96 h-64 md:h-auto flex-shrink-0 relative">
            <div id="carousel-${index}" class="relative w-full h-full" data-carousel="slide">
                <div class="relative h-full overflow-hidden">
                    ${carouselSlides}
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
                Most Booked
            </span>
        </div>

        <!-- Content Section -->
        <div class="p-6 flex-1 flex flex-col min-w-0">

            <div class="flex justify-between items-start mb-4 flex-shrink-0">
                <div>
                    <h3 class="text-2xl font-black text-slate-800 uppercase tracking-tight">
                        ${s.destination_info.destination_name}, ${s.destination_info.destination_country}
                    </h3>
                    <p class="text-slate-500 text-sm italic">
                        ${s.destination_info.description || ''}
                    </p>
                </div>

                <div class="text-right">
                    <span class="text-xs font-bold text-slate-400 block uppercase tracking-tighter leading-none">Vessel</span>
                    <span class="text-lg font-bold text-blue-600 leading-none">${s.vessel_info.vessel_name}</span>
                </div>
            </div>

            <!-- Schedule Section -->
            <div class="flex-1 overflow-y-auto schedule-overflow pr-2 mb-4">
                <div class="divide-y divide-slate-100">
                    ${cabinitems}
                </div>
            </div>

            <!-- Price Section -->
            <div class="mt-auto pt-4 border-t border-slate-100 flex justify-between items-center flex-shrink-0">
                <div>
                    <span class="text-xs font-bold text-slate-400 block uppercase">From</span>
                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl font-black text-slate-900">
                            $${s.price || 'N/A'}
                        </span>
                        <span class="text-slate-500 text-xs font-bold">/ person</span>
                    </div>
                </div>

                <button id="book_btn" data-schedule-id = ${s.id} data-date = ${date} class="bg-slate-900 text-white px-8 py-3 rounded-xl font-extrabold hover:bg-blue-600 transition-all shadow-md active:scale-95">
                    Select Cabin
                </button>
            </div>

        </div>
    </div>
    `;
                }).join("\n");
                // console.log(schedRow);
                const container = document.getElementById('vessel-list');
                container.innerHTML = schedRow;

                if (typeof initCarousels === 'function') {
                    initCarousels();
                }
                const bookbtn = document.querySelectorAll("#book_btn");

                bookbtn.forEach(function(btn) {
                    btn.addEventListener("click", function() {
                        console.log(this.dataset.destinationId);
                        window.location.href = "info?destinationId=dataset.destinationId&date="
                    });
                });
            }


            document.getElementById("refine_btn").addEventListener("click", function() {
                console.log("clicked");
            });

        });
    </script>

</body>

</html>
