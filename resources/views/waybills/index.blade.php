<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Waybills') }}
        </h2>
    </x-slot>

    <div class="py-6 container mx-auto p-4" x-data="waybillComponent()" x-init="fetchWaybills()">
        <h1 class="text-2xl font-bold">Waybills</h1>
        <button @click="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Add Waybill</button>

        <table class="table-auto w-full mt-4 border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">Waybill No</th>
                    <th class="border p-2">Shipment</th>
                    <th class="border p-2">Price</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <template x-for="waybill in waybills" :key="waybill.id">
                    <tr>
                        <td class="border p-2" x-text="waybill.waybill_no"></td>
                        <td class="border p-2" x-text="waybill.shipment"></td>
                        <td class="border p-2" x-text="waybill.price"></td>
                        <td class="border p-2" x-text="waybill.status"></td>
                        <td class="border p-2">
                            <button class="bg-yellow-500 text-white px-2 py-1" @click="editWaybill(waybill)">Edit</button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>

            <!-- Pagination Links -->
            <pre x-text="JSON.stringify(paginationLinks, null, 2)"></pre>
    <div class="mt-4 flex justify-center space-x-2">
        <h2>Test</h2>
        
        <template x-for="link in paginationLinks" :key="link.label">
        <pre x-text="JSON.stringify(paginationLinks, null, 2)"></pre>
        <pre x-text="JSON.stringify(paginationLinks, null, 2)"></pre>
            <button 
                class="px-3 py-1 border rounded"
                :class="{ 'bg-blue-500 text-white': link.active, 'text-gray-700': !link.active }"
                :disabled="!link.url"
                @click="fetchWaybills(link.url ? parseInt(link.url.split('=')[1]) : currentPage)">
                <span x-text="link.label"></span>
            </button>
        </template>
    </div>
        
    </div>

@push('scripts')
    <script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("waybillComponent", () => ({
            waybills: [],
            pagination: {
                current_page: 1,
                last_page: 1,
                links: []
            },
            isModalOpen: false,
            modalTitle: 'Add Waybill',
            form: { waybill_id: '', waybill_no: '', shipment: '', price: '', status: '' },

            fetchWaybills(url = "/waybills/fetch") {
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        this.waybills = data.data;
                        this.pagination = {
                            current_page: data.current_page,
                            last_page: data.last_page,
                            links: data.links // Laravel provides an array of page links
                        };
                    })
                    .catch(error => console.error("Fetch error:", error));
            },

            changePage(url) {
                if (url) {
                    this.fetchWaybills(url);
                }
            }
        }));
    });
    </script>
    @endpush


</x-app-layout>
