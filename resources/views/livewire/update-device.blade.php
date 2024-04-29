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
                <x-bladewind.alert type="success">
                    {{ __("Dispozitiv modificat cu succes!") }}
                </x-bladewind.alert>
            </div>
        @endif
            <div class="col-span-6 sm:col-span-4">
                <label for="id">{{ __("ID") }}</label>
                <x-input
                    id="id" type="text" class="mt-1 block w-full"
                    required autocomplete="id"
                    disabled value="{{ $device->id }}"
                />
            </div>


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
                    if (auth()->user()->role==="uat")
                        $city = \App\Models\City::query()->where("name","=", auth()->user()->city)->orderBy("name")->first();
                    else
                        $cities = \App\Models\City::query()->orderBy("name")->get();
                @endphp
                @if(auth()->user()->role==="uat")
                    <x-input
                        id="city" type="text" class="mt-1 block w-full"
                        disabled value="{{$city->name}}"
                        required autocomplete="city"
                    >
                    </x-input>
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
