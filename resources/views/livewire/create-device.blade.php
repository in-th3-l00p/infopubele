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
            <x-label for="series" value="{{ __('Serie') }}" />
            <x-input
                id="series" type="text" class="mt-1 block w-full"
                required autocomplete="series"
                wire:model="series"
            />
            <x-input-error for="series" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            @if ($error)
                <div class="text-red-500 pb-4">{{ $error }}</div>
            @endif
            <x-label for="city" value="{{ __('Oraș') }}" />
            @php
            if (auth()->user()->role==="uat")
                $city = auth()->user()->city;
            else
                $cities = \App\Models\City::query()->orderBy("name")->get();
            @endphp
            @if(auth()->user()->role==="uat")
                @if($city===null)
                    <x-input
                        id="city" type="text" class="mt-1 block w-full"
                        disabled value="Nu aveti oras arondat"
                        required autocomplete="city"
                    >
                    </x-input>
                    @else
                    <x-input
                        id="city" type="text" class="mt-1 block w-full"
                        disabled value="{{$city}}"
                        required autocomplete="city"
                    >
                    </x-input>
                @endif
            @elseif(auth()->user()->role==="admin")
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
            @endif
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
