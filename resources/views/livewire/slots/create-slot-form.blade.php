<x-form-section submit="createSlot">
    <x-slot name="title">
        {{ __('Introdu informațiile') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Completează câmpurile necesare adăugarii slotului') }}
    </x-slot>

    <x-slot name="form">
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
            {{ __('Creează') }}
        </x-button>
    </x-slot>
</x-form-section>
