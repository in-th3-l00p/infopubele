@if ($device->latitude !== null && $device->longitude !== null)
    <x-white-container>
        <div class="space-y-4">
            <h1 class="font-bold text-xl">{{__("Locatie")}}</h1>

            <div class="py-4 border-t border-b flex gap-4 items-center flex-wrap">
                <a
                    href="https://www.google.com/maps/search/?api=1&query={{ $device->latitude }}, {{ $device->longitude }}"
                    class="btn"
                >Google maps</a>
                <a
                    href="https://www.waze.com/ul?ll={{ $device->latitude }}, {{ $device->longitude }}&navigate=yes&zoom=17"
                    class="btn !bg-blue-600"
                >
                    Waze
                </a>
            </div>

            <x-maps-google style="width:95%; aspect-ratio: 2/1; margin-inline: auto;"
                            :mapType="'roadmap'"
                            :zoomLevel="8"
                            :centerPoint="['lat' => $device->latitude, 'long' => $device->longitude]"
                            :markers="[[$device->latitude, $device->longitude]]"
            ></x-maps-google>
        </div>
    </x-white-container>
@endif
