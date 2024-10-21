<div class="white-container" id="cards">
    <div class="pb-4">
        <h3 class="text-base font-semibold leading-6 text-gray-900">{{ __("Carduri") }}</h3>
        <p class="mt-1 text-sm text-gray-500">{{ __("Vizualizează cardurile tale") }}</p>
    </div>

    @if ($cards->count() > 0)
        <ul role="list" class="divide-y divide-gray-100 rounded-b-md overflow-hidden">
            @foreach($cards as $card)
                <li class="relative flex justify-between gap-x-6 py-5 hover:bg-gray-50 px-4 sm:px-6">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm leading-6 text-gray-900">
                                {{ __("Dispozitiv") }}: <span class="font-semibold">{{ $card->device->name }}</span>
                            </p>
                            <p class="mt-1 flex text-xs leading-5 text-gray-500">
                                {{ $card->uuid }}
                            </p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="pt-4">
            {{ $cards->links(data: ['scrollTo' => '#cards']) }}
        </div>
    @else
        <p class="text-center pt-4">{{ __("Dispozitivul nu are niciun card") }}</p>
    @endif
</div>
