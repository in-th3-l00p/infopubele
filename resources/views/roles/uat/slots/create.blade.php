<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creează slot pentru dispozitivul') }} "{{ $device->name }}"
        </h2>
    </x-slot>

    <x-layout.form-padding>
        @livewire("slots.create-slot-form", [
            'device' => $device,
        ])
    </x-layout.form-padding>
</x-app-layout>
