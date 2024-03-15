@if ($device->latitude !== null && $device->longitude !== null)
    <x-white-container>
        <div class="space-y-2">
            <h1 class="font-bold text-3xl mb-4">{{__("Locatie")}}</h1>
            <x-maps-google style="width:95%; aspect-ratio: 2/1; margin-inline: auto;"
                            :mapType="'roadmap'"
                            :zoomLevel="8"
                            :centerPoint="['lat' => $device->latitude, 'long' => $device->longitude]"
                            :markers="[[$device->latitude, $device->longitude]]"
            ></x-maps-google>
        </div>
    </x-white-container>
@endif
