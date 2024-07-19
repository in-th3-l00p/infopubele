<x-form-section submit="createSlot">
    <x-slot name="title">
        {{ __('Informații despre slot') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Citește sau actualizează informațiile slotului.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nume') }}"/>
            <x-input
                id="name" type="text" class="mt-1 block w-full"
                required autocomplete="name"
                wire:model="name"
            />
            <x-input-error for="name" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="capacity" value="{{ __('Capacitate Maximă(L)') }}"/>
            <x-input
                id="capacity" type="number" class="mt-1 block w-full"
                required autocomplete="capacity"
                wire:model="capacity"
            />
            <x-input-error for="capacity" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="type" value="{{ __('Tipul Slotului') }}" />
            <select
                id="type"
                name="type"
                class="select"
                required
                wire:model="type"
            >
                <option value="">{{ __('Select Type') }}</option>
                <option value="paper/cardboard">Hartie/Carton</option>
                <option value="residual">Rezidual</option>
                <option value="biodegradable">Biodegradabil</option>
                <option value="plastic/metal">Plastic/Metal</option>
            </select>
            <x-input-error for="type" class="mt-2"/>
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
