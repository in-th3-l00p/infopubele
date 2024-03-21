<x-app-layout>
    <x-slot name="sticky_header">
        <div class="flex items-center gap-4">
            <a href="{{ route("uat.users.index") }}">
                <x-button :title="__('Back')">Back</x-button>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Creaza operator') }}
            </h2>
        </div>
    </x-slot>

    <x-white-container>
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('uat.users.store') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Nume') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4>
                <x-label for="city" value="{{ __('Oras') }}" />
            <x-input
                id="id" type="text" class="mt-1 block w-full"
                required autocomplete="id"
                disabled value="{{ Request::user()->city}}"
            />
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
                <x-button>{{ __('Creează') }}</x-button>
            </div>
        </form>
    </x-white-container>
</x-app-layout>
