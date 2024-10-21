<x-form-section submit="updateDevice">
    <x-slot name="title">
        {{ __('Informațiile dispozitivului') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Vizualizează datele dispozitivului la care ești arondat') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nume') }}" />
            <x-input
                id="name"
                type="text"
                class="mt-1 block w-full"
                wire:model="state.name"
                required
                autocomplete="name"
                readonly
            />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="series" value="{{ __('Serie') }}" />
            <x-input
                id="series" type="text" class="mt-1 block w-full" wire:model="state.series" required autocomplete="series"
                readonly
            />
            <x-input-error for="series" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="city" value="{{ __('Oraș') }}" />
            <x-input
                id="city" type="text" class="mt-1 block w-full" wire:model="state.city" required autocomplete="city"
                readonly
            />
            <x-input-error for="city" class="mt-2" />
        </div>

        @if ($device->latitude)
            <div class="col-span-6 sm:col-span-4">
                <x-label for="latitude" value="{{ __('Latitudine') }}" />
                <x-input
                    id="latitude" type="text" class="mt-1 block w-full" wire:model="state.latitude" required autocomplete="latitude"
                    readonly
                />
                <x-input-error for="latitude" class="mt-2" />
            </div>
        @endif

        @if ($device->longitude)
            <div class="col-span-6 sm:col-span-4">
                <x-label for="longitude" value="{{ __('Longitudine') }}" />
                <x-input
                    id="longitude" type="text" class="mt-1 block w-full" wire:model="state.longitude" required autocomplete="longitude"
                    readonly
                />
                <x-input-error for="longitude" class="mt-2" />
            </div>
        @endif
    </x-slot>
</x-form-section>
