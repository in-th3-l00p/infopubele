<x-form-section submit="store">
    <x-slot name="title">
        {{ __('Informații despre raport') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Selectează dispozitivul raportului') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="device" value="{{ __('Dispozitiv') }}" />
            <select
                id="device" name="device"
                class="select"
                wire:model="device_id"
            >
                <option :value="-1" selected>{{ __("Selectează un dispozitiv") }}</option>
                @foreach ($devices as $device)
                    @if(\Illuminate\Support\Facades\Auth::user()->role==='admin')
                    <option value="{{ $device->id }}">{{ $device->name }}</option>
                        @elseif(\Illuminate\Support\Facades\Auth::user()->role!=='user'&&$device->city===\Illuminate\Support\Facades\Auth::user()->city)
                        <option value="{{ $device->id }}">{{ $device->name }}</option>
                    @endif
                @endforeach
            </select>
            <x-input-error for="device_id" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Salvat.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled">
            {{ __('Salvează') }}
        </x-button>
    </x-slot>
</x-form-section>
