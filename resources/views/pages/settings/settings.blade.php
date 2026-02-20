<div class="container mx-auto h-screen">

    <!-- ================= SETTINGS GRID ================= -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- ===== SECTION 1 ===== -->
        <div
            class="bg-white dark:bg-gray-800 overflow-x-auto rounded-xl  p-4 border border-gray-500 shadow-md shadow-gray-700">
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-semibold text-lg">User Roles</h2>
                <button class="bg-blue-500 text-white px-4 py-2 rounded add-setting-btn" data-section="general">
                    Add Role
                </button>
            </div>

            <table id="generalTable" class="w-full text-sm text-left text-gray-700 dark:text-gray-300 table-auto">
                <thead class="bg-gray-50 dark:bg-gray-700 text-gray-600 text-xs uppercase">
                    <tr>
                        <th>ID</th>
                        <th>Key</th>
                        <th>Value</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white dark:bg-gray-800 dark:divide-gray-700"></tbody>
            </table>
        </div>

    </div>

</div>
<!-- ================= MODAL ================= -->
<div id="settingModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg w-full max-w-md p-6">
        <h3 class="text-lg font-semibold mb-4" id="modalTitle">Add Setting</h3>

        <input type="hidden" id="modalSection">
        <input type="hidden" id="settingId">

        <div class="space-y-3">
            <div>
                <label class="text-sm">Key</label>
                <input id="settingKey" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="text-sm">Value</label>
                <input id="settingValue" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="text-sm">Status</label>
                <select id="settingStatus" class="w-full border rounded px-3 py-2">
                    <option value="active">Active</option>
                    <option value="deactivated">Deactivated</option>
                </select>
            </div>
        </div>

        <div class="flex justify-end gap-2 mt-5">
            <button class="px-4 py-2 rounded border modal-close">Cancel</button>
            <button id="saveSetting" class="px-4 py-2 rounded bg-blue-500 text-white">Save</button>
        </div>
    </div>
</div>

<!-- ================= SCRIPT ================= -->
<script>
    (function() {

        /* ================= SAMPLE DATA ================= */
        let generalSettings = [{
                id: 1,
                key: "site_name",
                value: "My App",
                status: "active"
            },
            {
                id: 2,
                key: "timezone",
                value: "Asia/Manila",
                status: "active"
            }
        ];

        let notificationSettings = [{
                id: 1,
                key: "email_alerts",
                value: "enabled",
                status: "active"
            },
            {
                id: 2,
                key: "sms_alerts",
                value: "disabled",
                status: "deactivated"
            }
        ];


        /* ================= REUSABLE UPDATE ROW ================= */
        function updateRow(table, setting) {

            if (!table) return;

            let dt = null;
            if ($.fn.DataTable.isDataTable(table)) {
                dt = $(table).DataTable();
            }

            const rowData = [
                setting.id ?? "-",
                setting.key ?? "-",
                setting.value ?? "-",
                setting.status ?? "-"
            ];

            if (dt) {
                const newRow = dt.row.add(rowData).draw(false);
                const rowNode = newRow.node();

                rowNode.classList.add(
                    "cursor-pointer",
                    "hover:bg-gray-100",
                    "transition"
                );

                rowNode.dataset.id = setting.id;
                rowNode.dataset.section = table.id;
            }
        }

        /* ================= LOAD INITIAL DATA ================= */
        $(document).ready(function() {

            initDataTables();

            generalSettings.forEach(s => updateRow(document.getElementById("generalTable"), s));
            notificationSettings.forEach(s => updateRow(document.getElementById("notificationTable"), s));
        });

        /* ================= ROW CLICK (EDIT) ================= */
        $(document).on("click", "tbody tr", function() {
            const tableId = this.closest("table").id;
            const id = this.children[0].innerText;

            const dataSource =
                tableId === "generalTable" ? generalSettings : notificationSettings;

            const data = dataSource.find(i => i.id == id);
            if (!data) return;

            $("#modalTitle").text("Edit Setting");
            $("#modalSection").val(tableId);
            $("#settingId").val(data.id);
            $("#settingKey").val(data.key);
            $("#settingValue").val(data.value);
            $("#settingStatus").val(data.status);

            $("#settingModal").removeClass("hidden").addClass("flex");
        });

        /* ================= ADD BUTTON ================= */
        $(".add-setting-btn").on("click", function() {
            $("#modalTitle").text("Add Setting");
            $("#modalSection").val($(this).data("section") + "Table");
            $("#settingId").val("");
            $("#settingKey").val("");
            $("#settingValue").val("");
            $("#settingStatus").val("active");

            $("#settingModal").removeClass("hidden").addClass("flex");
        });

        /* ================= MODAL CLOSE ================= */
        $(".modal-close").on("click", function() {
            $("#settingModal").addClass("hidden").removeClass("flex");
        });
    })();
</script>
