<div class="p-4 md:p-8 bg-gray-50 dark:bg-gray-900 min-h-screen ">

    <div class="h-full container mx-auto py-5 ">
        <!-- Page Header -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">
                Schedules Management
            </h1>

            <button id="addScheduleBtn"
                class="px-5 py-2 rounded-xl
               bg-blue-600 text-white
               hover:bg-blue-700">
                + Add Schedule
            </button>
        </div>

        <!-- Table -->
        <div class="bg-white dark:bg-gray-900 rounded-2xl p-4">
            <table id="schedulesTable" class="w-full text-sm">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Duration</th>
                        <th>Operator</th>
                        <th>Vessel</th>
                    </tr>
                </thead>
                <tbody id="schedulesTableBody"></tbody>
            </table>
        </div>

    </div>
</div>
<!-- Schedule Modal -->
<div id="scheduleModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">

    <div class="bg-white dark:bg-gray-900 w-full max-w-3xl
               rounded-2xl shadow-lg p-6 space-y-6">

        <!-- Header -->
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
                Schedule Information
            </h2>
            <button class="modal-close text-gray-500 hover:text-gray-800">✕</button>
        </div>

        <form id="scheduleForm" class="space-y-4">

            <input type="hidden" name="schedule_id" id="scheduleId">

            <div>
                <label class="text-sm">Schedule Title</label>
                <input type="text" name="title" id="scheduleTitle" class="w-full px-4 py-2 rounded-xl border">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-sm">From</label>
                    <input type="date" name="from" id="scheduleFrom" class="w-full px-4 py-2 rounded-xl border">
                </div>

                <div>
                    <label class="text-sm">To</label>
                    <input type="date" name="to" id="scheduleTo" class="w-full px-4 py-2 rounded-xl border">
                </div>
            </div>

            <div>
                <label class="text-sm">Duration</label>
                <input type="text" id="scheduleDuration" class="w-full px-4 py-2 rounded-xl border bg-gray-100"
                    readonly>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-sm">Operator</label>
                    <select name="operator_id" id="scheduleOperator" class="w-full px-4 py-2 rounded-xl border">
                        <option value="1">Operator 1</option>
                        <option value="2">Operator 2</option>
                        <option value="3">Operator 3</option>
                    </select>
                </div>

                <div>
                    <label class="text-sm">Vessel</label>
                    <select name="vessel_id" id="scheduleVessel" class="w-full px-4 py-2 rounded-xl border">
                        <option value="4">Ocean Explorer</option>
                        <option value="28">Sea Voyager</option>
                        <option value="32">Blue Horizon</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>


<script>
    (function() {

        let cachedSchedules = [{
                id: 1,
                title: 'Tubbataha Expedition',
                from: '2026-03-01',
                to: '2026-03-10',
                nights: 9,
                days: 10,
                operator_id: 1,
                operator_name: 'Operator 1',
                vessel_id: 4,
                vessel_name: 'Ocean Explorer'
            },
            {
                id: 2,
                title: 'Coron Wrecks',
                from: '2026-04-05',
                to: '2026-04-12',
                nights: 7,
                days: 8,
                operator_id: 2,
                operator_name: 'Operator 2',
                vessel_id: 28,
                vessel_name: 'Sea Voyager'
            }
        ];

        function updateScheduleTable(schedules) {
            const tbody = document.getElementById('schedulesTableBody');
            tbody.innerHTML = '';

            schedules.forEach(schedule => {
                const tr = document.createElement('tr');
                tr.className =
                    'schedule-row cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-800';
                tr.dataset.id = schedule.id;

                tr.innerHTML = `
                <td>${schedule.title}</td>
                <td>${schedule.from}</td>
                <td>${schedule.to}</td>
                <td>${schedule.nights} nights / ${schedule.days} days</td>
                <td>${schedule.operator_name}</td>
                <td>${schedule.vessel_name}</td>
            `;

                tbody.appendChild(tr);
            });

            initDataTables();
        }

        function getScheduleFromCacheById(id) {
            return cachedSchedules.find(s => s.id == id);
        }

        updateScheduleTable(cachedSchedules);



        function updateScheduleDuration() {
            const from = new Date(document.getElementById('scheduleFrom').value);
            const to = new Date(document.getElementById('scheduleTo').value);
            const durationField = document.getElementById('scheduleDuration');

            if (!from || !to || to <= from) {
                durationField.value = '';
                return;
            }

            const diffDays =
                Math.floor((to - from) / (1000 * 60 * 60 * 24));

            durationField.value =
                `${diffDays} nights / ${diffDays + 1} days`;
        }

        document.getElementById('scheduleFrom').addEventListener('change', updateScheduleDuration);
        document.getElementById('scheduleTo').addEventListener('change', updateScheduleDuration);



        document.addEventListener('click', function(e) {
            const row = e.target.closest('.schedule-row');
            if (!row) return;

            const schedule = getScheduleFromCacheById(row.dataset.id);
            if (!schedule) return;

            document.getElementById('scheduleId').value = schedule.id;
            document.getElementById('scheduleTitle').value = schedule.title;
            document.getElementById('scheduleFrom').value = schedule.from;
            document.getElementById('scheduleTo').value = schedule.to;
            document.getElementById('scheduleDuration').value =
                `${schedule.nights} nights / ${schedule.days} days`;
            document.getElementById('scheduleOperator').value = schedule.operator_id;
            document.getElementById('scheduleVessel').value = schedule.vessel_id;

            initModal({
                modalId: 'scheduleModal'
            });
        });
        document.getElementById('addScheduleBtn').addEventListener('click', () => {
            document.getElementById('scheduleForm').reset();
            document.getElementById('scheduleId').value = '';
            initModal({
                modalId: 'scheduleModal'
            });
        });

        document.getElementById('scheduleForm').addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('Schedule form submitted');
        });
    })();
</script>
