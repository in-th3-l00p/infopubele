<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Create Device') }}</h2>
    </x-slot>

    <x-white-container>
        @livewire("create-device")
    </x-white-container>
</x-app-layout>
