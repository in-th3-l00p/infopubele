@php use App\Models\Device;use Carbon\Carbon; @endphp
<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Utilizatori') }}
            </h2>

            <a href="{{ route('admin.users.create') }}">
                <x-button
                    :title="__('Creează')"
                >
                    <i class="fa-solid fa-plus"></i>
                </x-button>
            </a>
        </div>
    </x-slot>

    <x-layout.global-padding>
        <div>
            <ul role="list"
                class="divide-y divide-gray-100 overflow-hidden bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-md mb-4"
            >
                @foreach($users as $user)
                    <li class="relative flex justify-between gap-x-6 px-4 py-5 hover:bg-gray-50 sm:px-6">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <div class="flex items-center gap-1">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">
                                        <a href="{{ route("admin.users.edit", [ "user" => $user ]) }}">
                                            <span class="absolute inset-x-0 -top-px bottom-0"></span>
                                            {{ $user->name }}
                                        </a>
                                    </p>
                                    <div>-</div>
                                    <span class="flex text-xs leading-5">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </div>
                                <p class="mt-1 flex text-xs leading-5 text-gray-500">
                                    {{ $user->email }} - {{ $user->city }}
                                </p>
                            </div>
                        </div>
                        <div class="flex shrink-0 items-center gap-x-4">
                            <div class="hidden sm:flex sm:flex-col sm:items-end">
                                <p class="text-sm leading-6 text-gray-900">
                                    {{ __("Creat pe") }}
                                    : {{ Carbon::make($user->created_at)->timezone("Europe/Bucharest") }}
                                </p>
                            </div>
                            <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                 aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd"
                                      d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </li>
                @endforeach
            </ul>
            {{ $users->links() }}
        </div>
    </x-layout.global-padding>
</x-app-layout>
