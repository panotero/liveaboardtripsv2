<!-- PAGE HEADER -->
<div class="flex items-center justify-between mb-4">
    <h2 class="text-xl font-semibold">User Management</h2>

    <button
        id="addUserBtn"
        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Add User
    </button>
</div>

<!-- TABLE -->
<div class="bg-white rounded shadow p-4">
    <table id="usersTable" class="w-full text-sm">
        <thead>
            <tr class="border-b">
                <th class="text-left p-2">Name</th>
                <th class="text-left p-2">Username</th>
                <th class="text-left p-2">User Type</th>
                <th class="text-left p-2">Status</th>
                <th class="text-left p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Sample row -->
            <tr class="border-b">
                <td class="p-2">John Doe</td>
                <td class="p-2">jdoe</td>
                <td class="p-2">Admin</td>
                <td class="p-2">Active</td>
                <td class="p-2">
                    <button class="text-blue-600 hover:underline">Edit</button>
                    <button class="text-red-600 hover:underline ml-2">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- USER MODAL -->
<div
    id="DocumentModal"
    class="hidden fixed inset-0 z-40 flex items-center justify-center bg-black bg-opacity-50">

    <div class="bg-white rounded-lg w-full max-w-md p-6 relative">
        <h3 class="text-lg font-semibold mb-4">Add User</h3>

        <div class="space-y-3">
            <div>
                <label class="block text-sm mb-1">Name</label>
                <input type="text" id="name" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block text-sm mb-1">Username</label>
                <input type="text" id="username" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block text-sm mb-1">Password</label>

                <div class="relative mt-1">
                    <button type="button" id="addUserTogglePassword" tabindex="-1"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700">

                        <svg id="addUserEyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.644C3.423 7.51
                       7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431
                       0 .638C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>


                    <input type="password" id="password" class="w-full border rounded p-2">
                </div>
            </div>

            <div>
                <label class="block text-sm mb-1">Confirm Password</label>

                <div class="relative mt-1">
                    <button type="button" id="addUserTogglePasswordConfirm" tabindex="-1"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700">

                        <svg id="addUserEyeIconConfirm" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.644C3.423 7.51
                       7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431
                       0 .638C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>


                    <input type="password" id="confirmPassword" class="w-full border rounded p-2">
                </div>
            </div>

            <div>
                <label class="block text-sm mb-1">User Type</label>
                <select id="userType" class="w-full border rounded p-2">
                    <option value="">Select type</option>
                    <option value="agent">Agent</option>
                    <option value="admin">Admin</option>
                    <option value="operator">Operator</option>
                </select>
            </div>
        </div>

        <div class="flex justify-end gap-2 mt-6">
            <button class="modal-close px-4 py-2 border rounded">
                Cancel
            </button>
            <button
                id="saveUserBtn"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Save
            </button>
        </div>
    </div>
</div>

<script>
    (function() {

        // Initialize DataTable
        initDataTables();

        initPasswordToggle("addUserTogglePassword", "password", "addUserEyeIcon");
        initPasswordToggle("addUserTogglePasswordConfirm", "confirmPassword", "addUserEyeIconConfirm");
        // Open modal
        document.getElementById('addUserBtn').addEventListener('click', function() {
            initModal({
                modalId: "DocumentModal"
            });
        });

        // Save button (no API yet)
        document.getElementById('saveUserBtn').addEventListener('click', function() {
            const formData = new FormData();

            formData.append('name', document.getElementById('name').value);
            formData.append('username', document.getElementById('username').value);
            formData.append('password', document.getElementById('password').value);
            formData.append('confirm_password', document.getElementById('confirmPassword').value);
            formData.append('user_type', document.getElementById('userType').value);

            for (let pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }
        });
    })();
</script>
