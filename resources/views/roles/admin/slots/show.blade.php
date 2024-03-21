<x-app-layout>
    <x-slot name="sticky_header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Slot') }} {{ $slot->id }}</h2>
    </x-slot>

    <x-white-container>
        @livewire("update-slot", [
            "slot" => $slot
        ])
    </x-white-container>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 max-w-7xl mx-auto">
        <x-white-container class="w-full">
            <h2 class="text-lg font-medium">{{ __("Volum") }}</h2>
            <div class="aspect-square flex justify-center items-center text-2xl md:text-4xl">
                <div class="me-2">{{ $slot->volume }} dm<sup>3</sup></div>
                <div class="text-zinc-400 font-light">/ {{ $slot->max_volume }} dm<sup>3</sup></div>
            </div>
        </x-white-container>

        <x-white-container class="w-full">
            <h2 class="text-lg font-medium">{{ __("Procentaj") }}</h2>
            <div class="aspect-square flex justify-center items-center text-2xl md:text-4xl">
                <div class="me-2">{{ $slot->volume / $slot->max_volume * 100 }}%</div>
            </div>
        </x-white-container>
    </div>

    <x-white-container>
        <h2 class="text-lg font-semibold mb-8">{{ __("Tranzacții") }}</h2>

        <ul class="ml-8">
            @forelse ($transactions as $transaction)
                <x-transaction-display
                    :transaction="$transaction"
                    :device="$device"
                />
            @empty
                <p>{{ __("Nu exista tranzacții.") }}</p>
            @endforelse
        </ul>
    </x-white-container>

    <x-white-container>
        <h2 class="text-lg font-semibold mb-8">{{ __("Ștergeți slotul") }}</h2>
        <div class="mx-8 flex flex-wrap items-center justify-between gap-8">
            <p class="mb-4">{{ __("Ești sigur că vrei să ștergi slotul?") }}</p>

            <form
                method="POST"
                action="{{ route("slots.destroy", [
                    "slot" => $slot
                ]) }}"
            >
                @csrf
                @method("DELETE")

                <x-danger-button type="submit">
                    {{ __("Confirmare") }}
                </x-danger-button>
            </form>
        </div>
    </x-white-container>
</x-app-layout>
