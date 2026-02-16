<div class="p-4 md:p-8 bg-gray-50 dark:bg-gray-900 min-h-screen ">

    <div class="h-full container mx-auto py-5 ">
        <div id="bookingManagementPage" class="p-6 space-y-6">


            <!-- STATUS CARDS -->
            <div id="bookingStatusCards" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4"></div>

            <!-- MANUAL BOOKING BUTTON -->
            <div class="flex justify-end">
                <button id="manualBookingBtn" class="px-4 py-2 rounded-full bg-blue-600 text-white hover:bg-blue-700">
                    Manual Booking
                </button>
            </div>

            <!-- BOOKING TABLE -->
            <div class="bg-white rounded shadow overflow-x-auto">
                <table id="bookingTable" class="min-w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th>Booking #</th>
                            <th>Customer Name</th>
                            <th>Amount</th>
                            <th>Schedule ID</th>
                            <th>Vessel ID</th>
                            <th>Operator ID</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="bookingTableBody"></tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- MANUAL BOOKING MODAL -->
<div id="manualBookingModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white dark:bg-gray-900 w-full max-w-3xl rounded-2xl shadow-lg p-6 space-y-4 overflow-y-auto">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Manual Booking</h2>
            <button class="modal-close text-gray-500 hover:text-gray-800">✕</button>
        </div>

        <!-- CUSTOMER INFO -->
        <section class="space-y-2">
            <h3 class="font-semibold">Customer Information</h3>
            <input type="text" placeholder="Customer Name" id="manualCustomerName"
                class="w-full border rounded p-2" />
            <input type="email" placeholder="Email" id="manualCustomerEmail" class="w-full border rounded p-2" />
            <input type="text" placeholder="Phone Number" id="manualCustomerPhone"
                class="w-full border rounded p-2" />
        </section>

        <!-- BOOKING INFO -->
        <section class="space-y-2">
            <h3 class="font-semibold">Booking Information</h3>
            <input type="text" placeholder="Schedule ID" id="manualScheduleId" class="w-full border rounded p-2" />
            <input type="text" placeholder="Vessel ID" id="manualVesselId" class="w-full border rounded p-2" />
            <input type="text" placeholder="Operator ID" id="manualOperatorId" class="w-full border rounded p-2" />
            <input type="number" placeholder="Amount" id="manualAmount" class="w-full border rounded p-2" />
            <select id="manualBookingStatus" class="w-full border rounded p-2">
                <option value="pending">Pending</option>
                <option value="for confirmation">For Confirmation</option>
                <option value="paid">Paid</option>
                <option value="completed">Completed</option>
            </select>
        </section>

        <div class="flex justify-end gap-2">
            <button class="modal-close px-4 py-2 rounded border">Cancel</button>
            <button id="manualBookingSubmit"
                class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Save</button>
        </div>
    </div>
</div>

<!-- BOOKING INFORMATION MODAL -->
<div id="bookingInfoModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white dark:bg-gray-900 w-full max-w-4xl rounded-2xl shadow-lg p-6 space-y-6 overflow-y-auto">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Booking Information</h2>
            <div class="flex items-center gap-2">
                <button id="bookingInfoNextAction"
                    class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Next Action</button>
                <button class="modal-close text-gray-500 hover:text-gray-800">✕</button>
            </div>
        </div>

        <!-- CUSTOMER INFO -->
        <section id="bookingCustomerInfo" class="space-y-2"></section>

        <!-- BOOKING DETAILS -->
        <section id="bookingDetails" class="space-y-2"></section>

        <!-- PAYMENT HISTORY -->
        <section>
            <h3 class="font-semibold mb-2 flex items-center justify-between">
                Payment History
                <button id="viewPaymentHistoryBtn"
                    class="px-2 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">View</button>
            </h3>
            <ul id="paymentHistoryList" class="space-y-1"></ul>
        </section>
    </div>
</div>

<!-- PAYMENT HISTORY MODAL -->
<div id="paymentHistoryModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white dark:bg-gray-900 w-full max-w-3xl rounded-2xl shadow-lg p-6 space-y-4 overflow-y-auto">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Payment History</h2>
            <button class="modal-close text-gray-500 hover:text-gray-800">✕</button>
        </div>
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Method</th>
                </tr>
            </thead>
            <tbody id="paymentHistoryTableBody"></tbody>
        </table>
    </div>
</div>


<script>
    (function() {
        const bookings = [{
                id: "B001",
                customerName: "John Doe",
                email: "john@example.com",
                phone: "09171234567",
                amount: 12000,
                scheduleId: "S001",
                vesselId: 1,
                operatorId: 1,
                status: "pending",
                paymentHistory: [{
                        date: "2026-02-01",
                        amount: 6000,
                        status: "partial",
                        method: "Gcash"
                    },
                    {
                        date: "2026-02-02",
                        amount: 6000,
                        status: "pending",
                        method: "Gcash"
                    },
                ]
            },
            {
                id: "B002",
                customerName: "Anna Cruz",
                email: "anna@example.com",
                phone: "09172345678",
                amount: 15000,
                scheduleId: "S002",
                vesselId: 2,
                operatorId: 2,
                status: "paid",
                paymentHistory: [{
                    date: "2026-02-01",
                    amount: 15000,
                    status: "paid",
                    method: "Card"
                }, ]
            },
            {
                id: "B003",
                customerName: "Mike Tan",
                email: "mike@example.com",
                phone: "09173456789",
                amount: 10000,
                scheduleId: "S003",
                vesselId: 3,
                operatorId: 1,
                status: "completed",
                paymentHistory: [{
                    date: "2026-01-30",
                    amount: 10000,
                    status: "paid",
                    method: "Cash"
                }, ]
            }
        ];
        const statusCardsContainer = document.getElementById("bookingStatusCards");
        const statusCounts = {
            total: bookings.length,
            pending: bookings.filter(b => b.status === "pending").length,
            forConfirmation: bookings.filter(b => b.status === "for confirmation").length,
            paid: bookings.filter(b => b.status === "paid").length,
            completed: bookings.filter(b => b.status === "completed").length
        };

        Object.entries(statusCounts).forEach(([key, value]) => {
            statusCardsContainer.innerHTML += `
        <div class="bg-white p-4 rounded shadow">
            <div class="text-sm text-gray-500">${key.replace(/([A-Z])/g,' $1')}</div>
            <div class="text-xl font-bold">${value}</div>
        </div>
    `;
        });
        const bookingTableBody = document.getElementById("bookingTableBody");

        function populateBookingTable() {
            bookingTableBody.innerHTML = bookings.map(b => `
        <tr class="border-b hover:bg-gray-50 cursor-pointer" data-id="${b.id}">
            <td>${b.id}</td>
            <td>${b.customerName}</td>
            <td>${b.amount}</td>
            <td>${b.scheduleId}</td>
            <td>${b.vesselId}</td>
            <td>${b.operatorId}</td>
            <td>${b.status}</td>
            <td>
                <button class="px-2 py-1 text-sm bg-blue-600 text-white rounded edit-booking-btn">Edit</button>
                <button class="px-2 py-1 text-sm bg-red-600 text-white rounded delete-booking-btn">Delete</button>
            </td>
        </tr>
    `).join("");

            // Initialize DataTable (custom function)

            initDataTables();
        }

        populateBookingTable();
        document.getElementById("manualBookingBtn").addEventListener("click", () => {
            initModal({
                modalId: "manualBookingModal"
            });
        });
        document.addEventListener("click", function(e) {
            const row = e.target.closest("tr[data-id]");
            if (!row) return;

            const bookingId = row.dataset.id;
            const bookingData = bookings.find(b => b.id === bookingId);
            if (!bookingData) return;

            // Prevent row click when clicking buttons
            if (e.target.closest(".edit-booking-btn")) {
                console.log("Edit booking:", bookingData);
                return;
            }

            if (e.target.closest(".delete-booking-btn")) {
                if (!confirm(`Delete booking ${bookingData.id}?`)) return;
                console.log("Deleted booking:", bookingData);
                return;
            }

            // Row click → open booking info modal
            openBookingInfoModal(bookingData);
        });

        function openBookingInfoModal(bookingData) {
            // CUSTOMER INFO
            document.getElementById("bookingCustomerInfo").innerHTML = `
        <h3 class="font-semibold">Customer Information</h3>
        <p>Name: ${bookingData.customerName}</p>
        <p>Email: ${bookingData.email}</p>
        <p>Phone: ${bookingData.phone}</p>
    `;

            // BOOKING DETAILS
            document.getElementById("bookingDetails").innerHTML = `
        <h3 class="font-semibold">Booking Information</h3>
        <p>Schedule ID: ${bookingData.scheduleId}</p>
        <p>Vessel ID: ${bookingData.vesselId}</p>
        <p>Operator ID: ${bookingData.operatorId}</p>
        <p>Amount: ${bookingData.amount}</p>
        <p>Status: ${bookingData.status}</p>
    `;

            // PAYMENT HISTORY
            const paymentList = document.getElementById("paymentHistoryList");
            paymentList.innerHTML = bookingData.paymentHistory.map(p => `
        <li class="hover:underline cursor-pointer">${p.date} - ${p.amount} - ${p.status}</li>
    `).join("");

            document.getElementById("viewPaymentHistoryBtn").onclick = () => {
                const tbody = document.getElementById("paymentHistoryTableBody");
                tbody.innerHTML = bookingData.paymentHistory.map(p => `
            <tr class="border-b">
                <td>${p.date}</td>
                <td>${p.amount}</td>
                <td>${p.status}</td>
                <td>${p.method}</td>
            </tr>
        `).join("");
                initModal({
                    modalId: "paymentHistoryModal"
                });
            };

            initModal({
                modalId: "bookingInfoModal"
            });
        }

    })();
</script>
