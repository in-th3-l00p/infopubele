@php use App\Models\Device; @endphp
<x-form-section submit="createReport">
    <x-slot name="title">
        {{ __('Selectează dispozitiv') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Alege un dispozitiv în următorul formular') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="device" value="{{ __('Dispozitiv') }}"/>
            <x-select
                id="device"
                type="text"
                class="mt-1 block w-full"
                wire:model="device"
                required
                autocomplete="device"
            >
                <option value="">{{ __('Selectează dispozitivul') }}</option>
                @foreach (Device::query()->orderBy('name')->get() as $device)
                    <option value="{{ $device->id }}">{{ $device->name }}</option>
                @endforeach
            </x-select>
            <x-input-error for="device" class="mt-2"/>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-button wire:loading.attr="disabled">
            {{ __('Creează') }}
        </x-button>
    </x-slot>
</x-form-section>
