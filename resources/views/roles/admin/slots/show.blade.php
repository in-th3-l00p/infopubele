<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Slot') }} {{ $slot->id }}</h2>
    </x-slot>

    <x-white-container>
        @livewire("update-slot", [
            "slot" => $slot
        ])
    </x-white-container>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 max-w-7xl mx-auto">
        <x-white-container class="w-full">
            <h2 class="text-lg font-medium">{{ __("Volume") }}</h2>
            <div class="aspect-square flex justify-center items-center text-2xl md:text-4xl">
                <div class="me-2">{{ $slot->volume }} m<sup>3</sup></div>
                <div class="text-zinc-400 font-light">/ {{ $slot->max_volume }} m<sup>3</sup></div>
            </div>
        </x-white-container>

        <x-variable-container :percentage="$slot->volume / $slot->max_volume * 100">
            <h2 class="text-lg font-medium">{{ __("Percentage") }}</h2>
            <div class="aspect-square flex justify-center items-center text-2xl md:text-4xl">
                <div class="me-2">{{ $slot->volume / $slot->max_volume * 100 }}%</div>
            </div>
        </x-variable-container>
    </div>

    <x-white-container>
        <h2 class="text-lg font-semibold mb-8">{{ __("Transactions") }}</h2>

        <ul class="ml-8">
            @forelse ($transactions as $transaction)
                <x-transaction-display
                    :transaction="$transaction"
                    :device="$device"
                />
            @empty
                <p>{{ __("There are no transactions.") }}</p>
            @endforelse
        </ul>
    </x-white-container>
</x-app-layout>