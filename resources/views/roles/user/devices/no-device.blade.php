@php use App\Models\Card; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dispozitiv') }}
        </h2>
    </x-slot>

    <x-layout.form-padding>
        <p class="text-center">{{ __("Nu îți este arondat niciun dispozitiv") }}.</p>
    </x-layout.form-padding>
</x-app-layout>
