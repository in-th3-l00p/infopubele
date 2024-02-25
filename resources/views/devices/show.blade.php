<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Device') }}: <span class="font-bold">{{ $device->name }}</span>
        </h2>
    </x-slot>

    <x-white-container>
        <livewire:update-device :device="$device" />
    </x-white-container>

    <x-white-container>
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-lg font-semibold">{{ __("Slots") }}:</h2>
            <a href="{{ route('devices.slots.create', ['device' => $device]) }}">
                <x-button class="aspect-square">
                    <img src="/icons/plus.svg" alt="plus" class="w-4 invert">
                </x-button>
            </a>
        </div>

        <ul class="ml-8">
            @forelse ($device->slots as $slot)
                <li>
                    <a
                        class="flex items-center justify-between my-4 p-4 border-2 rounded-md shadow-md hover:shadow-lg hover:bg-zinc-100 transition ease-in-out"
                        href="{{ route('slots.show', $slot) }}"
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
                <p>{{ __("There are no slots configured.") }}</p>
            @endforelse
        </ul>
    </x-white-container>
</x-app-layout>
