<div class="p-4 md:p-8 bg-gray-50 dark:bg-gray-900 min-h-screen ">

    <div class="h-full container mx-auto py-5 ">
        <div id="dashboard" class="p-6 space-y-6">

            <!-- HEADER -->
            <div>
                <h1 class="text-2xl font-bold">Dashboard</h1>
                <p class="text-gray-500">System overview and key performance indicators</p>
            </div>

            <!-- KPI CARDS -->
            <div id="kpiCards" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-4"></div>

            <!-- CHARTS -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="font-semibold mb-2">Booking Status Breakdown</h3>
                    <canvas id="bookingStatusChart"></canvas>
                </div>

                <div class="bg-white p-4 rounded shadow">
                    <h3 class="font-semibold mb-2">Bookings Over Time</h3>
                    <canvas id="bookingTrendChart"></canvas>
                </div>
            </div>

            <!-- FINANCIAL -->
            <div class="bg-white p-4 rounded shadow">
                <h3 class="font-semibold mb-2">Payment Status Summary</h3>
                <canvas id="paymentStatusChart"></canvas>
            </div>

            <!-- VESSEL & CABIN -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="font-semibold mb-2">Vessel Activity</h3>
                    <ul id="vesselStats" class="space-y-1 text-sm"></ul>
                </div>

                <div class="bg-white p-4 rounded shadow">
                    <h3 class="font-semibold mb-2">Cabin Availability</h3>
                    <ul id="cabinStats" class="space-y-1 text-sm"></ul>
                </div>
            </div>

            <!-- TABLES -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="font-semibold mb-2">Recent Bookings</h3>
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-left border-b">
                                <th>Booking #</th>
                                <th>Guest</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody id="recentBookings"></tbody>
                    </table>
                </div>

                <div class="bg-white p-4 rounded shadow">
                    <h3 class="font-semibold mb-2">Recent Cancellations</h3>
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-left border-b">
                                <th>Booking #</th>
                                <th>Reason</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody id="recentCancellations"></tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>


<script>
    (function() {
        const bookings = [{
                id: "B001",
                guest: "John Doe",
                status: "paid",
                payment: "paid",
                date: "2026-01-02"
            },
            {
                id: "B002",
                guest: "Anna Cruz",
                status: "pending",
                payment: "unpaid",
                date: "2026-01-05"
            },
            {
                id: "B003",
                guest: "Mike Tan",
                status: "completed",
                payment: "paid",
                date: "2026-01-06"
            },
            {
                id: "B004",
                guest: "Sarah Lim",
                status: "cancelled",
                payment: "refunded",
                date: "2026-01-07"
            },
            {
                id: "B005",
                guest: "Leo Ramos",
                status: "confirmed",
                payment: "partial",
                date: "2026-01-08"
            }
        ];

        const vessels = [{
                id: 1,
                name: "Sea Explorer",
                status: "active"
            },
            {
                id: 2,
                name: "Ocean Spirit",
                status: "maintenance"
            },
            {
                id: 3,
                name: "Dive Master",
                status: "active"
            }
        ];

        const cabins = [{
                id: 1,
                status: "available"
            },
            {
                id: 2,
                status: "occupied"
            },
            {
                id: 3,
                status: "occupied"
            },
            {
                id: 4,
                status: "maintenance"
            }
        ];

        const operators = [{
                id: 1,
                active: true
            },
            {
                id: 2,
                active: true
            },
            {
                id: 3,
                active: false
            }
        ];
        const kpis = {
            totalBookings: bookings.length,
            activeBookings: bookings.filter(b => ["pending", "confirmed"].includes(b.status)).length,
            activeVessels: vessels.filter(v => v.status === "active").length,
            activeOperators: operators.filter(o => o.active).length,
            totalRevenue: bookings.filter(b => b.payment === "paid").length * 150000,
            pendingPayments: bookings.filter(b => b.payment === "unpaid").length * 50000
        };

        const kpiContainer = document.getElementById("kpiCards");

        Object.entries(kpis).forEach(([key, value]) => {
            kpiContainer.innerHTML += `
        <div class="bg-white p-4 rounded shadow">
            <div class="text-sm text-gray-500">${key.replace(/([A-Z])/g, ' $1')}</div>
            <div class="text-xl font-bold">${value}</div>
        </div>
    `;
        });
        const statusCounts = bookings.reduce((acc, b) => {
            acc[b.status] = (acc[b.status] || 0) + 1;
            return acc;
        }, {});

        new Chart(document.getElementById("bookingStatusChart"), {
            type: "pie",
            data: {
                labels: Object.keys(statusCounts),
                datasets: [{
                    data: Object.values(statusCounts)
                }]
            }
        });
        const bookingsByDate = {};

        bookings.forEach(b => {
            bookingsByDate[b.date] = (bookingsByDate[b.date] || 0) + 1;
        });

        new Chart(document.getElementById("bookingTrendChart"), {
            type: "line",
            data: {
                labels: Object.keys(bookingsByDate),
                datasets: [{
                    label: "Bookings",
                    data: Object.values(bookingsByDate),
                    tension: 0.3
                }]
            }
        });
        const paymentCounts = bookings.reduce((acc, b) => {
            acc[b.payment] = (acc[b.payment] || 0) + 1;
            return acc;
        }, {});

        new Chart(document.getElementById("paymentStatusChart"), {
            type: "bar",
            data: {
                labels: Object.keys(paymentCounts),
                datasets: [{
                    label: "Payments",
                    data: Object.values(paymentCounts)
                }]
            }
        });
        document.getElementById("vesselStats").innerHTML = `
    <li>Active: ${vessels.filter(v => v.status === "active").length}</li>
    <li>Maintenance: ${vessels.filter(v => v.status === "maintenance").length}</li>
`;

        document.getElementById("cabinStats").innerHTML = `
    <li>Total: ${cabins.length}</li>
    <li>Available: ${cabins.filter(c => c.status === "available").length}</li>
    <li>Occupied: ${cabins.filter(c => c.status === "occupied").length}</li>
`;
        document.getElementById("recentBookings").innerHTML =
            bookings.slice(0, 5).map(b => `
        <tr class="border-b">
            <td>${b.id}</td>
            <td>${b.guest}</td>
            <td>${b.status}</td>
            <td>${b.date}</td>
        </tr>
    `).join("");

        document.getElementById("recentCancellations").innerHTML =
            bookings.filter(b => b.status === "cancelled").map(b => `
        <tr class="border-b">
            <td>${b.id}</td>
            <td>User request</td>
            <td>${b.date}</td>
        </tr>
    `).join("");

    })();
</script>
