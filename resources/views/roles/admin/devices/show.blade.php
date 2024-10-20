<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dispozitiv') }} "{{ $device->name }}"
        </h2>
    </x-slot>

    <x-layout.form-padding>
        @livewire("admin.device.edit-device-form", [
            "device" => $device
        ])

        <x-section-border />

        @livewire("admin.device.device-location-form", [
            "device" => $device
        ])

        <x-section-border />

        @if ($device->latitude && $device->longitude)
            <div
                class="divide-y divide-gray-100 overflow-hidden bg-white shadow sm:shadow-md sm:rounded-md mb-4 px-4 py-5 sm:px-6"
            >
                <h2 class="mb-4">{{__("Locația dispozitivului")}}:</h2>
                <div class="py-4 border-t border-b flex gap-4 items-center flex-wrap">
                    <a
                        href="https://www.google.com/maps/search/?api=1&query={{ $device->latitude }}, {{ $device->longitude }}"
                    >
                        <x-button>
                            Google maps
                        </x-button>
                    </a>
                    <a
                        href="https://www.waze.com/ul?ll={{ $device->latitude }}, {{ $device->longitude }}&navigate=yes&zoom=17"
                    >
                        <x-button class="!bg-blue-600">
                            Waze
                        </x-button>
                    </a>
                </div>
                <x-maps-leaflet style="width:95%; aspect-ratio: 2/1; margin-inline: auto;"
                               :mapType="'roadmap'"
                               :zoomLevel="16"
                               :centerPoint="['lat' => $device->latitude, 'long' => $device->longitude]"
                               :markers="[[$device->latitude, $device->longitude]]"
                ></x-maps-leaflet>
            </div>
            <x-section-border />
        @endif
    </x-layout.form-padding>
</x-app-layout>
