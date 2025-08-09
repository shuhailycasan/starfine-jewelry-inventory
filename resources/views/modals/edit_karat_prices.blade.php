<x-modal name="edit-gold-karat-prices" focusable>
    <div
        x-data="{ id: '', karat: '', price: '' }"
        x-on:fill-edit-form.window="
            id = $event.detail.id;
            karat = $event.detail.karat;
            price = $event.detail.price;
        "
    >
        <form method="POST" :action="`/settings/gold-price/${id}`" class="p-6">
            @csrf
            @method('PUT')

            <h2 class="text-lg font-medium text-gray-900 mb-4">Edit Karat Price</h2>

            <div class="mb-4">
                <x-input-label value="Karat" />
                <x-text-input type="text" name="karat" x-model="karat" class="mt-1 block w-full" required />
            </div>

            <div class="mb-4">
                <x-input-label value="Price per Gram" />
                <x-text-input type="number" step="0.01" name="price_per_gram" x-model="price" class="mt-1 block w-full" required />
            </div>

            <div class="flex justify-end gap-2 mt-6">
                <x-secondary-button type="button" x-on:click="$dispatch('close')">Cancel</x-secondary-button>
                <x-primary-button type="submit">Update</x-primary-button>
            </div>
        </form>
    </div>
</x-modal>
