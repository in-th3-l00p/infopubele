<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Modifica Parola') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Asigura-te ca parola este una lunga si greu de ghicit.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" value="{{ __('Parola curenta') }}" />
            <x-input id="current_password" type="password" class="mt-1 block w-full" wire:model="current" autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password" value="{{ __('Parola noua') }}" />
            <x-input id="password" type="password" class="mt-1 block w-full" wire:model="password" autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation" value="{{ __('Confirma parola noua') }}" />
            <x-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model="password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Salvat.') }}
        </x-action-message>

        <x-button>
            {{ __('Salvează') }}
        </x-button>
    </x-slot>
</x-form-section>
