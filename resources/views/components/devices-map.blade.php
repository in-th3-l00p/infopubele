<x-white-container>
    <h2 class="font-semibold text-xl mb-4">{{__("Locația pubelelor")}}</h2>

    <div class="space-y-2">
        <x-maps-google style="width:95%; aspect-ratio: 2/1; margin-inline: auto;"
                       :mapType="'roadmap'"
                       :zoomLevel="7" :centerPoint="['lat' => 45.9432, 'long' => 24.9668]"
                       :markers="$devices->map(fn (\App\Models\Device $device) => [
                            'lat' => $device->latitude,
                            'long' => $device->longitude,
                            'title' => $device->name
                        ])->all()"
        ></x-maps-google>
    </div>
</x-white-container>
