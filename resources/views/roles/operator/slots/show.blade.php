<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Slot') }} {{ $slot->name }}</h2>
    </x-slot>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 max-w-7xl mx-auto">
        <x-white-container class="w-full">
            <h2 class="text-lg font-medium">{{ __("Volum") }}</h2>
            <div class="aspect-square flex justify-center items-center text-2xl md:text-4xl">
                <div class="me-2">{{ $slot->volume }} m<sup>3</sup></div>
                <div class="text-zinc-400 font-light">/ {{ $slot->max_volume }} m<sup>3</sup></div>
            </div>
        </x-white-container>


        <x-white-container class="w-full">
            <h2 class="text-lg font-medium">{{ __("Procentaj") }}</h2>
            <div class="aspect-square flex justify-center items-center text-2xl md:text-4xl">
                <div class="me-2">{{ $slot->volume / $slot->max_volume * 100 }}%</div>
            </div>
        </x-white-container>
    </div>
</x-app-layout>
