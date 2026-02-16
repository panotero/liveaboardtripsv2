<div class="p-4 md:p-8 bg-gray-50 dark:bg-gray-900 min-h-screen ">

    <div class="h-full container mx-auto py-5 ">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Vessels</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Manage your liveaboard fleet</p>
            </div>

            <button id="openVesselModal"
                class="px-5 py-2.5 bg-black text-white rounded-full text-sm font-medium hover:opacity-90 transition dark:bg-white dark:text-black">
                + Add New Vessel
            </button>
        </div>

        <!-- Vessel List -->
        <div class="mb-4">
            <input type="text" id="vesselSearchInput" placeholder="Search vessels..."
                class="w-full md:w-80 px-4 py-2 rounded-xl
               border border-gray-300 dark:border-gray-600
               bg-white dark:bg-gray-800
               text-sm text-gray-800 dark:text-white
               focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div class="space-y-4" id="vesselListContainer">

            <!-- Vessel Row Card -->
            <div
                class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl p-4 flex flex-col md:flex-row md:items-center justify-between gap-4 hover:shadow-sm transition">

                <div class="flex items-center gap-4">
                    <img src="/images/sample-boat.jpg" class="w-20 h-20 object-cover rounded-xl" />

                    <div>
                        <h3 class="font-semibold text-gray-800 dark:text-white">Ocean Explorer</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Capacity: 20 divers</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <button id="editVesselBtn"
                        class="px-4 py-2 text-sm rounded-full border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                        Edit
                    </button>
                    <button id="deleteVesselBtn"
                        class="px-4 py-2 text-sm rounded-full bg-red-500 text-white hover:bg-red-600">
                        Delete
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

@php
    $inputClass =
        'w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-black dark:focus:ring-white';
    $fileInputClass =
        'w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-black file:text-white dark:file:bg-white dark:file:text-black';
@endphp

<!-- Modal Overlay -->
<div id="vesselModal" class="fixed inset-0 bg-black/40 inline-flex items-center justify-center z-50 hidden modal p-5">
    <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-xl w-full max-w-4xl p-6 overflow-y-auto max-h-[90vh]">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Add Vessel</h2>
        </div>

        <!-- Vessel Information -->
        <div class="space-y-4 mb-6">
            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">Vessel Information</h3>

            <input id="vesselName" type="text" placeholder="Vessel Name" class="{{ $inputClass }}">

            <textarea id="description" placeholder="Description" class="{{ $inputClass }}"></textarea>

            <div>
                <label class="block text-sm text-gray-500 dark:text-gray-400 mb-1">Vessel Thumbnail</label>
                <input id="vesselThumbnail" type="file"
                    class="{{ $fileInputClass }}"accept="image/jpeg,image/png,image/webp">
                <div id="thumbnailPreview" class="mt-2 flex gap-2 flex-wrap"></div>
            </div>
        </div>

        <!-- Specifications -->
        <div class="space-y-4 mb-6">
            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">Specifications</h3>

            <div class="grid md:grid-cols-2 gap-4">

                <input id="yearModel" type="number" placeholder="Year Model" class="{{ $inputClass }}">
                <input id="yearRenovation" type="number" placeholder="Year Renovation" class="{{ $inputClass }}">
                <input id="beam" type="text" placeholder="Beam" class="{{ $inputClass }}">
                <input id="fuelCapacity" type="text" placeholder="Fuel Capacity" class="{{ $inputClass }}">
                <input id="cabinCapacity" type="number" placeholder="Cabin Capacity" class="{{ $inputClass }}">
                <input id="bathroomNumber" type="number" placeholder="Bathroom Number" class="{{ $inputClass }}">
                <input id="topSpeed" type="number" placeholder="Top Speed (knots)" class="{{ $inputClass }}">
                <input id="cruisingSpeed" type="number" placeholder="Cruising Speed (knots)"
                    class="{{ $inputClass }}">
                <input id="engines" type="text" placeholder="Engines" class="{{ $inputClass }}">
                <input id="maxGuestCapacity" type="number" placeholder="Max Guest Capacity"
                    class="{{ $inputClass }}">
                <input id="freshwaterMaker" type="text" placeholder="Freshwater Maker" class="{{ $inputClass }}">
                <input id="tenders" type="text" placeholder="Tenders" class="{{ $inputClass }}">
                <input id="waterCapacity" type="text" placeholder="Water Capacity" class="{{ $inputClass }}">

            </div>
        </div>

        <!-- Photos Upload -->
        <div class="mb-6">
            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase mb-2">Photos</h3>

            <label
                class="flex flex-col items-center justify-center border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-6 cursor-pointer">
                <span class="text-sm text-gray-500 dark:text-gray-400">Upload multiple photos</span>
                <input id="vesselPhotos" type="file" multiple accept="image/jpeg,image/png,image/webp"
                    class="hidden">
                <div id="vesselPhotosPreview" class="mt-3 flex gap-2 flex-wrap"></div>
            </label>
        </div>

        <!-- Owner Selection -->
        <div class="mb-6">
            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase mb-2">Vessel Owner</h3>

            <select id="partnerId" class="{{ $inputClass }}">
                <option value="">Select Owner</option>
                <option value="1">Owner 1</option>
                <option value="2">Owner 2</option>
            </select>
        </div>
        <!-- Cabins Section -->
        <div class="mb-6">
            <div class="flex justify-between items-center mb-3">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">Cabins</h3>
                <button type="button" id="addNewCabinBtn"
                    class="px-4 py-2 rounded-full bg-gray-800 text-white text-sm hover:opacity-90">
                    + Add Cabin
                </button>
            </div>

            <!-- Dynamic cabin container -->
            <div id="cabinsContainer" class="space-y-6"></div>
        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-3">
            <button
                class="px-5 py-2.5 rounded-full border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 modal-close">
                Cancel
            </button>
            <button id="saveVesselBtn"
                class="px-5 py-2.5 rounded-full bg-black text-white dark:bg-white dark:text-black hover:opacity-90">
                Save Vessel
            </button>
        </div>

    </div>
</div>

<!-- Vessel Information Modal -->
<div id="vesselInfoModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">

    <div
        class="bg-white dark:bg-gray-900 w-full max-w-5xl max-h-[90vh]
                rounded-2xl shadow-lg overflow-y-auto p-6 space-y-8">

        <!-- Header -->
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
                Vessel Information
            </h2>
            <button class="modal-close text-gray-500 hover:text-gray-800">
                ✕
            </button>
        </div>

        <!-- Vessel Info -->
        <section id="vesselInfoSection" class="space-y-2"></section>

        <!-- Specification -->
        <section id="vesselSpecSection" class="space-y-2"></section>

        <!-- Photos -->
        <section>
            <div class="flex items-center justify-between mb-3">
                <h3 class="font-semibold text-gray-800 dark:text-white">
                    Photos
                </h3>

                <button id="addVesselPhotoBtn"
                    class="px-3 py-1.5 text-xs rounded-full
                   bg-blue-600 text-white hover:bg-blue-700 transition">
                    + Add Photo
                </button>
            </div>

            <div id="vesselPhotosSection" class="grid grid-cols-2 md:grid-cols-4 gap-4"></div>
        </section>

        <!-- Cabins -->
        <section>
            <div class="flex items-center justify-between mb-3">
                <h3 class="font-semibold text-gray-800 dark:text-white">
                    Cabins
                </h3>

                <button id="addCabinBtn"
                    class="px-3 py-1.5 text-xs rounded-full
                   bg-blue-600 text-white hover:bg-blue-700 transition">
                    + Add Cabin
                </button>
            </div>

            <div id="vesselCabinsSection" class="space-y-3"></div>
        </section>

    </div>
</div>
<!-- Add Vessel Photo Modal -->
<div id="addVesselPhotoModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">

    <div class="bg-white dark:bg-gray-900 w-full max-w-lg rounded-2xl p-6 space-y-5">

        <div class="flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                Add Vessel Photo
            </h3>
        </div>

        <form id="addVesselPhotoForm" class="space-y-4">
            <input type="file" id="vesselPhotoInput" name="photos[]" accept="image/*" multiple
                class="block w-full text-sm" />

            <div class="flex justify-end gap-2">
                <button type="button" class="modal-close px-4 py-2 rounded-full border">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 rounded-full bg-blue-600 text-white">
                    Add Photo
                </button>
            </div>
        </form>

    </div>
</div>


<!-- Add Cabin Modal -->
<div id="addCabinModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">

    <div class="bg-white dark:bg-gray-900 w-full max-w-xl rounded-2xl p-6 space-y-6">

        <div class="flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                Add Cabin
            </h3>
        </div>

        <form id="addCabinForm" class="space-y-4">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="cabin_name" placeholder="Cabin Name" class="input" />

                <input type="number" name="cabin_price" placeholder="Cabin Price" class="input" />

                <input type="number" name="surcharge_percentage" placeholder="Surcharge %" class="input" />

                <input type="number" name="max_guests" placeholder="Max Guests" class="input" />
            </div>

            <div>
                <label class="text-sm text-gray-600 dark:text-gray-400">
                    Cabin Photos
                </label>
                <input type="file" id="cabinPhotoInput" name="cabin_photos[]" accept="image/*" multiple
                    class="block w-full text-sm mt-1" />
            </div>

            <div class="flex justify-end gap-2">
                <button type="button" class="modal-close px-4 py-2 rounded-full border">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 rounded-full bg-blue-600 text-white">
                    Add Cabin
                </button>
            </div>

        </form>

    </div>
</div>



<script>
    (function() {
        let cachedVesselList = [];
        let activeVesselData = null;

        initializeVessels();
        initializeVesselSearch();

        async function initializeVessels() {
            console.log("initialized vesseels");
            const data = await fetchWithRetry(`/api/vessels/${authUser.id}`, {
                method: "GET",
                headers: {
                    Accept: "application/json",
                },
            });

            if (!data.success) return;

            cachedVesselList = data.vesselList;
            updateVesselList(cachedVesselList);
        }

        function updateVesselList(vesselList) {
            const container = document.getElementById('vesselListContainer');
            container.innerHTML = '';

            if (!Array.isArray(vesselList) || vesselList.length === 0) {
                container.innerHTML = `
            <div class="text-sm text-gray-500 dark:text-gray-400 text-center py-6">
                No vessels found.
            </div>
        `;
                return;
            }

            vesselList.forEach(vessel => {
                let photos = [];
                try {
                    photos = vessel.vessel_photos ? JSON.parse(vessel.vessel_photos) : [];
                } catch (e) {}

                const thumbnail =
                    vessel.vessel_thumbnail ||
                    photos[0] ||
                    '/images/sample-boat.jpg';

                const capacity =
                    vessel.specification?.vessel_cabin_capacity ??
                    vessel.specification?.vessel_max_guest_capacity ??
                    'N/A';

                const card = document.createElement('div');

                card.className = `
            vessel-row cursor-pointer
            bg-white dark:bg-gray-800
            border border-gray-200 dark:border-gray-700
            rounded-2xl p-4
            flex flex-col md:flex-row
            md:items-center md:justify-between
            gap-4
            hover:shadow-md hover:border-blue-400
            transition
        `;

                card.dataset.id = vessel.id;

                card.innerHTML = `
            <div class="flex items-center gap-4 pointer-events-none">
                <img
                    src="/${thumbnail}"
                    class="w-20 h-20 object-cover rounded-xl border dark:border-gray-600"
                />

                <div class="space-y-1">
                    <h3 class="font-semibold text-gray-800 dark:text-white">
                        ${vessel.vessel_name}
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Capacity: ${capacity} guests
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-3 justify-end">
                <button
                    data-id="${vessel.id}"
                    class="edit-vessel-btn px-4 py-2 text-sm rounded-full
                           border border-gray-300 dark:border-gray-600
                           hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    Edit
                </button>

                <button
                    data-id="${vessel.id}"
                    class="delete-vessel-btn px-4 py-2 text-sm rounded-full
                           bg-red-500 text-white hover:bg-red-600 transition">
                    Delete
                </button>
            </div>
        `;

                container.appendChild(card);
            });
        }
        document.addEventListener('click', async function(e) {
            const vesselRow = e.target.closest('.vessel-row');
            if (!vesselRow) return;

            const vesselId = vesselRow.dataset.id;
            const vesselData = getVesselFromCacheById(vesselId);

            if (!vesselData) {
                console.warn('Vessel not found in cache:', vesselId);
                return;
            }

            // EDIT BUTTON CLICK
            if (e.target.closest('.edit-vessel-btn')) {
                // handleEditVessel(vesselData);
                return;
            }

            // DELETE BUTTON CLICK
            if (e.target.closest('.delete-vessel-btn')) {

                const confirmed = await customConfirm("Deactivate this user?");
                if (!confirmed) return;

                const payload = {
                    vesselId: vesselId
                };

                const data = fetchWithRetry("/api/vessels", {
                    method: "DELETE",
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                            .content,
                    },
                    body: JSON.stringify(payload),
                });

                initializeVessels();
                if (!data.success) return;

                console.log("deleted vessel with id: " + vesselId);
                return;
            }

            // ROW CLICK (DEFAULT)
            openVesselInfoModal(vesselData);
        });

        function populateVesselInfo(vessel) {
            const el = document.getElementById('vesselInfoSection');

            el.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
            <div><strong>Name:</strong> ${vessel.vessel_name}</div>
            <div><strong>Description:</strong> ${vessel.description ?? '-'}</div>
            <div><strong>Partner ID:</strong> ${vessel.partner_id ?? '-'}</div>
            <div><strong>Created:</strong> ${vessel.created_at}</div>
        </div>
    `;
        }

        function populateVesselSpecification(spec) {
            const el = document.getElementById('vesselSpecSection');

            if (!spec) {
                el.innerHTML = `<p class="text-sm text-gray-500">No specification data.</p>`;
                return;
            }

            el.innerHTML = `
        <h3 class="font-semibold text-gray-800 dark:text-white">
            Specification
        </h3>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 text-sm">
            <div>Year Model: ${spec.vessel_year_model}</div>
            <div>Renovation: ${spec.vessel_year_renovation}</div>
            <div>Beam: ${spec.vessel_beam}</div>
            <div>Engines: ${spec.vessel_engines}</div>
            <div>Cruising Speed: ${spec.vessel_cruisingspeed}</div>
            <div>Top Speed: ${spec.vessel_topspeed}</div>
            <div>Cabin Capacity: ${spec.vessel_cabin_capacity}</div>
            <div>Bathrooms: ${spec.vessel_bathroom_number}</div>
            <div>Water Capacity: ${spec.vessel_water_capacity}</div>
            <div>Fuel Capacity: ${spec.vessel_fuel_capacity}</div>
        </div>
    `;
        }

        function populateVesselPhotos(vessel) {
            const container = document.getElementById('vesselPhotosSection');
            container.innerHTML = '';

            let photos = [];
            try {
                photos = vessel.vessel_photos ? JSON.parse(vessel.vessel_photos) : [];
            } catch (e) {}

            photos.forEach(path => {
                const card = document.createElement('div');
                card.className = `
            relative group rounded-xl overflow-hidden
            border dark:border-gray-700
        `;
                card.dataset.path = path;

                card.innerHTML = `
            <img src="/${path}"
                 class="w-full h-32 object-cover" />

            <button
                class="absolute top-2 right-2 w-8 h-8 rounded-full
                       bg-red-500 text-white text-xs
                       flex items-center justify-center
                       opacity-0 group-hover:opacity-100 transition
                       delete-photo-btn"
                data-path="${path}">
                ✕
            </button>
        `;

                container.appendChild(card);
            });
        }

        document.addEventListener('click', function(e) {
            const btn = e.target.closest('.delete-photo-btn');
            if (!btn) return;

            const path = btn.dataset.path;
            console.log('Delete photo:', path);
        });

        function populateVesselCabins(cabins) {
            const container = document.getElementById('vesselCabinsSection');
            container.innerHTML = '';

            if (cabins.length === 0) {
                container.innerHTML = `
            <p class="text-sm text-gray-500">
                No cabins available.
            </p>
        `;
                return;
            }

            cabins.forEach(cabin => {
                const card = document.createElement('div');
                card.className = `
            cabin-row cursor-pointer
            bg-gray-50 dark:bg-gray-800
            border border-gray-200 dark:border-gray-700
            rounded-xl p-4
            flex justify-between items-center
            hover:shadow transition
        `;
                card.dataset.id = cabin.id;

                card.innerHTML = `
            <div class="space-y-1 text-sm">
                <div><strong>Cabin ID:</strong> ${cabin.id}</div>
                <div><strong>Price:</strong> ${cabin.cabin_price}</div>
            </div>

            <div class="text-xs text-gray-500">
                Surcharge: ${cabin.surcharge_percentage}%
            </div>
        `;

                container.appendChild(card);
            });
        }

        document.addEventListener('click', function(e) {
            const row = e.target.closest('.cabin-row');
            if (!row) return;

            console.log('Clicked cabin ID:', row.dataset.id);
        });



        function openVesselInfoModal(vesselData) {

            modalCabinsCache = vesselData.cabins ?? [];

            populateVesselInfo(vesselData);
            populateVesselSpecification(vesselData.specification);
            populateVesselPhotos(vesselData);
            populateVesselCabins(modalCabinsCache);

            document.getElementById('addVesselPhotoBtn')
                .addEventListener('click', function() {
                    if (!vesselData) return;
                    openAddVesselPhotoModal(vesselData.id);
                });

            document.getElementById('addCabinBtn')
                .addEventListener('click', function() {
                    console.log("Vessel not Data Available");
                    if (!vesselData) return;
                    openAddCabinModal(vesselData.id);
                });
            initModal({
                modalId: "vesselInfoModal"
            });
        }

        function getVesselFromCacheById(vesselId) {
            return cachedVesselList.find(vessel => Number(vessel.id) === Number(vesselId)) || null;
        }

        function initializeVesselSearch() {
            const input = document.getElementById('vesselSearchInput');

            input.addEventListener('input', function() {
                const keyword = this.value.toLowerCase().trim();

                const filtered = cachedVesselList.filter(vessel =>
                    vessel.vessel_name.toLowerCase().includes(keyword)
                );

                updateVesselList(filtered);
            });
        }


        function openAddVesselPhotoModal(vesselId) {
            document.getElementById('addVesselPhotoForm').dataset.vesselId = vesselId;

            initModal({
                modalId: "addVesselPhotoModal"
            });
        }

        document.getElementById('addVesselPhotoForm')
            .addEventListener('submit', function(e) {
                e.preventDefault();

                const vesselId = this.dataset.vesselId;
                const files = document.getElementById('vesselPhotoInput').files;

                const formData = new FormData();
                formData.append('vessel_id', vesselId);

                Array.from(files).forEach(file => {
                    formData.append('photos[]', file);
                });

                console.log('ADD VESSEL PHOTO FORM DATA');
                for (let pair of formData.entries()) {
                    console.log(pair[0], pair[1]);
                }
            });

        function openAddCabinModal(vesselId) {
            document.getElementById('addCabinForm').dataset.vesselId = vesselId;

            initModal({
                modalId: "addCabinModal"
            });
        }

        document.getElementById('addCabinForm')
            .addEventListener('submit', function(e) {
                e.preventDefault();

                const vesselId = this.dataset.vesselId;
                const formData = new FormData(this);
                const files = document.getElementById('cabinPhotoInput').files;

                formData.append('vessel_id', vesselId);

                Array.from(files).forEach(file => {
                    formData.append('cabin_photos[]', file);
                });

                console.log('ADD CABIN FORM DATA');
                for (let pair of formData.entries()) {
                    console.log(pair[0], pair[1]);
                }
            });

        function openAddCabinModal(vesselId) {
            document.getElementById('addCabinForm').dataset.vesselId = vesselId;

            initModal({
                modalId: "addCabinModal"
            });
        }

        document.getElementById('addCabinForm')
            .addEventListener('submit', function(e) {
                e.preventDefault();

                const vesselId = this.dataset.vesselId;
                const formData = new FormData(this);
                const files = document.getElementById('cabinPhotoInput').files;

                formData.append('vessel_id', vesselId);

                Array.from(files).forEach(file => {
                    formData.append('cabin_photos[]', file);
                });

                console.log('ADD CABIN FORM DATA');
                for (let pair of formData.entries()) {
                    console.log(pair[0], pair[1]);
                }
            });

        const addBtn = document.getElementById("openVesselModal");
        const closeIconBtn = document.getElementById("closeVesselModal");
        const cancelBtn = document.getElementById("closeVesselModalBtn");
        const saveBtn = document.getElementById("saveVesselBtn");
        const editBtn = document.getElementById("editVesselBtn");
        const deleteBtn = document.getElementById("deleteVesselBtn");

        if (addBtn) {
            addBtn.addEventListener("click", () => {
                initModal({
                    modalId: "vesselModal"
                });
                console.log("Add New Vessel button clicked");
                document.getElementById("vesselModal").classList.remove("hidden");
            });
        }

        if (closeIconBtn) {
            closeIconBtn.addEventListener("click", () => {
                console.log("Modal close icon clicked");
                document.getElementById("vesselModal").classList.add("hidden");
            });
        }

        if (cancelBtn) {
            cancelBtn.addEventListener("click", () => {
                console.log("Cancel vessel button clicked");
                document.getElementById("vesselModal").classList.add("hidden");
            });
        }

        if (saveBtn) {
            /* =========================
               SAVE VESSEL + CABINS
            ========================= */
            saveVesselBtn.addEventListener("click", async function() {

                const btn = this;
                btn.disabled = true;
                btn.innerText = "Saving...";

                try {
                    const formData = new FormData();

                    /* ================= VESSEL PAYLOAD ================= */
                    const vessel_payload = {
                        vessel_name: document.getElementById('vesselName').value,
                        description: document.getElementById('description').value,
                        year_model: document.getElementById('yearModel').value,
                        year_renovation: document.getElementById('yearRenovation').value,
                        beam: document.getElementById('beam').value,
                        fuel_capacity: document.getElementById('fuelCapacity').value,
                        cabin_capacity: document.getElementById('cabinCapacity').value,
                        bathroom_number: document.getElementById('bathroomNumber').value,
                        top_speed: document.getElementById('topSpeed').value,
                        cruising_speed: document.getElementById('cruisingSpeed').value,
                        engines: document.getElementById('engines').value,
                        partner_id: document.getElementById('partnerId').value,
                        max_guest_capacity: document.getElementById('maxGuestCapacity')
                            .valu,
                        freshwater_maker: document.getElementById('freshwaterMaker')
                            .value,
                        tenders: document.getElementById('tenders').value,
                        water_capacity: document.getElementById('waterCapacity').value,
                    };


                    formData.append("vessel_payload", JSON.stringify(vessel_payload));

                    /* Thumbnail */
                    if (vesselThumbnail.files.length > 0) {
                        formData.append('thumbnail', vesselThumbnail.files[0]);
                    }

                    /* Vessel Photos */
                    for (let i = 0; i < vesselPhotos.files.length; i++) {
                        formData.append('photos[]', vesselPhotos.files[i]);
                    }

                    /* ================= CABIN PAYLOAD ================= */
                    const cabin_payload = [];
                    const cabinBlocks = document.querySelectorAll(".cabin-block");

                    cabinBlocks.forEach((block, index) => {
                        const cabin = {
                            name: block.querySelector(".cabin-name").value,
                            description: block.querySelector(".cabin-desc").value,
                            beds: block.querySelector(".cabin-beds").value,
                            guest_capacity: block.querySelector(".cabin-guest").value,
                            quantity: block.querySelector(".cabin-qty").value,
                            price: block.querySelector(".cabin-price").value,
                            surcharge: block.querySelector(".cabin-surcharge").value,
                        };

                        cabin_payload.push(cabin);

                        const imageInput = block.querySelector(".cabin-image");
                        if (imageInput.files.length > 0) {
                            formData.append(`cabin_images[${index}]`, imageInput.files[0]);
                        }
                    });

                    formData.append("cabin_payload", JSON.stringify(cabin_payload));

                    /* ================= FINAL SUBMIT ================= */
                    const response = await fetchWithRetry("/api/vessels", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                                .content,
                        },
                        body: formData,
                    });
                    console.log(response);
                    if (!response.success) return;

                    initializeVessels();
                    vesselModal.classList.add("hidden");

                } catch (error) {
                    console.error(error);
                    alert("Error saving vessel");
                } finally {

                    btn.disabled = false;
                    btn.innerText = "Save Vessel";
                }

            });

        }



        if (editBtn) {
            editBtn.addEventListener("click", () => {
                console.log("Edit vessel button clicked");
            });
        }

        if (deleteBtn) {
            deleteBtn.addEventListener("click", () => {

                const confirmed = customConfirm("Deactivate this user?");
                if (!confirmed) return;
                console.log("Delete vessel button clicked");
            });
        }

        const cabinsContainer = document.getElementById("cabinsContainer");
        const addCabinBtn = document.getElementById("addNewCabinBtn");
        let cabinIndex = 0;

        /* =========================
           ADD CABIN UI
        ========================= */
        addCabinBtn.addEventListener("click", () => {
            const cabinHTML = `
    <div class="border border-gray-300 dark:border-gray-700 rounded-xl p-4 relative cabin-block">
        <button type="button" class="absolute top-2 right-2 text-red-500 remove-cabin">✕</button>

        <div class="mb-3">
            <label class="block text-sm text-gray-500 dark:text-gray-400 mb-1">Cabin Image</label>
            <input class="cabin-image {{ $fileInputClass }}"
       type="file"
       multiple
       accept="image/jpeg,image/png,image/webp">
    <div class="cabin-preview mt-2 flex gap-2 flex-wrap"></div>
        </div>

        <div class="grid md:grid-cols-2 gap-4">
            <input type="text" placeholder="Cabin Name" class="cabin-name {{ $inputClass }}">
            <input type="number" placeholder="Number of Beds" class="cabin-beds {{ $inputClass }}">
            <input type="number" placeholder="Guest Capacity" class="cabin-guest {{ $inputClass }}">
            <input type="number" placeholder="Cabin Quantity" class="cabin-qty {{ $inputClass }}">
            <input type="number" placeholder="Cabin Price" class="cabin-price {{ $inputClass }}">
            <input type="number" placeholder="Surcharge" class="cabin-surcharge {{ $inputClass }}">
        </div>

        <textarea placeholder="Cabin Description" class="cabin-desc {{ $inputClass }} mt-3"></textarea>
    </div>
    `;

            cabinsContainer.insertAdjacentHTML("beforeend", cabinHTML);
            cabinIndex++;
        });

        /* Remove cabin */
        document.addEventListener("click", (e) => {
            if (e.target.classList.contains("remove-cabin")) {
                e.target.closest(".cabin-block").remove();
            }
        });

        function createPreview(file, container) {
            const reader = new FileReader();

            reader.onload = e => {
                const img = document.createElement("img");
                img.src = e.target.result;
                img.className = "w-20 h-20 object-cover rounded-lg border";
                container.appendChild(img);
            };

            reader.readAsDataURL(file);
        }

        /* ================= THUMBNAIL PREVIEW ================= */
        vesselThumbnail.addEventListener("change", function() {
            const preview = document.getElementById("thumbnailPreview");
            preview.innerHTML = "";
            if (this.files[0]) createPreview(this.files[0], preview);
        });

        /* ================= VESSEL PHOTOS PREVIEW ================= */
        vesselPhotos.addEventListener("change", function() {
            const preview = document.getElementById("vesselPhotosPreview");
            preview.innerHTML = "";
            Array.from(this.files).forEach(file => createPreview(file, preview));
        });

        /* ================= CABIN IMAGES PREVIEW ================= */
        document.addEventListener("change", function(e) {
            if (e.target.classList.contains("cabin-image")) {
                const preview = e.target.closest(".cabin-block").querySelector(".cabin-preview");
                preview.innerHTML = "";
                Array.from(e.target.files).forEach(file => createPreview(file, preview));
            }
        });

    })();
</script>
