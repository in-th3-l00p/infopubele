<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Device report') . ' - ' . $report->created_at }}
        </h2>
    </x-slot>

    <x-white-container>
        <div class="flex gap-8 mb-4">
            <a
                type="button" class="btn" title="{{ __("Download") }}"
                href="{{ "/storage/" . $report->spreadsheet_link }}"
            >
                {{ __("Download") }}
            </a>

            <form action="{{ route('device-reports.destroy', $report) }}" method="POST">
                @csrf
                @method('DELETE')
                <x-danger-button type="submit">
                    {{ __("Remove") }}
                </x-danger-button>
            </form>
        </div>

        <h3 class="text-lg font-semibold">{{ __("Device") . " " . $report->device_id  }}</h3>
        <p class="text-sm text-gray-500">{{ __("Device name") }}: {{ $report->device_name }}</p>
        <p class="text-sm text-gray-500">{{ __("Device city") }}: {{ $report->device_city }}</p>

        @if ($report->device_latitude && $report->device_longitude)
            <p class="text-sm text-gray-500">{{ __("Device latitude") }}
                : {{ number_format($report->device_latitude, 2, ".", "") }}</p>
            <p class="text-sm text-gray-500">{{ __("Device longitude") }}
                : {{ number_format($report->device_longitude, 2, ". , ") }}</p>
        @endif
    </x-white-container>

    <x-white-container>
        <h3 class="text-lg font-semibold">{{ __("Slots") }}</h3>
        @forelse ($report->slots as $slot)
            <div
                class="flex items-center justify-between my-4 p-4 border-2 rounded-md shadow-md hover:shadow-lg transition ease-in-out"
                href="{{ route('slots.show', $slot) }}"
            >
                <div>
                    <h3 class="text-lg font-semibold">{{ __("Slot") . " " . $slot->id }}</h3>
                    <p class="text-sm text-gray-500">{{ __("Slot volume") }}: {{ $slot->volume }}</p>
                    <p class="text-sm text-gray-500">{{ __("Slot max volume") }}: {{ $slot->max_volume }}</p>
                </div>
            </div>
        @empty
            <p class="text-center">{{ __("No slots found.") }}</p>
        @endforelse
    </x-white-container>
</x-app-layout>
