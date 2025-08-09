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

            {{-- Products Table --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                {{-- Add Product Button --}}
                <div
                    class="flex flex-col items-center justify-center px-6 py-3 md:flex-row md:justify-between md:items-center gap-4">
                    <!-- Search form: stays in row on all screen sizes -->
                    <form method="GET" action="#" class="flex flex-row items-center gap-2">
                        <x-text-input name="search" placeholder="Search products..." class="w-full sm:w-64"/>
                        <x-primary-button>Search</x-primary-button>
                    </form>

                    <!-- Add + Export buttons: stack on mobile, inline on sm and up -->
                    <div class="flex sm:flex-row gap-2 sm:justify-center sm:items-center">
                        <x-primary-button x-data @click="$dispatch('open-modal', 'add-gold-karat-prices')"
                                          class="w-full sm:w-auto">
                            + Add Gold Prices
                        </x-primary-button>

                        <x-secondary-button class="w-full sm:w-auto">
                            Export
                        </x-secondary-button>
                    </div>
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full table-auto border-collapse">
                        <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            <th class="p-2 text-center">Karat</th>
                            <th class="p-2 text-center">Price per Gram</th>
                            <th class="p-2 text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @forelse ($goldPrices as $price)
                            <tr class="center border-b dark:border-gray-700">
                                <td class="py-2">{{ strtoupper($price->karat) }}</td>
                                <td class=" py-2">₱{{ number_format($price->price_per_gram, 2) }}</td>

                                <td class="justify-center p-2 flex gap-2">
                                    <!-- Edit Button -->
                                    <x-primary-button
                                        x-data
                                        @click="
                                                $dispatch('open-modal', 'edit-gold-karat-prices');
                                                $dispatch('fill-edit-form', {
                                                    id: '{{ $price->id }}',
                                                    karat: '{{ $price->karat }}',
                                                    price: '{{ $price->price_per_gram }}'
                                                })
                                            ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07
                                                  a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685
                                                  a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z
                                                  m0 0L19.5 7.125M18 14v4.75
                                                  A2.25 2.25 0 0 1 15.75 21H5.25
                                                  A2.25 2.25 0 0 1 3 18.75V8.25
                                                  A2.25 2.25 0 0 1 5.25 6H10"/>
                                        </svg>
                                    </x-primary-button>

                                    <!-- Delete Button -->
                                    <form action="{{ route('gold-price.destroy', $price->id) }}" method="POST"
                                          onsubmit="return confirm('Delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 p-1 hover:bg-red-600 text-white rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="m14.74 9-.346 9m-4.788 0L9.26 9
                                                      m9.968-3.21c.342.052.682.107 1.022.166
                                                      m-1.022-.165L18.16 19.673
                                                      a2.25 2.25 0 0 1-2.244 2.077H8.084
                                                      a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79
                                                      m14.456 0a48.108 48.108 0 0 0-3.478-.397
                                                      m-12 .562c.34-.059.68-.114 1.022-.165
                                                      m0 0a48.11 48.11 0 0 1 3.478-.397
                                                      m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201
                                                      a51.964 51.964 0 0 0-3.32 0
                                                      c-1.18.037-2.09 1.022-2.09 2.201v.916
                                                      m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-4 text-gray-500 dark:text-gray-400">
                                    No products available.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{--add karat price modals--}}
            @include('modals.add_gold_karat_prices')
            {{--            edit karat prices--}}
            @include('modals.edit_karat_prices')
        </div>
    </div>
</x-app-layout>

