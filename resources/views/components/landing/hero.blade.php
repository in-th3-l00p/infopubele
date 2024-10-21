@php use App\Models\Device; @endphp
<div class="relative pt-14">
    <div class="py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h1 class="text-balance text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                    Infopubele.ro
                </h1>
                <p class="mt-6 text-lg leading-8 text-gray-600"></p>
                O soluție inteligentă pentru colecatrea selectivă a deșeurilor prin containere inteligente.
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    @guest
                        <a
                            href="{{ route("login") }}"
                            class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600"
                        >
                            Loghează-te
                        </a>
                    @endguest
                    @auth
                        <a
                            href="{{ route("dashboard") }}"
                            class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600"
                        >
                            Intră în platformă
                        </a>
                    @endauth
                    <a
                        href="#despre"
                        class="text-sm font-semibold leading-6 text-gray-900"
                    >
                        Află mai multe <span aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
            <div class="mt-16 flow-root sm:mt-24">
                @php $locationDevices = Device::query()
                             ->whereNotNull("latitude")
                             ->whereNotNull("longitude")
                             ->get([ "name", "latitude", "longitude" ]);
                @endphp
                <x-maps-leaflet
                    class="rounded-md shadow-2xl ring-1 ring-gray-900/10"
                    style="width:95%; aspect-ratio: 2/1; margin-inline: auto;"
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
    </div>
</div>
