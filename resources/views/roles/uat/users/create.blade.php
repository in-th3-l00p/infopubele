<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creează un nou utilizator') }}
        </h2>
    </x-slot>

    <x-layout.form-padding>
        @livewire("users.create-user-form")
    </x-layout.form-padding>
</x-app-layout>
