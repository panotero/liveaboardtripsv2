<x-head>
    Booking
</x-head>

<body class="bg-sky-50 text-gray-800">

    <x-navbar />

    <main class="max-w-7xl mx-auto px-4 py-8 pt-28 space-y-8">
        <!-- Cabin Selection -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
            <h3 class="font-bold text-slate-800 text-lg mb-6">Select Cabins</h3>

            <div id="cabin-list" class="space-y-6">

                <!-- Cabin Card -->
                <div class="grid md:grid-cols-3 gap-6 items-center border-b pb-6">

                    <!-- Cabin Carousel -->
                    <div class="relative w-full">
                        <div id="carousel-cabin-1" class="relative h-32 overflow-hidden rounded-lg" data-carousel="slide">

                            <!-- Slides -->
                            <div class="duration-700 ease-in-out" data-carousel-item="active">
                                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945"
                                    class="absolute block w-full h-full object-cover">
                            </div>

                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="https://images.unsplash.com/photo-1505691723518-36a5ac3be353"
                                    class="absolute block w-full h-full object-cover">
                            </div>

                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267"
                                    class="absolute block w-full h-full object-cover">
                            </div>

                            <!-- Controls -->
                            <button type="button"
                                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-2 cursor-pointer group"
                                data-carousel-prev>
                                <span
                                    class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/30 group-hover:bg-white/50">
                                    ‹
                                </span>
                            </button>

                            <button type="button"
                                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-2 cursor-pointer group"
                                data-carousel-next>
                                <span
                                    class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/30 group-hover:bg-white/50">
                                    ›
                                </span>
                            </button>

                        </div>
                    </div>

                    <!-- Cabin Info -->
                    <div>
                        <h4 class="font-bold text-slate-800">Deluxe Cabin</h4>
                        <p class="text-sm text-slate-500">Sea view private cabin</p>
                        <p class="text-blue-600 font-bold">$2,450 / person</p>
                    </div>

                    <!-- Quantity Selector -->
                    <div class="flex items-center gap-4 justify-end">
                        <button class="minus bg-slate-200 px-3 py-1 rounded-md">-</button>
                        <span class="qty text-lg font-bold" data-cabin="Deluxe Cabin">0</span>
                        <button class="plus bg-blue-600 text-white px-3 py-1 rounded-md">+</button>
                    </div>

                </div>


                <!-- Another Cabin -->
                <div class="grid md:grid-cols-3 gap-6 items-center">

                    <!-- Carousel -->
                    <div class="relative w-full">
                        <div id="carousel-cabin-2" class="relative h-32 overflow-hidden rounded-lg"
                            data-carousel="slide">

                            <div class="duration-700 ease-in-out" data-carousel-item="active">
                                <img src="https://images.unsplash.com/photo-1560448075-bb485b067938"
                                    class="absolute block w-full h-full object-cover">
                            </div>

                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="https://images.unsplash.com/photo-1560185127-6ed189bf02f4"
                                    class="absolute block w-full h-full object-cover">
                            </div>

                            <!-- Controls -->
                            <button type="button"
                                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-2 cursor-pointer group"
                                data-carousel-prev>
                                <span
                                    class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/30 group-hover:bg-white/50">
                                    ‹
                                </span>
                            </button>

                            <button type="button"
                                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-2 cursor-pointer group"
                                data-carousel-next>
                                <span
                                    class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/30 group-hover:bg-white/50">
                                    ›
                                </span>
                            </button>

                        </div>
                    </div>

                    <!-- Cabin Info -->
                    <div>
                        <h4 class="font-bold text-slate-800">Premium Suite</h4>
                        <p class="text-sm text-slate-500">Luxury upper deck suite</p>
                        <p class="text-blue-600 font-bold">$3,900 / person</p>
                    </div>

                    <!-- Quantity Selector -->
                    <div class="flex items-center gap-4 justify-end">
                        <button class="minus bg-slate-200 px-3 py-1 rounded-md">-</button>
                        <span class="qty text-lg font-bold" data-cabin="Premium Suite">0</span>
                        <button class="plus bg-blue-600 text-white px-3 py-1 rounded-md">+</button>
                    </div>

                </div>

            </div>
        </div>

        <!-- Customer Information -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
            <h3 class="font-bold text-slate-800 text-lg mb-6">Customer Information</h3>

            <div class="grid md:grid-cols-2 gap-6">

                <input id="first_name" placeholder="First Name" class="border rounded-lg px-3 py-2">

                <input id="last_name" placeholder="Last Name" class="border rounded-lg px-3 py-2">

                <input id="address" placeholder="Address" class="border rounded-lg px-3 py-2 md:col-span-2">

                <input id="city" placeholder="City" class="border rounded-lg px-3 py-2">

                <input id="country" placeholder="Country" class="border rounded-lg px-3 py-2">

                <input id="phone" placeholder="Phone" class="border rounded-lg px-3 py-2">

                <input id="mobile" placeholder="Mobile" class="border rounded-lg px-3 py-2">

                <input id="email" placeholder="Email" class="border rounded-lg px-3 py-2 md:col-span-2">

            </div>

        </div>

        <!-- Submit -->
        <div class="flex justify-end">
            <button id="submit_booking" class="bg-blue-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-blue-700">
                Submit Booking
            </button>
        </div>

    </main>

    <x-footer />

    <script>
        let cabins = document.querySelectorAll("#cabin-list .grid");

        cabins.forEach(cabin => {

            let plus = cabin.querySelector(".plus");
            let minus = cabin.querySelector(".minus");
            let qty = cabin.querySelector(".qty");

            plus.addEventListener("click", function() {

                let value = parseInt(qty.textContent);
                qty.textContent = value + 1;

            });

            minus.addEventListener("click", function() {

                let value = parseInt(qty.textContent);
                if (value > 0) {
                    qty.textContent = value - 1;
                }

            });

        });

        document.getElementById("submit_booking").addEventListener("click", function() {

            let customer = {

                first_name: document.getElementById("first_name").value,
                last_name: document.getElementById("last_name").value,
                address: document.getElementById("address").value,
                city: document.getElementById("city").value,
                country: document.getElementById("country").value,
                phone: document.getElementById("phone").value,
                mobile: document.getElementById("mobile").value,
                email: document.getElementById("email").value

            };

            let selectedCabins = [];

            document.querySelectorAll(".qty").forEach(q => {

                let qty = parseInt(q.textContent);

                if (qty > 0) {

                    selectedCabins.push({
                        cabin: q.dataset.cabin,
                        quantity: qty
                    });

                }

            });

            console.log("Customer Info:", customer);
            console.log("Selected Cabins:", selectedCabins);

        });
    </script>

</body>
