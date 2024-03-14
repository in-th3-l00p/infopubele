<x-form-section submit="updateDevice">
    <x-slot name="title">
        {{ __('Informații despre Dispozitiv') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Completează cu informațiile inițiale ale dispozitivului.') }}
    </x-slot>

    <x-slot name="form">
        @if ($updated)
            <div class="col-span-6 sm:col-span-4">
                <div
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded flex justify-between"
                    role="alert"
                >
                    <div>
                        <strong class="font-bold">{{ __("Dispozitiv modifica cu succes!") }}</strong>
                        <span class="block sm:inline">{{ __("Dispozitivul a fost modificat cu succes.") }}</span>
                    </div>

                    <x-button
                        type="button"
                        class="aspect-square"
                        wire:click="closeUpdated"
                    >
                        X
                    </x-button>
                </div>
            </div>
        @endif

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
            <x-label for="city" value="{{ __('Oraș') }}" />
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
            {{ __('Salvează') }}
        </x-button>
    </x-slot>
</x-form-section>
