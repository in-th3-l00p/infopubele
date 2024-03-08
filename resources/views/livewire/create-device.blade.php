<x-form-section submit="createDevice">
    <x-slot name="title">
        {{ __('Informații despre dispozitiv') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Citește sau actualizează informațiile dispozitivului.') }}
    </x-slot>

    <x-slot name="form">
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
            <x-label for="city" value="{{ __('Oras') }}" />
            @php
            $cities = \App\Models\City::query()->orderBy("name")->get()
            @endphp
            <select
                id="city" name="city"
                class="select"
                wire:model="city"
            >
                @foreach($cities as $city)
                    <option value="{{$city->name}}" >{{$city->name}}</option>
                @endforeach
            </select>
            <x-input-error for="city" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Salvat.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Salveaza') }}
        </x-button>
    </x-slot>
</x-form-section>
