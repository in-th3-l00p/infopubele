<x-form-section submit="updateDevice">
    <x-slot name="title">
        {{ __('Modifică locația') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Introdu o nouă locație pentru dispozitiv') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="latitude" value="{{ __('Latitudine') }}" />
            <x-input id="latitude" type="text" class="mt-1 block w-full" wire:model="state.latitude" required autocomplete="latitude" />
            <x-input-error for="latitude" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="longitude" value="{{ __('Longitudine') }}" />
            <x-input id="longitude" type="text" class="mt-1 block w-full" wire:model="state.longitude" required autocomplete="longitude" />
            <x-input-error for="longitude" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-button wire:loading.attr="disabled">
            {{ __('Modifică') }}
        </x-button>
    </x-slot>
</x-form-section>
