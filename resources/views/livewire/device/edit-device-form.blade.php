<x-form-section submit="updateDevice">
    <x-slot name="title">
        {{ __('Modifică informațiile') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Completează câmpurile și trimite formularul pentru a modifica datele dispozitivlui') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nume') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="series" value="{{ __('Serie') }}" />
            <x-input id="series" type="text" class="mt-1 block w-full" wire:model="state.series" required autocomplete="series" />
            <x-input-error for="series" class="mt-2" />
        </div>

        @if (auth()->user()->role === "admin")
            <div class="col-span-6 sm:col-span-4">
                <x-label for="city" value="{{ __('Oraș') }}" />
                <x-select
                    id="city"
                    type="text"
                    class="mt-1 block w-full"
                    wire:model="state.city"
                    required
                    autocomplete="city"
                >
                    <option value="">{{ __('Selectează orașul') }}</option>
                    @foreach(config("cities") as $city)
                        <option value="{{ $city }}">{{ $city }}</option>
                    @endforeach
                </x-select>
                <x-input-error for="city" class="mt-2" />
            </div>
        @endif
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Salvat.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled">
            {{ __('Modifică') }}
        </x-button>
    </x-slot>
</x-form-section>
