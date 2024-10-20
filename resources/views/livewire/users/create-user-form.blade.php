<x-form-section submit="createUser">
    <x-slot name="title">
        {{ __('Introdu informațiile') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Completează câmpurile necesare creeri utilizatorului') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nume') }}"/>
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required
                     autocomplete="name"/>
            <x-input-error for="name" class="mt-2"/>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}"/>
            <x-input id="email" type="text" class="mt-1 block w-full" wire:model="state.email" required
                     autocomplete="email"/>
            <x-input-error for="email" class="mt-2"/>
        </div>
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
        <div class="col-span-6 sm:col-span-4">
            <x-label for="city" value="{{ __('Oraș') }}"/>
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
            <x-input-error for="city" class="mt-2"/>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="city" value="{{ __('Oraș') }}"/>
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
            <x-input-error for="city" class="mt-2"/>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="role" value="{{ __('Rol') }}"/>
            <x-select
                id="role"
                type="text"
                class="mt-1 block w-full"
                wire:model="state.role"
                required
                autocomplete="role"
            >
                <option value="">{{ __('Selectează rolul') }}</option>
                @foreach(config("constants.roles") as $role)
                    <option value="{{ $role }}">{{ ucfirst($role) }}</option>
                @endforeach
            </x-select>
            <x-input-error for="role" class="mt-2"/>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-button wire:loading.attr="disabled">
            {{ __('Creează') }}
        </x-button>
    </x-slot>
</x-form-section>
