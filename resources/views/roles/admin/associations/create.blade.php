<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Asociatii') }}
        </h2>
    </x-slot>

    <x-white-container>
        @livewire('create-association')
    </x-white-container>
</x-app-layout>
