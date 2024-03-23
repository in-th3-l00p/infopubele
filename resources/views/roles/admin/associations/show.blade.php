<x-app-layout>
    <x-slot name="sticky_header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Asociatia') }}: <span class="font-bold">{{ $association->address }}</span> ({{ $association->city }})
        </h2>
    </x-slot>
    <x-white-container>
        <livewire:update-association :association="$association" />
    </x-white-container>
</x-app-layout>
