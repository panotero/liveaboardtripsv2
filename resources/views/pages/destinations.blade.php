<div class="p-4 md:p-8 bg-gray-50 dark:bg-gray-900 min-h-screen ">

    <div class="h-full container mx-auto py-5 ">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">
            </h1>

            <button id="addDestinationBtn" class="px-4 py-2 rounded-xl bg-blue-600 text-white text-sm hover:bg-blue-700">
                + Add Destination
            </button>
        </div>

        <div class="mb-4">
            <input type="text" id="destinationSearchInput" placeholder="Search destinations..."
                class="w-full md:w-80 px-4 py-2 rounded-xl
               border border-gray-300 dark:border-gray-600
               bg-white dark:bg-gray-800
               text-sm text-gray-800 dark:text-white
               focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <!-- Destination Cards -->
        <div id="destinationListContainer" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        </div>

    </div>
</div>

<div id="destinationModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">

    <div class="bg-white dark:bg-gray-900 w-full max-w-md
               rounded-2xl shadow-lg p-6 space-y-5">

        <!-- Header -->
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                Add Destination
            </h2>
        </div>

        <!-- Form -->
        <form id="addDestinationForm" class="space-y-4">

            <div>
                <label class="text-sm text-gray-600 dark:text-gray-300">
                    Destination Name
                </label>
                <input type="text" name="destination_name"
                    class="w-full px-3 py-2 rounded-xl border
                           border-gray-300 dark:border-gray-600
                           bg-white dark:bg-gray-800
                           text-sm text-gray-800 dark:text-white">
            </div>

            <div>
                <label class="text-sm text-gray-600 dark:text-gray-300">
                    Country
                </label>
                <input type="text" name="country"
                    class="w-full px-3 py-2 rounded-xl border
                           border-gray-300 dark:border-gray-600
                           bg-white dark:bg-gray-800
                           text-sm text-gray-800 dark:text-white">
            </div>

            <div>
                <label class="text-sm text-gray-600 dark:text-gray-300">
                    City / Province
                </label>
                <input type="text" name="city"
                    class="w-full px-3 py-2 rounded-xl border
                           border-gray-300 dark:border-gray-600
                           bg-white dark:bg-gray-800
                           text-sm text-gray-800 dark:text-white">
            </div>
            <!-- Destination Photos -->
            <div>
                <label class="text-sm text-gray-600 dark:text-gray-300">
                    Destination Photos
                </label>

                <input type="file" id="destinationPhotosInput" name="photos[]" multiple accept="image/*"
                    class="w-full text-sm mt-1
               file:mr-4 file:py-2 file:px-4
               file:rounded-xl file:border-0
               file:bg-blue-600 file:text-white
               hover:file:bg-blue-700" />

                <!-- Preview Container -->
                <div id="destinationPhotoPreview" class="mt-3 grid grid-cols-3 gap-3">
                </div>
            </div>
            <!-- Operator -->
            <div>
                <label class="text-sm text-gray-600 dark:text-gray-300">
                    Operator
                </label>

                <select name="operator_id" id="operatorSelect"
                    class="w-full mt-1 px-4 py-2 rounded-xl
               border border-gray-300 dark:border-gray-600
               bg-white dark:bg-gray-800
               text-sm text-gray-800 dark:text-white
               focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <option value="">Select Operator</option>
                    <option value="1">Operator 1</option>
                    <option value="2">Operator 2</option>
                    <option value="3">Operator 3</option>
                    <option value="4">Operator 4</option>
                    <option value="5">Operator 5</option>
                </select>
            </div>

            <div class="flex justify-end gap-2 pt-2">
                <button type="button" class="modal-close px-4 py-2 rounded-xl border text-sm">
                    Cancel
                </button>

                <button type="submit" class="px-4 py-2 rounded-xl bg-blue-600 text-white text-sm">
                    Save
                </button>
            </div>

        </form>
    </div>
</div>
<!-- Destination Info Modal -->
<div id="destinationInfoModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">

    <div
        class="bg-white dark:bg-gray-900 w-full max-w-4xl
               rounded-2xl shadow-lg overflow-y-auto
               p-6 space-y-8 max-h-[90vh]">

        <!-- Header -->
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
                Destination Information
            </h2>
            <button class="modal-close text-gray-500 hover:text-gray-800">
                ✕
            </button>
        </div>

        <!-- Info -->
        <section id="destinationInfoSection" class="space-y-1"></section>

        <!-- Photos -->
        <section>
            <h3 class="font-semibold text-gray-800 dark:text-white mb-3">
                Photos
            </h3>

            <div id="destinationPhotosSection" class="grid grid-cols-2 md:grid-cols-4 gap-4">
            </div>
        </section>

    </div>
</div>


<script>
    (function() {

        let cachedDestinationList = [{
                id: 1,
                name: 'El Nido',
                country: 'Philippines',
                city: 'Palawan',
                photos: [
                    'images/sample1.jpg',
                    'images/sample2.jpg',
                    'images/sample3.jpg'
                ]
            },
            {
                id: 2,
                name: 'Coron',
                country: 'Philippines',
                city: 'Palawan',
                photos: [
                    'images/sample4.jpg',
                    'images/sample5.jpg'
                ]
            },
            {
                id: 3,
                name: 'Maldives',
                country: 'Maldives',
                city: 'North Malé Atoll',
                photos: []
            },
            {
                id: 4,
                name: 'Bali',
                country: 'Indonesia',
                city: 'Denpasar',
                photos: []
            },
            {
                id: 5,
                name: 'Sipadan',
                country: 'Malaysia',
                city: 'Sabah',
                photos: []
            }
        ];



        function initializeDestinationSearch() {
            const input = document.getElementById('destinationSearchInput');

            input.addEventListener('input', function() {
                const keyword = this.value.toLowerCase().trim();

                const filtered = cachedDestinationList.filter(dest =>
                    dest.name.toLowerCase().includes(keyword) ||
                    dest.country.toLowerCase().includes(keyword) ||
                    dest.city.toLowerCase().includes(keyword)
                );

                updateDestinationList(filtered);
            });
        }


        document.getElementById('addDestinationBtn')
            .addEventListener('click', function() {
                initModal({
                    modalId: "destinationModal"
                });
            });

        function initializeDestinationPhotoPreview() {
            const input = document.getElementById('destinationPhotosInput');
            const previewContainer = document.getElementById('destinationPhotoPreview');

            if (!input || !previewContainer) return;

            input.addEventListener('change', function() {
                previewContainer.innerHTML = '';

                Array.from(this.files).forEach(file => {
                    if (!file.type.startsWith('image/')) return;

                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const wrapper = document.createElement('div');
                        wrapper.className =
                            'relative rounded-xl overflow-hidden border';

                        wrapper.innerHTML = `
                        <img
                            src="${e.target.result}"
                            class="w-full h-24 object-cover" />
                    `;

                        previewContainer.appendChild(wrapper);
                    };

                    reader.readAsDataURL(file);
                });
            });
        }
        updateDestinationList(cachedDestinationList);
        initializeDestinationSearch();
        initializeDestinationPhotoPreview();



        document.getElementById('addDestinationForm')
            .addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);

                console.log('Destination FormData:');
                for (let [key, value] of formData.entries()) {
                    console.log(key, value);
                }
            });







        function updateDestinationList(destinations) {
            const container = document.getElementById('destinationListContainer');
            container.innerHTML = '';

            destinations.forEach(dest => {
                const card = document.createElement('div');
                card.className = `
            destination-card relative cursor-pointer
            bg-white dark:bg-gray-800
            border border-gray-200 dark:border-gray-700
            rounded-2xl overflow-hidden
            hover:shadow-md transition
        `;
                card.dataset.id = dest.id;

                card.innerHTML = `
            <!-- Delete Button -->
            <button
                class="delete-destination-btn absolute top-3 right-3
                       w-8 h-8 rounded-full
                       bg-red-600 text-white
                       flex items-center justify-center
                       hover:bg-red-700 z-20">
                ✕
            </button>

            <img
                src="${dest.photos[0] || '/images/placeholder.jpg'}"
                class="w-full h-40 object-cover" />

            <div class="p-4 space-y-1">
                <h3 class="font-semibold text-gray-800 dark:text-white">
                    ${dest.name}
                </h3>
                <p class="text-sm text-gray-500">
                    ${dest.city}, ${dest.country}
                </p>
            </div>
        `;

                container.appendChild(card);
            });
        }

        function getDestinationFromCacheById(id) {
            return cachedDestinationList.find(d => d.id == id);
        }

        document.addEventListener('DOMContentLoaded', () => {
            updateDestinationList(cachedDestinationList);
        });

        function openDestinationInfoModal(destination) {
            document.getElementById('destinationInfoSection').innerHTML = `
            <p><strong>Name:</strong> ${destination.name}</p>
            <p><strong>Country:</strong> ${destination.country}</p>
            <p><strong>City:</strong> ${destination.city}</p>
        `;

            const photosContainer =
                document.getElementById('destinationPhotosSection');
            photosContainer.innerHTML = '';

            destination.photos.forEach(photo => {
                const card = document.createElement('div');
                card.className =
                    'relative rounded-xl overflow-hidden border';

                card.innerHTML = `
                <img src="${photo}"
                     class="w-full h-32 object-cover" />

                <button
                    class="absolute top-2 right-2
                           w-8 h-8 rounded-full
                           bg-red-600 text-white
                           flex items-center justify-center
                           hover:bg-red-700"
                    data-photo="${photo}">
                    ✕
                </button>
            `;

                photosContainer.appendChild(card);
            });

            initModal({
                modalId: 'destinationInfoModal'
            });
        }

        document.addEventListener('click', async function(e) {
            const card = e.target.closest('.destination-card');
            if (!card) return;

            const destinationId = card.dataset.id;

            // DELETE BUTTON
            if (e.target.closest('.delete-destination-btn')) {
                const confirmed = await customConfirm('Delete this destination?');
                if (!confirmed) return;

                console.log('Delete destination with id:', destinationId);
                return;
            }

            // CARD CLICK → OPEN MODAL
            const destinationData = getDestinationFromCacheById(destinationId);

            if (!destinationData) {
                console.warn('Destination not found:', destinationId);
                return;
            }

            openDestinationInfoModal(destinationData);
        });

        document.addEventListener('click', async function(e) {

            const deleteBtn = e.target.closest('[data-photo]');
            if (!deleteBtn) return;

            const confirmed = await customConfirm("Delete this destination photo?");
            if (!confirmed) return;
            const photoDir = deleteBtn.dataset.photo;
            console.log('Delete destination photo:', photoDir);
        });
    })();
</script>
