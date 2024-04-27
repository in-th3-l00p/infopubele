<x-app-layout>
    <x-slot name="sticky_header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dispozitiv') }}: <span class="font-bold">{{ $device->name }}</span> ({{ $device->id }})
        </h2>
    </x-slot>

    <x-white-container>
        <livewire:update-device :device="$device" />
    </x-white-container>

    <x-white-container>
        <livewire:update-device-location :device="$device" />
    </x-white-container>

    <x-device-map :device="$device" />

    <livewire:card-panel :device="$device" />

    <x-devices-token-panel :device="$device" />

    <x-white-container>
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-lg font-semibold">{{ __("Sloturi") }}</h2>
            <a href="{{ route('slots.create', ['device' => $device]) }}">
                <x-button class="aspect-square">
                    <img src="/icons/plus.svg" alt="plus" class="w-4 invert">
                </x-button>
            </a>
        </div>

        <ul class="ml-8">
            @forelse ($slots as $slot)
                <li>
                    <a
                        class="flex items-center justify-between my-4 p-4 border-2 rounded-md shadow-md hover:shadow-lg hover:bg-zinc-100 transition ease-in-out"
                        href="{{ route('uat.slots.show', [$device,$slot]) }}"
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
                <p>{{ __("Nu exista sloturi configurate.") }}</p>
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
                <p>{{ __("Nu exista tranzacții.") }}</p>
            @endforelse
        </ul>
    </x-white-container>

    <x-white-container>
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold">{{ __("Șterge dispozitiv") }}</h2>
            <form id="deleteForm" method="POST" action="{{ route("devices.destroy", [
                "device" => $device
            ]) }}">
                @csrf
                @method("DELETE")

                <x-danger-button type="submit" title="remove">{{ __("Șterge") }}</x-danger-button>
            </form>
        </div>
    </x-white-container>
</x-app-layout>
