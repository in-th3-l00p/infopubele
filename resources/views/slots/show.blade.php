<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Slot') }} {{ $slot->order }}</h2>
    </x-slot>

    <x-white-container>
        @livewire("update-slot", [
            "slot" => $slot
        ])
    </x-white-container>
</x-app-layout>
