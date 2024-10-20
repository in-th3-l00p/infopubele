<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Utilizator') }} "{{ $user->name }}"
        </h2>
    </x-slot>

    <x-layout.form-padding>
        @livewire("users.edit-user-form", [ "user" => $user ])
        <x-section-border />
        @livewire("users.change-user-password-form", [ "user" => $user ])
    </x-layout.form-padding>
</x-app-layout>
