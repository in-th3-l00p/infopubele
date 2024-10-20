<section wire:poll.750ms.visible.keep-alive>
    <div class="grid grid-cols-1 md:space-y-0 md:grid-cols-2 gap-12">
        <div class="white-container max-w-md !m-0 flex items-center justify-center aspect-square justify-self-end">
            <div class="text-2xl">
                {{ $slot->volume }} dm<sup>3</sup>
                <span class="text-gray-400">/</span>
                <span class="text-gray-400">{{ $slot->max_volume }} dm<sup>3</sup></span>
            </div>
        </div>

        <div class="white-container max-w-md !m-0 flex items-center justify-center aspect-square relative">
            <div class="text-2xl z-10">
                {{ number_format(($slot->volume / $slot->max_volume) * 100, 2) }}%
            </div>

            <div
                class="absolute bottom-0 left-0 w-full bg-green-50"
                style="height: {{ min(($slot->volume / $slot->max_volume) * 100, 100) }}%;"
            >
            </div>
        </div>
    </div>
</section>

