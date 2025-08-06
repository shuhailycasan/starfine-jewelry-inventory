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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Users ') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
