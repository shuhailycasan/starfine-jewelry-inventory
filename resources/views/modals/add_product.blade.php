{{-- 🔒 Modal Goes Here --}}
<x-modal name="add-product" :show="false" focusable>
    <form method="POST" action="{{ route('products.store') }}" class="p-6">
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
                <x-input-error :messages="$errors->get('karat')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="grams" :value="'Weight (g)'"/>
                <x-text-input name="grams" id="grams" type="number" step="0.01" class="w-full"/>

                <x-input-error :messages="$errors->get('grams')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="quantity" :value="'Stock Quantity'"/>
                <x-text-input name="quantity" id="quantity" type="number" class="w-full"/>
                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            </div>

            <div class="col-span-2">
                <x-input-label for="description" :value="'Description'"/>
                <textarea name="description" id="description" rows="3"
                          class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white"></textarea>

                <x-input-error :messages="$errors->get('description')" class="mt-2" />

            </div>

            <div class="col-span-2">
                <x-input-label for="photo" :value="'Photo'"/>
                <input type="file" name="photo" id="photo" class="w-full"/>

                <x-input-error :messages="$errors->get('photo')" class="mt-2" />

            </div>

            <div>
                <x-input-label for="status" :value="'Status'"/>
                <select name="status" id="status" class="w-full">
                    <option value="available">Available</option>
                    <option value="sold">Sold</option>
                    <option value="out_of_stock">Out of Stock</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />

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
