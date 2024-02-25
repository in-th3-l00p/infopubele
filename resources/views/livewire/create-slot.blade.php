<x-form-section submit="createSlot">
    <x-slot name="title">
        {{ __('Slot Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Read or update the slot\'s information') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input
                id="name" type="text" class="mt-1 block w-full"
                required autocomplete="name"
                wire:model="name"
            />
            <x-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="capacity" value="{{ __('Max Capacity') }}" />
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
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
