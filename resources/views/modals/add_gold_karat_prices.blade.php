<x-modal name="add-gold-karat-prices" :show="false" focusable>
    <form method="POST" action="{{ route('store-setting.store') }}" class="p-6 space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <x-input-label for="karat" value="Karat"/>
                <x-text-input id="karat" name="karat" placeholder="e.g. 21k" class="w-full"/>
            </div>

            <div>
                <x-input-label for="price_per_gram" value="Price per gram"/>
                <x-text-input id="price_per_gram" name="price_per_gram" placeholder="e.g. 3050.00" type="number" step="0.01" class="w-full"/>
            </div>
        </div>

        <x-input-error :messages="$errors->all()" class="mt-2" />

        <div class="flex justify-end space-x-2 pt-4">
            <x-secondary-button x-on:click.prevent="$dispatch('close')">
                Cancel
            </x-secondary-button>

            <x-primary-button type="submit">
                Save Prices
            </x-primary-button>
        </div>
    </form>

    @if ($errors->any())
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                window.dispatchEvent(new CustomEvent('open-modal', {detail: 'add-gold-karat-prices'}))
            });
        </script>
    @endif
</x-modal>
