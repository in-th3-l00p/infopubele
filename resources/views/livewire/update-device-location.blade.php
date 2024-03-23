<x-form-section submit="updateLocation">
    <x-slot name="title">
        {{ __('Locația dispozitivului') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Actualizează locația dispozitivului.') }}
    </x-slot>

    <x-slot name="form">
        @session("locationSuccess")
            <div class="col-span-6 sm:col-span-4">
                <div
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded flex justify-between"
                    role="alert"
                >
                    <div>
                        <strong class="font-bold">{{ __("Dispozitiv modificat cu succes!") }}</strong>
                        <span class="block sm:inline">{{ __("Locația dispozitivului a fost modificat cu succes.") }}</span>
                    </div>

                    <x-button
                        type="button"
                        class="aspect-square"
                        wire:click="closeUpdated"
                    >
                        X
                    </x-button>
                </div>
            </div>
        @endsession

        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Latitudine') }}" />
            <x-input
                id="name" type="text" class="mt-1 block w-full"
                required autocomplete="latitude"
                wire:model="latitude"
            />
            <x-input-error for="latitude" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Longitudine') }}" />
            <x-input
                id="name" type="text" class="mt-1 block w-full"
                required autocomplete="longitude"
                wire:model="longitude"
            />
            <x-input-error for="longitude" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Salvat.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Salvează') }}
        </x-button>
    </x-slot>
</x-form-section>
