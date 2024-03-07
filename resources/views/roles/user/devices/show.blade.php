<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Device') }}: <span class="font-bold">{{ $device->name }}</span>
        </h2>
    </x-slot>

    <x-white-container>
        <x-form-section submit="updateDevice">
            <x-slot name="title">
                {{ __('Device Information') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Complete with the initial device\'s information.') }}
            </x-slot>


            <x-slot name="form">

                <div class="col-span-6 sm:col-span-4">
                    <x-label for="name" value="{{ __('Name') }}" />
                    <h1>{{$device->name}}</h1>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-label for="city" value="{{ __('City') }}" />
                    <h1>{{$device->city}}</h1>
                </div>
            </x-slot>
        </x-form-section>
    </x-white-container>

    <x-device-map :device="$device" />

    <x-white-container>
        <h2 class="text-lg font-semibold">{{ __("Slots") }}:</h2>
        <ul class="ml-8">
            @forelse ($device->slots as $slot)
                <li>
                    <a
                        class="flex items-center justify-between my-4 p-4 border-2 rounded-md shadow-md hover:shadow-lg hover:bg-zinc-100 transition ease-in-out"
                        href="{{ route('user.devices.slots.show', [$device,$slot]) }}"
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

    <x-slot-visualizer :device="$device" />
</x-app-layout>
