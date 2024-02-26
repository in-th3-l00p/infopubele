<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update User') . ": " . $user->name  }}
        </h2>
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
                <x-label for="role" value="{{ __('Role') }}" />
                <select
                    id="role"
                    name="role"
                    class="select"
                >
                    <option value="admin" @selected($user->role === "admin")>Admin</option>
                    <option value="user" @selected($user->role === "user")>User</option>
                    <option value="generator" @selected($user->role === "generator")>Generator</option>
                    <option value="uat" @selected($user->role === "uat")>UAT</option>
                    <option value="operator" @selected($user->role === "operator")>Operator</option>
                </select>
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

            <div class="flex items-center justify-center mt-4">
                <x-button>{{ __('Edit') }}</x-button>
            </div>
        </form>
    </x-white-container>
</x-app-layout>
