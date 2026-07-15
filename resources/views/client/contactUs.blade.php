<!DOCTYPE html>
<html lang="en">

<x-head>
    Contact Us!
</x-head>

<body class="bg-sky-50 text-gray-800">
    <x-navbar />

    <main class="max-w-7xl mx-auto px-4 py-8 pt-28">
    </main>

    <x-footer />

    {{-- ===================== JAVASCRIPT ===================== --}}
    <script>
        (function() {
            'use strict';

            // ── Helpers ────────────────────────────────────────────
            const $ = (id) => document.getElementById(id);

            // ── Modal open/close ────────────────────────────────────
            const modal = $('sc-modal');
            const openBtn = $('btn-open-modal');
            const closeBtn = $('btn-close-modal');
            const cancelBtn = $('btn-cancel-modal');

            function openModal() {
                modal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
                console.log('[SC Module] Modal opened — New Shipper/Consignee form');
            }

            function closeModal() {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
                console.log('[SC Module] Modal closed');
            }

            openBtn.addEventListener('click', openModal);
            closeBtn.addEventListener('click', closeModal);
            cancelBtn.addEventListener('click', closeModal);

            // Close when clicking backdrop
            modal.addEventListener('click', function(e) {
                if (e.target === modal) closeModal();
            });

            // ── Payment Mode — On-Account conditional fields ────────
            const paymentSelect = $('payment-mode-select');
            const onAccountFields = $('on-account-fields');

            paymentSelect.addEventListener('change', function() {
                if (this.value === 'on-account') {
                    onAccountFields.classList.remove('hidden');
                    console.log('[SC Module] Payment mode: On-Account — credit fields shown');
                } else {
                    onAccountFields.classList.add('hidden');
                    console.log('[SC Module] Payment mode changed to:', this.value);
                }
            });

            // ── Checkbox conditional fields ─────────────────────────
            const checkboxFieldMap = {
                'chk-email': 'field-invoice-email',
                'chk-courier': 'field-invoice-courier',
                'chk-check-pickup': 'field-check-pickup',
                'chk-bank': 'field-bank',
            };

            Object.entries(checkboxFieldMap).forEach(([chkId, fieldId]) => {
                const chk = $(chkId);
                const field = $(fieldId);
                chk.addEventListener('change', function() {
                    field.classList.toggle('hidden', !this.checked);
                    console.log(`[SC Module] Checkbox "${chkId}" toggled:`, this.checked);
                });
            });

            // ── Add Contact Row ─────────────────────────────────────
            let contactIndex = 1;
            const contactRows = $('contact-rows');

            $('btn-add-contact-row').addEventListener('click', function() {
                const i = contactIndex++;
                const row = document.createElement('div');
                row.className = 'grid grid-cols-5 gap-2 contact-row';
                row.innerHTML = `
            <input type="text"  name="contacts[${i}][name]"     placeholder="Full Name"    class="border border-blue-100 rounded-xl px-3 py-2 text-sm text-blue-900 placeholder-blue-200 bg-slate-50 focus:outline-none focus:ring-2 focus:ring-orange-300 transition col-span-1"/>
            <input type="text"  name="contacts[${i}][number]"   placeholder="+63..."       class="border border-blue-100 rounded-xl px-3 py-2 text-sm text-blue-900 placeholder-blue-200 bg-slate-50 focus:outline-none focus:ring-2 focus:ring-orange-300 transition col-span-1"/>
            <input type="email" name="contacts[${i}][email]"    placeholder="email@co.com" class="border border-blue-100 rounded-xl px-3 py-2 text-sm text-blue-900 placeholder-blue-200 bg-slate-50 focus:outline-none focus:ring-2 focus:ring-orange-300 transition col-span-1"/>
            <input type="text"  name="contacts[${i}][role]"     placeholder="Role"         class="border border-blue-100 rounded-xl px-3 py-2 text-sm text-blue-900 placeholder-blue-200 bg-slate-50 focus:outline-none focus:ring-2 focus:ring-orange-300 transition col-span-1"/>
            <div class="flex gap-1 col-span-1">
                <input type="text" name="contacts[${i}][position]" placeholder="Position" class="flex-1 border border-blue-100 rounded-xl px-3 py-2 text-sm text-blue-900 placeholder-blue-200 bg-slate-50 focus:outline-none focus:ring-2 focus:ring-orange-300 transition"/>
                <button type="button" class="btn-remove-contact p-2 text-red-300 hover:text-red-500 hover:bg-red-50 rounded-lg transition" title="Remove">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        `;
                row.querySelector('.btn-remove-contact').addEventListener('click', function() {
                    row.remove();
                    console.log('[SC Module] Contact row removed, index:', i);
                });
                contactRows.appendChild(row);
                console.log('[SC Module] Contact row added, index:', i);
            });

            // ── Add Consignee Card ──────────────────────────────────
            let consigneeIndex = 0;
            const container = $('consignee-container');
            const emptyState = $('consignee-empty-state');

            function buildConsigneeCard(idx) {
                const card = document.createElement('div');
                card.className = 'consignee-card bg-blue-50 border border-blue-100 rounded-2xl overflow-hidden';
                card.dataset.idx = idx;

                card.innerHTML = `
            <!-- Card Header -->
            <div class="flex items-center justify-between px-5 py-3 bg-blue-100/60 border-b border-blue-100">
                <div class="flex items-center gap-2">
                    <span class="w-6 h-6 rounded-full bg-orange-400 text-white text-xs font-bold flex items-center justify-center consignee-num">${idx + 1}</span>
                    <span class="text-sm font-semibold text-blue-800">Consignee ${idx + 1}</span>
                </div>
                <button type="button" class="btn-remove-consignee p-1.5 text-blue-300 hover:text-red-500 hover:bg-red-50 rounded-lg transition" title="Remove Consignee">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                </button>
            </div>

            <!-- Card Body -->
            <div class="px-5 py-4 space-y-4">

                <!-- Company Info -->
                <div>
                    <p class="text-xs font-bold text-orange-400 uppercase tracking-wider mb-3">Company Information</p>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-xs font-semibold text-blue-500 mb-1">Company Name <span class="text-orange-400">*</span></label>
                            <input type="text" name="consignees[${idx}][company_name]" placeholder="Consignee company name"
                                class="w-full border border-blue-100 rounded-xl px-4 py-2 text-sm text-blue-900 placeholder-blue-200 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition"/>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-blue-500 mb-1">Registered Address</label>
                            <textarea name="consignees[${idx}][company_address]" rows="2" placeholder="Full registered address"
                                class="w-full border border-blue-100 rounded-xl px-4 py-2 text-sm text-blue-900 placeholder-blue-200 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition resize-none"></textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-blue-500 mb-1">Contact No. 1</label>
                                <input type="text" name="consignees[${idx}][contact_1]" placeholder="+63..."
                                    class="w-full border border-blue-100 rounded-xl px-4 py-2 text-sm text-blue-900 placeholder-blue-200 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition"/>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-blue-500 mb-1">Contact No. 2</label>
                                <input type="text" name="consignees[${idx}][contact_2]" placeholder="+63..."
                                    class="w-full border border-blue-100 rounded-xl px-4 py-2 text-sm text-blue-900 placeholder-blue-200 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition"/>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-blue-500 mb-1">Industry</label>
                                <select name="consignees[${idx}][industry]" class="w-full border border-blue-100 rounded-xl px-4 py-2 text-sm text-blue-900 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition">
                                    <option value="">Select Industry</option>
                                    <option>Logistics</option><option>Retail</option><option>Manufacturing</option>
                                    <option>Agriculture</option><option>Food & Beverage</option><option>Construction</option>
                                    <option>Healthcare</option><option>Technology</option><option>Others</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-blue-500 mb-1">Type of Organization</label>
                                <select name="consignees[${idx}][type_of_org]" class="w-full border border-blue-100 rounded-xl px-4 py-2 text-sm text-blue-900 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition">
                                    <option value="">Select Type</option>
                                    <option>Sole Proprietorship</option><option>Partnership</option><option>Corporation</option>
                                    <option>Cooperative</option><option>Government Agency</option><option>NGO / Non-Profit</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-blue-500 mb-1">TIN</label>
                                <input type="text" name="consignees[${idx}][tin]" placeholder="XXX-XXX-XXX-000"
                                    class="w-full border border-blue-100 rounded-xl px-4 py-2 text-sm text-blue-900 placeholder-blue-200 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition"/>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-blue-500 mb-1">Start of Business</label>
                                <input type="date" name="consignees[${idx}][start_of_business]"
                                    class="w-full border border-blue-100 rounded-xl px-4 py-2 text-sm text-blue-900 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition"/>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-blue-500 mb-1">Employees</label>
                                <input type="text" name="consignees[${idx}][num_employees]" placeholder="e.g. 50"
                                    class="w-full border border-blue-100 rounded-xl px-4 py-2 text-sm text-blue-900 placeholder-blue-200 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition"/>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-blue-500 mb-1">Est. Revenue</label>
                                <input type="number" name="consignees[${idx}][annual_revenue]" placeholder="0.00"
                                    class="w-full border border-blue-100 rounded-xl px-4 py-2 text-sm text-blue-900 placeholder-blue-200 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition"/>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-blue-500 mb-1">Est. Net Income</label>
                                <input type="number" name="consignees[${idx}][annual_net_income]" placeholder="0.00"
                                    class="w-full border border-blue-100 rounded-xl px-4 py-2 text-sm text-blue-900 placeholder-blue-200 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition"/>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-blue-500 mb-1">Customer Type</label>
                                <select name="consignees[${idx}][customer_type]" class="w-full border border-blue-100 rounded-xl px-4 py-2 text-sm text-blue-900 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition">
                                    <option value="">Select</option>
                                    <option>Shipper</option><option>Consignee</option><option>Both</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-blue-500 mb-1">Company URL</label>
                                <input type="url" name="consignees[${idx}][company_url]" placeholder="https://..."
                                    class="w-full border border-blue-100 rounded-xl px-4 py-2 text-sm text-blue-900 placeholder-blue-200 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition"/>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Finance -->
                <div>
                    <p class="text-xs font-bold text-orange-400 uppercase tracking-wider mb-3">Finance</p>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-xs font-semibold text-blue-500 mb-1">Payment Mode</label>
                            <select name="consignees[${idx}][payment_mode]" class="c-payment-mode w-full border border-blue-100 rounded-xl px-4 py-2 text-sm text-blue-900 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition">
                                <option value="">Select</option>
                                <option value="on-account">On-Account</option>
                                <option value="prepaid">Prepaid</option>
                                <option value="cod">Cash on Delivery</option>
                            </select>
                        </div>
                        <div class="c-on-account-fields hidden space-y-3 bg-white rounded-xl p-3 border border-blue-100">
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-semibold text-blue-500 mb-1">Credit Limit</label>
                                    <input type="number" name="consignees[${idx}][credit_limit]" placeholder="0.00"
                                        class="w-full border border-blue-100 rounded-xl px-4 py-2 text-sm text-blue-900 placeholder-blue-200 bg-slate-50 focus:outline-none focus:ring-2 focus:ring-orange-300 transition"/>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-blue-500 mb-1">Current Credit</label>
                                    <input type="number" name="consignees[${idx}][current_credit]" placeholder="0.00"
                                        class="w-full border border-blue-100 rounded-xl px-4 py-2 text-sm text-blue-900 placeholder-blue-200 bg-slate-50 focus:outline-none focus:ring-2 focus:ring-orange-300 transition"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div>
                    <p class="text-xs font-bold text-orange-400 uppercase tracking-wider mb-3">Contact Info</p>
                    <div class="grid grid-cols-5 gap-2 text-xs font-semibold text-blue-400 uppercase tracking-wider px-1 mb-2">
                        <span>Name</span><span>Contact</span><span>Email</span><span>Role</span><span>Position</span>
                    </div>
                    <div class="c-contact-rows space-y-2">
                        <div class="grid grid-cols-5 gap-2">
                            <input type="text"  name="consignees[${idx}][contacts][0][name]"     placeholder="Full Name"    class="border border-blue-100 rounded-xl px-3 py-2 text-sm text-blue-900 placeholder-blue-200 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition col-span-1"/>
                            <input type="text"  name="consignees[${idx}][contacts][0][number]"   placeholder="+63..."       class="border border-blue-100 rounded-xl px-3 py-2 text-sm text-blue-900 placeholder-blue-200 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition col-span-1"/>
                            <input type="email" name="consignees[${idx}][contacts][0][email]"    placeholder="email@co.com" class="border border-blue-100 rounded-xl px-3 py-2 text-sm text-blue-900 placeholder-blue-200 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition col-span-1"/>
                            <input type="text"  name="consignees[${idx}][contacts][0][role]"     placeholder="Role"         class="border border-blue-100 rounded-xl px-3 py-2 text-sm text-blue-900 placeholder-blue-200 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition col-span-1"/>
                            <input type="text"  name="consignees[${idx}][contacts][0][position]" placeholder="Position"     class="border border-blue-100 rounded-xl px-3 py-2 text-sm text-blue-900 placeholder-blue-200 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition col-span-1"/>
                        </div>
                    </div>
                    <button type="button" class="btn-add-c-contact flex items-center gap-1.5 text-xs text-blue-400 hover:text-blue-600 hover:bg-blue-100 px-3 py-1.5 rounded-lg transition mt-2">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                        Add Contact
                    </button>
                </div>

                <!-- Sales Info -->
                <div>
                    <label class="block text-xs font-semibold text-blue-500 mb-1">Account Owner / Sales Rep</label>
                    <input type="text" name="consignees[${idx}][sales_rep]" placeholder="Sales rep name"
                        class="w-full border border-blue-100 rounded-xl px-4 py-2 text-sm text-blue-900 placeholder-blue-200 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition"/>
                </div>
            </div>
        `;

                // Consignee payment mode toggle
                const cPaySelect = card.querySelector('.c-payment-mode');
                const cOnAccountFields = card.querySelector('.c-on-account-fields');
                cPaySelect.addEventListener('change', function() {
                    cOnAccountFields.classList.toggle('hidden', this.value !== 'on-account');
                    console.log(`[SC Module] Consignee ${idx + 1} payment mode:`, this.value);
                });

                // Consignee add contact row
                let cContactIndex = 1;
                const cContactRows = card.querySelector('.c-contact-rows');
                card.querySelector('.btn-add-c-contact').addEventListener('click', function() {
                    const ci = cContactIndex++;
                    const row = document.createElement('div');
                    row.className = 'grid grid-cols-5 gap-2';
                    row.innerHTML = `
                <input type="text"  name="consignees[${idx}][contacts][${ci}][name]"     placeholder="Full Name"    class="border border-blue-100 rounded-xl px-3 py-2 text-sm text-blue-900 placeholder-blue-200 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition col-span-1"/>
                <input type="text"  name="consignees[${idx}][contacts][${ci}][number]"   placeholder="+63..."       class="border border-blue-100 rounded-xl px-3 py-2 text-sm text-blue-900 placeholder-blue-200 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition col-span-1"/>
                <input type="email" name="consignees[${idx}][contacts][${ci}][email]"    placeholder="email@co.com" class="border border-blue-100 rounded-xl px-3 py-2 text-sm text-blue-900 placeholder-blue-200 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition col-span-1"/>
                <input type="text"  name="consignees[${idx}][contacts][${ci}][role]"     placeholder="Role"         class="border border-blue-100 rounded-xl px-3 py-2 text-sm text-blue-900 placeholder-blue-200 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition col-span-1"/>
                <div class="flex gap-1 col-span-1">
                    <input type="text" name="consignees[${idx}][contacts][${ci}][position]" placeholder="Position" class="flex-1 border border-blue-100 rounded-xl px-3 py-2 text-sm text-blue-900 placeholder-blue-200 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300 transition"/>
                    <button type="button" class="p-2 text-red-300 hover:text-red-500 hover:bg-red-50 rounded-lg transition">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            `;
                    row.querySelector('button').addEventListener('click', () => {
                        row.remove();
                        console.log(`[SC Module] Consignee ${idx + 1} contact row removed`);
                    });
                    cContactRows.appendChild(row);
                    console.log(`[SC Module] Consignee ${idx + 1} contact row added`);
                });

                // Remove consignee card
                card.querySelector('.btn-remove-consignee').addEventListener('click', function() {
                    card.remove();
                    renumberConsignees();
                    console.log(`[SC Module] Consignee card ${idx + 1} removed`);
                    toggleEmptyState();
                });

                return card;
            }

            function renumberConsignees() {
                const cards = container.querySelectorAll('.consignee-card');
                cards.forEach((card, i) => {
                    card.querySelector('.consignee-num').textContent = i + 1;
                    card.querySelector('span.font-semibold').textContent = `Consignee ${i + 1}`;
                });
            }

            function toggleEmptyState() {
                const cards = container.querySelectorAll('.consignee-card');
                emptyState.classList.toggle('hidden', cards.length > 0);
            }

            $('btn-add-consignee').addEventListener('click', function() {
                const card = buildConsigneeCard(consigneeIndex++);
                container.appendChild(card);
                toggleEmptyState();
                card.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                console.log('[SC Module] Consignee card added. Total:', container.querySelectorAll(
                    '.consignee-card').length);
            });

            // ── Table Actions ───────────────────────────────────────
            document.addEventListener('click', function(e) {
                const editBtn = e.target.closest('.btn-edit');
                const viewBtn = e.target.closest('.btn-view');
                const deleteBtn = e.target.closest('.btn-delete');

                if (editBtn) {
                    const row = editBtn.closest('tr');
                    const scCode = row?.querySelector('td:first-child')?.textContent?.trim();
                    console.log('[SC Module] Edit clicked — SC Code:', scCode);
                }
                if (viewBtn) {
                    const row = viewBtn.closest('tr');
                    const scCode = row?.querySelector('td:first-child')?.textContent?.trim();
                    console.log('[SC Module] View clicked — SC Code:', scCode);
                }
                if (deleteBtn) {
                    const row = deleteBtn.closest('tr');
                    const scCode = row?.querySelector('td:first-child')?.textContent?.trim();
                    console.log('[SC Module] Delete clicked — SC Code:', scCode);
                }
            });

            // ── Table Search ────────────────────────────────────────
            $('table-search').addEventListener('input', function() {
                console.log('[SC Module] Table search query:', this.value);
            });

            // ── Table Filters ───────────────────────────────────────
            $('filter-customer-type').addEventListener('change', function() {
                console.log('[SC Module] Filter by Customer Type:', this.value);
            });
            $('filter-payment-mode').addEventListener('change', function() {
                console.log('[SC Module] Filter by Payment Mode:', this.value);
            });

            // ── Form Submit ─────────────────────────────────────────
            $('btn-submit-form').addEventListener('click', function() {
                const form = $('sc-form');
                const data = new FormData(form);
                const payload = {};
                data.forEach((value, key) => {
                    payload[key] = value;
                });
                console.log('[SC Module] Form submitted — payload:', payload);
                // TODO: Replace with axios.post('/api/shipper-consignee', payload) or fetch()
            });

        })();
    </script>
</body>

</html>
