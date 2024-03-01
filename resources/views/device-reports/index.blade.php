<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Devices reports') }}
        </h2>
    </x-slot>

    <x-white-container>
        <div class="w-full flex gap-8 mb-8">
            <a href="{{ route("device-reports.create") }}">
                <x-button class="aspect-square">
                    <img src="/icons/plus.svg" alt="plus" class="w-4 invert">
                </x-button>
            </a>
        </div>

        @forelse ($reports as $report)
            <a
                class="flex items-center justify-between my-4 p-4 border-2 rounded-md shadow-md hover:shadow-lg hover:bg-zinc-100 transition ease-in-out"
                href="{{ route('device-reports.show', $report) }}"
            >
                <div>
                    <h3 class="text-lg font-semibold">{{ $report->created_at }} - {{ __("Device") . " " . $report->device_id  }}</h3>
                    <p class="text-sm text-gray-500">{{ __("Device name") }}: {{ $report->device_name }}</p>
                    <p class="text-sm text-gray-500">{{ __("Device city") }}: {{ $report->device_city }}</p>

                    @if ($report->device_latitude && $report->device_longitude)
                        <p class="text-sm text-gray-500">{{ __("Device latitude") }}: {{ number_format($report->device_latitude, 2, ".", "") }}</p>
                        <p class="text-sm text-gray-500">{{ __("Device longitude") }}: {{ number_format($report->device_longitude, 2, ". , ") }}</p>
                    @endif
                </div>
                <div>
                    <p class="text-sm text-gray-500">{{ __("Slots") . ": " . $report->slots()->count() }}</p>
                </div>
            </a>
        @empty
            <p class="text-center">{{ __("No reports found.") }}</p>
        @endforelse

        {{ $reports->links() }}
    </x-white-container>
</x-app-layout>
