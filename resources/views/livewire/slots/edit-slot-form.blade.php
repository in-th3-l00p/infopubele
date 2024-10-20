<x-form-section submit="updateSlot">
    <x-slot name="title">
        {{ __('Modifică informațiile') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Completează câmpurile și trimite formularul pentru a modifica datele slotului') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="id" value="{{ __('Id') }}" />
            <x-input
                id="id"
                type="text"
                class="mt-1 block w-full"
                :value="$slot->id"
                readonly
                disabled
            />
            <x-input-error for="id" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nume') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="max_volume" value="{{ __('Volum maxim') }}" />
            <x-input id="max_volume" type="text" class="mt-1 block w-full" wire:model="state.max_volume" required autocomplete="max_volume" />
            <x-input-error for="max_volume" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-button wire:loading.attr="disabled">
            {{ __('Modifică') }}
        </x-button>
    </x-slot>
</x-form-section>
