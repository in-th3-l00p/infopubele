<x-white-container>
    <h2 class="text-lg font-semibold mb-8">{{ __("Visualizer") }}</h2>

    <div class="flex flex-wrap justify-center items-center gap-8">
        @forelse($device->slots()->get() as $slot)
            <div class="w-full h-full relative bg-white border-2 border-t-gray-50 flex flex-col justify-center items-center w-32 h-32 rounded-bl-lg rounded-br-lg z-10">
                <p>{{ __("Slot ") . $slot->name }}</p>

                @php $percentage = $slot->volume / $slot->max_volume * 100;  @endphp
                <p>{{ $percentage }}%</p>
                <div
                    class="absolute w-full bg-green-100 bottom-0 left-0 -z-10"
                    style="height: {{ $percentage }}%"
                ></div>
            </div>
        @empty
            <p>{{ __("There are no slots configured.") }}</p>
        @endforelse
    </div>
</x-white-container>
