<x-form-section submit="createAssociation">
    <x-slot name="title">
        {{ __('Creaza asociatie') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Citește sau actualizează informațiile asociatiei.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="address" value="{{ __('Adresă') }}" />
            <x-input
                id="address" type="text" class="mt-1 block w-full"
                required autocomplete="address"
                wire:model="address"
            />
            <x-input-error for="address" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="city" value="{{ __('Oraș') }}" />
            @php
                $cities = \App\Models\City::query()->orderBy("name")->get()
            @endphp
            <select
                id="city" name="city"
                class="select"
                wire:model="city"
            >
                <option  value="" >{{ __('Alege orașul') }}</option>
                @foreach($cities as $city)
                    <option value="{{$city->name}}" >{{$city->name}}</option>
                @endforeach
            </select>
            <x-input-error for="city" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="device_id" value="{{ __('Dispozitiv') }}" />
            @php
                $devices = \App\Models\Device::query()->orderBy("name")->get()
            @endphp
            <select
                id="device_id" name="device_id"
                class="select"
                wire:model="device_id"
            >
                <option  value="" >{{ __('Alege dispozitivul') }}</option>
                @foreach($devices as $device)
                    <option value="{{$device->id}}" >{{$device->name}}</option>
                @endforeach
            </select>
            <x-input-error for="device_id" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="fiscal_code" value="{{ __('Cod fiscal') }}" />
            <x-input
                id="fiscal_code" type="text" class="mt-1 block w-full"
                required autocomplete="fiscal_code"
                wire:model="fiscal_code"
            />
            <x-input-error for="inhabitants" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="person_name" value="{{ __('Nume persoană de contact') }}" />
            <x-input
                id="person_name" type="text" class="mt-1 block w-full"
                required autocomplete="person_name"
                wire:model="person_name"
            />
            <x-input-error for="person_name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="phone" value="{{ __('Telefon') }}" />
            <x-input
                id="phone" type="text" class="mt-1 block w-full"
                required autocomplete="phone"
                wire:model="phone"
            />
            <x-input-error for="phone" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input
                id="email" type="text" class="mt-1 block w-full"
                required autocomplete="email"
                wire:model="email"
            />
            <x-input-error for="email" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="inhabitants" value="{{ __('Număr locuitori') }}" />
            <x-input
                id="inhabitants" type="text" class="mt-1 block w-full"
                required autocomplete="inhabitants"
                wire:model="inhabitants"
            />
            <x-input-error for="inhabitants" class="mt-2" />
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
