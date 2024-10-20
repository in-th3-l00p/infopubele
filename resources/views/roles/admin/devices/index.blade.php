@php use App\Models\Device; @endphp
<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dispozitive') }}
            </h2>

            <a href="{{ route('admin.devices.create') }}">
                <x-button
                    :title="__('Creează')"
                >
                    <i class="fa-solid fa-plus"></i>
                </x-button>
            </a>
        </div>
    </x-slot>

    <x-layout.global-padding>
        <div>
            @if ($devices->count() > 0)
                <ul role="list"
                    class="divide-y divide-gray-100 overflow-hidden bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-md mb-4"
                >
                    @foreach($devices as $device)
                        <li class="relative flex justify-between gap-x-6 px-4 py-5 hover:bg-gray-50 sm:px-6">
                            <div class="flex min-w-0 gap-x-4">
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">
                                        <a href="{{ route("admin.devices.show", [ "device" => $device ]) }}">
                                            <span class="absolute inset-x-0 -top-px bottom-0"></span>
                                            {{ $device->name }}
                                        </a>
                                    </p>
                                    <p class="mt-1 flex text-xs leading-5 text-gray-500">
                                        {{ $device->city }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex shrink-0 items-center gap-x-4">
                                <div class="hidden sm:flex sm:flex-col sm:items-end">
                                    <p class="text-sm leading-6 text-gray-900">Director of Product</p>
                                    <div class="mt-1 flex items-center gap-x-1.5">
                                        <div class="flex-none rounded-full bg-emerald-500/20 p-1">
                                            <div class="h-1.5 w-1.5 rounded-full bg-emerald-500"></div>
                                        </div>
                                        <p class="text-xs leading-5 text-gray-500">Online</p>
                                    </div>
                                </div>
                                <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                          d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </li>
                    @endforeach
                </ul>
                {{ $devices->links() }}
            @else
                <p class="text-center">{{ __("Nu a fost creat niciun dispozitiv") }}.</p>
            @endif
        </div>

        <div
            class="divide-y divide-gray-100 overflow-hidden bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-md mb-4 px-4 py-5 sm:px-6">
            <h2 class="mb-4">{{__("Locația pubelelor")}}</h2>

            <div class="pt-4">
                @php $locationDevices = Device::query()
                                 ->whereNotNull("latitude")
                                 ->whereNotNull("longitude")
                                 ->get([ "name", "latitude", "longitude" ]);
                @endphp
                <x-maps-leaflet style="width:95%; aspect-ratio: 2/1; margin-inline: auto;"
                               :mapType="'roadmap'"
                               :zoomLevel="7" :centerPoint="['lat' => 45.9432, 'long' => 24.9668]"
                               :markers="$locationDevices->map(fn (Device $device) => [
                                    'lat' => $device->latitude,
                                    'long' => $device->longitude,
                                    'title' => $device->name
                                ])->all()"
                ></x-maps-leaflet>
            </div>
        </div>
    </x-layout.global-padding>
</x-app-layout>
