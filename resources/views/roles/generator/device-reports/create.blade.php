<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creeaza raporturi pentru Dispozitiv') }}
        </h2>
    </x-slot>

    <x-white-container>
        <livewire:create-device-report />
    </x-white-container>
</x-app-layout>
