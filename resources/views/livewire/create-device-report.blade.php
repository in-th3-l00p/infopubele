<x-form-section submit="store">
    <x-slot name="title">
        {{ __('Report information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Select the report\'s device') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="device" value="{{ __('Device') }}" />
            <select
                id="device" name="device"
                class="select"
                wire:model="device_id"
            >
                <option :value="-1" selected>{{ __("Select a device") }}</option>
                @foreach ($devices as $device)
                    <option value="{{ $device->id }}">{{ $device->name }}</option>
                @endforeach
            </select>
            <x-input-error for="device_id" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
