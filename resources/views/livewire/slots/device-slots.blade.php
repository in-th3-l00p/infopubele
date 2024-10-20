<div class="white-container" wire:poll.750ms.visible.keep-alive>
    <div class="flex flex-wrap items-center justify-between sm:flex-nowrap mb-4">
        <div>
            <h3 class="text-base font-semibold leading-6 text-gray-900">{{ __("Sloturi") }}</h3>
            <p class="mt-1 text-sm text-gray-500">{{ __("Vizualizează, creează sau modifică sloturile dispozitivului") }}</p>
        </div>
        <div class="flex-shrink-0">
            <a href="{{ route("admin.devices.slots.create", [ "device" => $device ]) }}">
                <x-button
                    :title="__('Creează un slot')"
                >
                    <i class="fa-solid fa-plus"></i>
                </x-button>
            </a>
        </div>
    </div>

    @if ($device->slots()->count() > 0)
        <ul role="list" class="divide-y divide-gray-100 rounded-b-md overflow-hidden">
            @foreach($slots as $slot)
                <li class="relative flex justify-between gap-x-6 py-5 hover:bg-gray-50 px-4 sm:px-6">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">
                                <a href="{{ route("admin.devices.slots.show", [ "device" => $device, "slot" => $slot ]) }}">
                                    <span class="absolute inset-x-0 -top-px bottom-0"></span>
                                    ID {{ $slot->id }} - {{ $slot->name }}
                                </a>
                            </p>
                            <p class="mt-1 flex text-xs leading-5 text-gray-500">
                                {{ $slot->volume }}L / {{ $slot->max_volume }}L
                            </p>
                        </div>
                    </div>
                    <div class="flex shrink-0 items-center gap-x-4">
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
    @else
        <p class="text-center pt-4">{{ __("Dispozitivul nu are niciun slot") }}</p>
    @endif
</div>
