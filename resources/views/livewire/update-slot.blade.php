<x-form-section submit="updateSlot">
    <x-slot name="title">
        {{ __('Informațiile Slotului') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Citește sau actualizează informațiile slotului.') }}
    </x-slot>

    <x-slot name="form">
        @if ($updated)
            <div class="col-span-6 sm:col-span-4">
                <x-bladewind.alert type="success">
                    {{ __("Slot modificat cu succes!") }}
                </x-bladewind.alert>
            </div>
        @endif
        <div class="col-span-6 sm:col-span-4">
            <label for="id">{{ __("ID") }}</label>
            <x-input
                id="id" type="text" class="mt-1 block w-full"
                required autocomplete="id"
                disabled value="{{ $slot->id }}"
            />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nume') }}" />
            <x-input
                id="name" type="text" class="mt-1 block w-full"
                required autocomplete="name"
                wire:model="name"
            />
            <x-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="capacity" value="{{ __('Capacitate Maximă (L)') }}" />
            <x-input
                id="capacity" type="number" class="mt-1 block w-full"
                required autocomplete="capacity"
                wire:model="capacity"
            />
            <x-input-error for="capacity" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Salvat') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Salvează') }}
        </x-button>
    </x-slot>
</x-form-section>
