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
        @if(session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    <!-- Add new gold price -->
        <form method="POST" action="{{ route('store_setting.store') }}" class="mb-6">
            @csrf
            <div class="flex gap-4">
                <x-text-input name="karat" placeholder="e.g. 21k" class="w-1/3" />
                <x-text-input name="price_per_gram" placeholder="Price per gram" type="number" step="0.01" class="w-1/3" />
                <x-primary-button>Add</x-primary-button>
            </div>
            <x-input-error :messages="$errors->all()" class="mt-2" />
        </form>

        <!-- List existing karats -->
        <table class="w-full text-left border">
            <thead>
            <tr class="bg-gray-100">
                <th class="p-2">Karat</th>
                <th class="p-2">Price per gram</th>
                <th class="p-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($goldPrices as $price)
                <tr class="border-t">
                    <td class="p-2">{{ $price->karat }}</td>
                    <td class="p-2">₱{{ number_format($price->price_per_gram, 2) }}</td>
                    <td class="p-2">
                        <form method="POST" action="{{ route('store_setting.index', $price->id) }}">
                            @csrf
                            @method('DELETE')
                            <x-secondary-button class="bg-red-500 text-white hover:bg-red-600">
                                Delete
                            </x-secondary-button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
