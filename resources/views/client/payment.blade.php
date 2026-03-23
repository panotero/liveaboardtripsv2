<x-head>
    Booking - Payment
</x-head>

<body>

    <x-navbar />
    <main class="max-w-7xl mx-auto px-4 py-8 pt-28 space-y-8">

        <!-- TOTAL PAYMENT -->
        <section class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">

            <h2 class="font-bold text-slate-800 text-lg mb-6">
                Payment Summary
            </h2>

            <div class="grid md:grid-cols-3 gap-6 text-sm">

                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase">Cabins</p>
                    <p class="font-semibold text-slate-700">1 Cabin</p>
                </div>

                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase">Guests</p>
                    <p class="font-semibold text-slate-700">2 Guests</p>
                </div>

                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase">Total Payment</p>
                    <p class="text-xl font-bold text-blue-600">₱10,000</p>
                </div>

            </div>

        </section>



        <!-- PAYMENT METHODS -->
        <section class="flex flex-col lg:flex-row gap-8">

            <!-- LEFT COLUMN -->
            <aside class="w-full lg:w-1/3">

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">

                    <h3 class="font-bold text-slate-800 text-lg mb-6">
                        Payment Method
                    </h3>

                    <div class="space-y-3">

                        <button
                            class="payment-option w-full text-left px-4 py-3 border border-slate-200 rounded-lg hover:bg-slate-50"
                            data-target="bank">
                            Bank Transfer
                        </button>

                        <button
                            class="payment-option w-full text-left px-4 py-3 border border-slate-200 rounded-lg hover:bg-slate-50"
                            data-target="wise">
                            Wise Payment
                        </button>

                        <button
                            class="payment-option w-full text-left px-4 py-3 border border-slate-200 rounded-lg hover:bg-slate-50"
                            data-target="card">
                            Credit Card
                        </button>

                    </div>

                </div>

            </aside>



            <!-- RIGHT COLUMN -->
            <section class="w-full lg:w-2/3">

                <!-- BANK TRANSFER -->
                <div id="bank" class="payment-form bg-white p-6 rounded-2xl shadow-sm border border-slate-200">

                    <h3 class="font-bold text-slate-800 text-lg mb-6">
                        Bank Transfer
                    </h3>

                    <div class="mb-6 bg-slate-50 border border-slate-200 rounded-lg p-4 text-sm">

                        <p class="font-semibold text-slate-700 mb-2">Bank Information</p>

                        <p>Bank: BDO</p>
                        <p>Account Name: Island Voyages Inc.</p>
                        <p>Account Number: 123456789</p>
                        <p>Swift Code: BNORPHMM</p>

                    </div>

                    <div class="mb-6">
                        <label class="block text-xs font-bold text-slate-400 uppercase mb-2">
                            Upload Proof of Payment
                        </label>

                        <input type="file" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm">
                    </div>

                    <button
                        class="w-full py-3 rounded-lg text-white font-semibold bg-blue-600 hover:bg-blue-700 transition">
                        Submit Payment
                    </button>

                </div>



                <!-- WISE PAYMENT -->
                <div id="wise"
                    class="payment-form hidden bg-white p-6 rounded-2xl shadow-sm border border-slate-200">

                    <h3 class="font-bold text-slate-800 text-lg mb-6">
                        Wise Payment
                    </h3>

                    <p class="text-sm text-slate-500 mb-6">
                        Scan the QR code below using your Wise app to complete the payment.
                    </p>

                    <div class="flex justify-center">

                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=sample-wise-payment"
                            class="border border-slate-200 rounded-lg p-2">

                    </div>

                </div>



                <!-- CREDIT CARD -->
                <div id="card"
                    class="payment-form hidden bg-white p-6 rounded-2xl shadow-sm border border-slate-200">

                    <h3 class="font-bold text-slate-800 text-lg mb-6">
                        Credit Card Payment
                    </h3>

                    <div class="grid md:grid-cols-2 gap-4">

                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">
                                Card Number
                            </label>
                            <input type="text" placeholder="1234 5678 9012 3456"
                                class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">
                                Name on Card
                            </label>
                            <input type="text" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">
                                Expiration Date
                            </label>
                            <input type="text" placeholder="MM / YY"
                                class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">
                                CVV
                            </label>
                            <input type="text" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm">
                        </div>

                    </div>

                    <button
                        class="w-full mt-6 py-3 rounded-lg text-white font-semibold bg-blue-600 hover:bg-blue-700 transition">
                        Pay Now
                    </button>

                </div>

            </section>

        </section>

    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".payment-option").forEach(btn => {

                btn.addEventListener("click", () => {

                    let target = btn.dataset.target;

                    document.querySelectorAll(".payment-form").forEach(form => {
                        form.classList.add("hidden");
                    });

                    document.getElementById(target).classList.remove("hidden");

                });

            });
        })
    </script>

</body>
