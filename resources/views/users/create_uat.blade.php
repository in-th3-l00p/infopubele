<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route("users.index") }}">
                <x-button :title="__('Back')">Back</x-button>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Operator') }}
            </h2>
        </div>
    </x-slot>

    <x-white-container>
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="device" value="{{ __('Device') }}" />
                <select
                    id="device"
                    name="device"
                    class="select"
                >
                    @foreach($devices as $device)
                        <option value="{{$device}}" selected>{{$device->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-label for="city" value="{{ __('City') }}" />
                <select
                    id="city" name="city"
                    class="select"
                >
                    <option value="New York" selected>New York</option>
                    <option value="San Francisco">San Francisco</option>
                    <option value="Austin">Austin</option>
                    <option value="Seattle">Seattle</option>
                </select>
                <x-input-error for="city" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-button>{{ __('Create') }}</x-button>
            </div>
        </form>
    </x-white-container>
</x-app-layout>
