<div class="white-container">
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
