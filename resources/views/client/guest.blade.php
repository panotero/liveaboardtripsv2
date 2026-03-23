<!DOCTYPE html>
<html>


<x-head>
    Booking - Guest
</x-head>

<body>

    <x-navbar />
    <main class="max-w-7xl mx-auto px-4 py-8 pt-28 flex flex-col lg:flex-row gap-8">

        <!-- LEFT : Guest Information -->
        <section class="w-full lg:w-2/3 space-y-6">

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                <h2 class="font-bold text-slate-800 text-lg mb-6">
                    Guest Information
                </h2>

                <!-- Cabin 1 -->
                <div class="border-b border-slate-200 pb-6 mb-6">

                    <h3 class="font-semibold text-slate-700 mb-4">
                        Cabin 1
                    </h3>

                    <div class="flex items-center mb-4">
                        <input type="checkbox" class="soloOption mr-2 rounded border-slate-300">
                        <label class="text-sm text-slate-600">
                            Solo Cabin (Single Supplement)
                        </label>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">
                                First Name
                            </label>
                            <input type="text"
                                class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">
                                Last Name
                            </label>
                            <input type="text"
                                class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">
                                Email
                            </label>
                            <input type="email"
                                class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">
                                Phone
                            </label>
                            <input type="text"
                                class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500">
                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- RIGHT : Booking Computation -->
        <aside class="w-full lg:w-1/3">

            <div class="sticky top-28 bg-white p-6 rounded-2xl shadow-sm border border-slate-200">

                <h3 class="font-bold text-slate-800 text-lg mb-6">
                    Booking Summary
                </h3>

                <div class="space-y-4 text-sm">

                    <div class="flex justify-between">
                        <span class="text-slate-500">Cabin Price</span>
                        <span id="cabinPrice" class="font-semibold text-slate-700">
                            ₱10,000
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-slate-500">Cabins</span>
                        <span id="cabinCount" class="font-semibold text-slate-700">
                            1
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-slate-500">Solo Supplement</span>
                        <span id="soloPrice" class="font-semibold text-slate-700">
                            ₱0
                        </span>
                    </div>

                </div>

                <div class="border-t border-slate-200 my-6"></div>

                <div class="flex justify-between items-center text-lg font-bold">
                    <span class="text-slate-800">Total</span>
                    <span id="totalPrice" class="text-blue-600">
                        ₱10,000
                    </span>
                </div>

                <button
                    class="w-full mt-6 py-3 rounded-lg text-white font-semibold bg-blue-600 hover:bg-blue-700 transition">
                    Proceed to Payment
                </button>

            </div>

        </aside>

    </main>
    <x-footer />

    <script>
        let cabinPrice = 10000;
        let soloSupplement = 3000;

        function updateTotal() {

            let soloSelected = document.querySelectorAll(".soloOption:checked").length;

            let soloTotal = soloSelected * soloSupplement;
            let total = cabinPrice + soloTotal;

            document.getElementById("soloPrice").innerText = "₱ " + soloTotal.toLocaleString();
            document.getElementById("totalPrice").innerText = "₱ " + total.toLocaleString();

        }

        document.querySelectorAll(".soloOption").forEach(el => {
            el.addEventListener("change", updateTotal);
        });
    </script>

</body>

</html>
