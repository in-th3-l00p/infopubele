<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route("users.index") }}">
                <x-button :title="__('Back')">Back</x-button>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Update User') . ": " . $user->name  }}
            </h2>
        </div>
    </x-slot>

    <x-white-container>
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('users.update', [
            "user" => $user
        ]) }}">
            @csrf
            @method("PUT")

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input
                    id="name"
                    class="block mt-1 w-full"
                    type="text"
                    name="name"
                    :value="$user->name"
                    required autofocus
                    autocomplete="name"
                />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input
                    id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    :value="$user->email"
                    required
                    autocomplete="username"
                />
            </div>

            <div class="mt-4">
                <x-label for="city" value="{{ __('City') }}" />
                <select
                    id="city"
                    name="city"
                    class="select"
                >
                    <option value="New York" @selected($user->city === "New York")>New York</option>
                    <option value="San Francisco" @selected($user->city === "San Francisco")>San Francisco</option>
                    <option value="Austin" @selected($user->city === "Austin")>Austin</option>
                    <option value="Seattle" @selected($user->city === "New York")>New York</option>
                </select>
                <x-input-error for="city" class="mt-2" />
            </div>

            @if ($user->role === "user")
                <div class="mt-4">
                    <x-label for="device_id" value="{{ __('Device') }}" />
                    <select name="device_id" id="device_id" class="select">
                        <option value="" @selected($user->device === null)>
                            {{ __("No device") }}
                        </option>

                        @foreach ($devices as $device)
                            <option
                                value="{{ $device->id }}"
                                @selected($user->device_id === $device->id)
                            >
                                {{ $device->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="flex items-center justify-center mt-4">
                <x-button>{{ __('Edit') }}</x-button>
            </div>
        </form>
    </x-white-container>
</x-app-layout>