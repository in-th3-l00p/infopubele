@php use App\Models\Card; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dispozitiv') }} "{{ $device->name }}"
        </h2>
    </x-slot>

    <x-layout.form-padding>
        @livewire("device.show-device", [
            "device" => $device
        ])

        <x-section-border/>

        @if ($device->latitude && $device->longitude)
            @livewire("device.device-map", [
                "device" => $device
            ])
            <x-section-border/>
        @endif

        @livewire("slots.device-slots-visualizer", [
            "device" => $device
        ])

        <x-section-border/>

        @livewire("transactions.user-transactions", [
            "device" => $device
        ])

        <x-section-border/>

        @livewire("cards.user-cards")
    </x-layout.form-padding>
</x-app-layout>
