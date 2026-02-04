<div class="p-4 md:p-8 bg-gray-50 dark:bg-gray-900 min-h-screen">

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
    <div class="space-y-4">

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
                <button type="button" id="addCabinBtn"
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




<script>
    (function() {
        console.log(authUser);
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

                    const result = await response.json();
                    if (!response.ok) throw result;

                    alert("Vessel saved successfully!");
                    vesselModal.classList.add("hidden");

                } catch (error) {
                    console.error(error);
                    alert("Error saving vessel");
                }

                btn.disabled = false;
                btn.innerText = "Save Vessel";
            });

        }



        if (editBtn) {
            editBtn.addEventListener("click", () => {
                console.log("Edit vessel button clicked");
            });
        }

        if (deleteBtn) {
            deleteBtn.addEventListener("click", () => {
                console.log("Delete vessel button clicked");
            });
        }

        const cabinsContainer = document.getElementById("cabinsContainer");
        const addCabinBtn = document.getElementById("addCabinBtn");
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
