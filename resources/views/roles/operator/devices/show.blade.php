<x-app-layout>
    <x-slot name="sticky_header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dispozitiv') }}: <span class="font-bold">{{ $device->name }}</span> ({{ $device->id }})
        </h2>
    </x-slot>

    <x-white-container>
        <x-form-section submit="updateDevice">
            <x-slot name="title">
                {{ __('Informații despre Dispozitiv') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Completează cu informațiile inițiale ale dispozitivului.') }}
            </x-slot>


            <x-slot name="form">

                <div class="col-span-6 sm:col-span-4">
                    <x-label for="name" value="{{ __('Nume') }}" />
                    <h1>{{$device->name}}</h1>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-label for="city" value="{{ __('City') }}" />
                    <h1>{{$device->city}}</h1>
                </div>
            </x-slot>
        </x-form-section>
    </x-white-container>

    <x-white-container>
        <h2 class="text-lg font-semibold">{{ __("Notificari") }}:</h2>
        <ul>
            @forelse ($device->slots as $slot)
                @if(($slot->volume / $slot->max_volume * 100 )>=90)
                    <li>
                        <a
                            class="flex items-center justify-between my-4 p-4 border-2 rounded-md shadow-md hover:shadow-lg hover:bg-zinc-100 transition ease-in-out"
                            href="{{ route('user.devices.slot.show', [$device,$slot]) }}"
                        >
                            <h1>{{__("Slotul")}} <b>{{$slot->name}}</b> {{__("a ajuns la 90%")}}</h1>
                        </a>
                    </li>
                @endif
            @empty
                <p>{{ __("Nu sunt notificări.") }}</p>
            @endforelse
        </ul>
    </x-white-container>

    <x-white-container>
        <h2 class="text-lg font-semibold">{{ __("Sloturi") }}:</h2>
        <ul class="ml-8">
            @forelse ($device->slots as $slot)
                <li>
                    <a
                        class="flex items-center justify-between my-4 p-4 border-2 rounded-md shadow-md hover:shadow-lg hover:bg-zinc-100 transition ease-in-out"
                        href="{{ route('operator.devices.slots.show', [$device,$slot]) }}"
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
    </x-white-container>

    <x-slot-visualizer :device="$device" />
</x-app-layout>
