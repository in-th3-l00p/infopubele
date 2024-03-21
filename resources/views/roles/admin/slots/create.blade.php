<x-app-layout>
    <x-slot name="sticky_header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Create Slot') }}</h2>
    </x-slot>

    <x-white-container>
        @livewire("create-slot", [
            "device" => $device
        ])
    </x-white-container>
</x-app-layout>
