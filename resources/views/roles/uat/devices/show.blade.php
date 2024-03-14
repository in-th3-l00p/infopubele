<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dispozitiv') }}: <span class="font-bold">{{ $device->name }}</span>
        </h2>
    </x-slot>

    <x-white-container>
        <livewire:update-device :device="$device" />
    </x-white-container>

    <x-device-map :device="$device" />

    <x-white-container>
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-lg font-semibold">{{ __("Sloturi") }}:</h2>
        </div>

        <ul class="ml-8">
            @forelse ($slots as $slot)
                <li>
                    <a
                        class="flex items-center justify-between my-4 p-4 border-2 rounded-md shadow-md hover:shadow-lg hover:bg-zinc-100 transition ease-in-out"
                        href="{{ route('uat.devices.slots.show', $slot) }}"
                    >
                        <div>
                            <h3 class="text-lg font-semibold">{{ $slot->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $slot->city }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">{{ number_format($slot->volume / $slot->max_volume * 100, 2) }}%</p>
                        </div>
                    </a>
                </li>
            @empty
                <p>{{ __("Nu sunt sloturi configurate.") }}</p>
            @endforelse
        </ul>

        {{ $slots->links() }}
    </x-white-container>

    <x-slot-visualizer :device="$device" />

    <x-white-container>
        <h2 class="text-lg font-semibold mb-8">{{ __("Tranzacții") }}</h2>

        <ul class="ml-8">
            @forelse ($transactions as $transaction)
                <x-transaction-display
                    :transaction="$transaction"
                    :device="$device"
                />
            @empty
                <p>{{ __("Nu sunt tranzacții.") }}</p>
            @endforelse
        </ul>
    </x-white-container>
</x-app-layout>
