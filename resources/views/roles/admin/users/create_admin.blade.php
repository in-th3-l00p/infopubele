<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route("users.index") }}">
                <x-button :title="__('Back')">Back</x-button>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Creeaza Utilizator') }}
            </h2>
        </div>
    </x-slot>

    <x-white-container>
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Nume') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="role" value="{{ __('Rol') }}" />
                <select
                    id="role"
                    name="role"
                    class="select"
                >
                    <option value="admin" selected>Admin</option>
                    <option value="user">User</option>
                    <option value="generator">Generator</option>
                    <option value="uat">UAT</option>
                    <option value="operator">Operator</option>
                </select>
            </div>

            <div class="mt-4">
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

            <div class="mt-4">
                <x-label for="password" value="{{ __('Parola') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmare Parola') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-button>{{ __('Creeaza') }}</x-button>
            </div>
        </form>
    </x-white-container>
</x-app-layout>
