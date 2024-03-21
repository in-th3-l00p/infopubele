<x-white-container>
    <h2 class="text-lg font-semibold mb-8">{{ __("Visualizer") }}</h2>

    <div class="ml-4">
        @forelse($device->slots()->get() as $slot)
            <div class="relative bg-white border-2 border-t-gray-50 flex flex-col justify-center items-center w-32 h-32 rounded-bl-lg rounded-br-lg z-10">
                <p>{{ __("Slot ") . $slot->name }}</p>

                @php $percentage = $slot->volume / $slot->max_volume * 100;  @endphp
                <p>{{ $percentage }}%</p>
                <div
                    class="absolute w-full bg-green-100 bottom-0 left-0 -z-10"
                    style="height: {{ $percentage }}%"
                ></div>
            </div>
        @empty
            <p>{{ __("Nu sunt sloturi configurate.") }}</p>
        @endforelse
    </div>
</x-white-container>
