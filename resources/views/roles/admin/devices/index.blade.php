<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Devices') }}
        </h2>
    </x-slot>

    <x-white-container>
        <div class="w-full flex gap-8 mb-8">
            <a href="{{ route("devices.create") }}">
                <x-button class="aspect-square">
                    <img src="/icons/plus.svg" alt="plus" class="w-4 invert">
                </x-button>
            </a>
        </div>

        @forelse ($devices as $device)
            <a
                class="flex items-center justify-between my-4 p-4 border-2 rounded-md shadow-md hover:shadow-lg hover:bg-zinc-100 transition ease-in-out"
                href="{{ route('devices.show', $device) }}"
            >
                <div>
                    <h3 class="text-lg font-semibold">{{ $device->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $device->city }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">{{ __("Slots") . ": " . $device->slots()->count() }}</p>
                </div>
            </a>
        @empty
            <p class="text-center">{{ __("No devices found.") }}</p>
        @endforelse

        {{ $devices->links() }}
    </x-white-container>
</x-app-layout>