<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Slot') }} "{{ $slot->name }}"
        </h2>
    </x-slot>

    <x-layout.form-padding>
        @livewire("slots.edit-slot-form", [
            "slot" => $slot
        ])

        <x-section-border/>

        @livewire("slots.slot-volume", [
            "slot" => $slot
        ])

        <x-section-border />

        @livewire("transactions.slot-transactions", [
            "slot" => $slot
        ])
    </x-layout.form-padding>
</x-app-layout>
