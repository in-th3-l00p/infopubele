<x-form-section submit="changePassword">
    <x-slot name="title">
        {{ __('Schimbă parola') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Introdu și confirmă noua parolă') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="password" value="{{ __('Parolă') }}"/>
            <x-input id="password" type="password" class="mt-1 block w-full" wire:model="state.password" required
                     autocomplete="password"/>
            <x-input-error for="password" class="mt-2"/>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation" value="{{ __('Confirmare parolă') }}"/>
            <x-input id="password_confirmation" type="password" class="mt-1 block w-full"
                     wire:model="state.password_confirmation" required autocomplete="password_confirmation"/>
            <x-input-error for="password_confirmation" class="mt-2"/>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Salvat.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled">
            {{ __('Schimbă') }}
        </x-button>
    </x-slot>
</x-form-section>
