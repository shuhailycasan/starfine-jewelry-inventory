<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <!-- Logo -->
            <a href="{{ route('features.dashboard') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200 "/>
            </a>

            <!-- Shop Name -->
            <h2 class="font-cinzel text-xl text-gray-800 dark:text-gray-200 leading-tight pl-4">
                {{ __('STARFINE JEWELRY') }}
            </h2>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Add Product Button --}}
            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                <!-- Search form: stays in row on all screen sizes -->
                <form method="GET" action="#" class="flex flex-row items-center gap-2">
                    <x-text-input name="search" placeholder="Search products..." class="w-full sm:w-64" />
                    <x-primary-button>Search</x-primary-button>
                </form>

                <!-- Add + Export buttons: stack on mobile, inline on sm and up -->
                <div class="flex flex-col sm:flex-row gap-2 sm:justify-center sm:items-center">
                    <x-primary-button x-data @click="$dispatch('open-modal', 'add-product')" class="w-full sm:w-auto">
                        + Add Product
                    </x-primary-button>

                    <x-secondary-button class="w-full sm:w-auto">
                        Export
                    </x-secondary-button>
                </div>
            </div>

            {{-- Products Table --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full table-auto border-collapse">
                        <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            <th class="p-2 text-left">Name</th>
                            <th class="p-2 text-left">Type</th>
                            <th class="p-2 text-left">Karat</th>
                            <th class="p-2 text-left">Grams</th>
                            <th class="p-2 text-left">Price</th>
                            <th class="p-2 text-left">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- Example static row, loop over your products here --}}
                        <tr class="border-b dark:border-gray-700">
                            <td class="p-2">18k Ring</td>
                            <td class="p-2">Ring</td>
                            <td class="p-2">18k</td>
                            <td class="p-2">2.3g</td>
                            <td class="p-2">₱9,200</td>
                            <td class="p-2">
                                <x-secondary-button>Edit</x-secondary-button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- 🔒 Modal Goes Here --}}
            <x-modal name="add-product" :show="false" focusable>
                <form method="POST" action="#" class="p-6">
                    @csrf

                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                        Add New Product
                    </h2>

                    <div class=" grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="name" :value="'Product Name'"/>
                            <x-text-input name="name" id="name" class="w-full"/>
                        </div>

                        <div>
                            <x-input-label for="type" :value="'Type'"/>
                            <select name="type" id="type" class="w-full">
                                <option value="ring">Ring</option>
                                <option value="earring">Earring</option>
                                <option value="bracelet">Bracelet</option>
                                <option value="necklace">Necklace</option>
                            </select>
                        </div>

                        <div>
                            <x-input-label for="karat" :value="'Karat'"/>
                            <select name="karat" id="karat" class="w-full">
                                <option value="10k">10k</option>
                                <option value="14k">14k</option>
                                <option value="18k">18k</option>
                                <option value="21k">21k</option>
                                <option value="24k">24k</option>
                            </select>
                        </div>

                        <div>
                            <x-input-label for="grams" :value="'Weight (g)'"/>
                            <x-text-input name="grams" id="grams" type="number" step="0.01" class="w-full"/>
                        </div>

                        <div>
                            <x-input-label for="price_per_gram" :value="'Price per gram'"/>
                            <x-text-input name="price_per_gram" id="price_per_gram" type="number" step="0.01" class="w-full"/>
                        </div>

                        <div>
                            <x-input-label for="discount" :value="'Discount (%)'"/>
                            <x-text-input name="discount" id="discount" type="number" step="0.01" class="w-full"/>
                        </div>

                        <div>
                            <x-input-label for="quantity" :value="'Stock Quantity'"/>
                            <x-text-input name="quantity" id="quantity" type="number" class="w-full"/>
                        </div>

                        <div class="col-span-2">
                            <x-input-label for="description" :value="'Description'"/>
                            <textarea name="description" id="description" rows="3"
                                      class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white"></textarea>
                        </div>

                        <div class="col-span-2">
                            <x-input-label for="photo" :value="'Photo'"/>
                            <input type="file" name="photo" id="photo" class="w-full"/>
                        </div>

                        <div>
                            <x-input-label for="status" :value="'Status'"/>
                            <select name="status" id="status" class="w-full">
                                <option value="available">Available</option>
                                <option value="sold">Sold</option>
                                <option value="out_of_stock">Out of Stock</option>
                            </select>
                        </div>

                    <div class="mt-6 flex justify-end space-x-2">
                        <x-secondary-button x-on:click.prevent="$dispatch('close')">
                            Cancel
                        </x-secondary-button>

                        <x-primary-button type="submit">
                            Save Product
                        </x-primary-button>
                    </div>
                </form>
            </x-modal>
        </div>
    </div>
</x-app-layout>
