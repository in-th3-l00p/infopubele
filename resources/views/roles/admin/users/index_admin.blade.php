<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <x-white-container>
        <div class="w-full flex gap-8 mb-8">
            <a href="{{ route("users.create") }}">
                <x-button class="aspect-square">
                    <img src="/icons/plus.svg" alt="plus" class="w-4 invert">
                </x-button>
            </a>
        </div>

        @forelse ($users as $user)
            <x-admin-user-display :user="$user"/>
        @empty
            <p class="text-center">{{ __("No users found.") }}</p>
        @endforelse

        {{ $users->links() }}
    </x-white-container>
</x-app-layout>
