<div class="white-container">
    <div class="flex flex-wrap items-center justify-between sm:flex-nowrap mb-4">
        <div>
            <h3 class="text-base font-semibold leading-6 text-gray-900">{{ __("Vizualizare sloturi") }}</h3>
            <p class="mt-1 text-sm text-gray-500">{{ __("Capacitatea și nivelul de umplere a fiecărui slot vizualizat") }}</p>
        </div>
    </div>

    @if ($device->slots()->count() > 0)
        <div class="md:ml-4 gap-2 flex flex-col items-center md:flex-row md:gap-8 md:justify-center pt-4">
            @foreach($slots as $slot)
                <div class="relative bg-white border-2 border-t-gray-50 flex gap-2 flex-col text-center justify-center items-center w-32 h-32 rounded-bl-lg rounded-br-lg z-10">
                    <p>{{ __("Slot ") . $slot->name }}</p>

                    @php $percentage = $slot->volume / $slot->max_volume * 100;  @endphp
                    <p>{{ number_format($percentage) }}%</p>
                    <div
                        class="absolute w-full bg-green-100 bottom-0 left-0 -z-10"
                        style="height: {{ $percentage }}%"
                    ></div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center p t-4">{{ __("Dispozitivul nu are niciun slot") }}</p>
    @endif
</div>
