<x-app-layout>
    <x-slot name="sticky_header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dispozitiv') }}: <span class="font-bold">{{ $device->name }}</span> ({{ $device->id }})
        </h2>
    </x-slot>

    <x-white-container>
        <livewire:update-device :device="$device" />
    </x-white-container>

    <x-devices.users-display :device="$device" />

    <x-white-container>
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-lg font-semibold">{{ __("Token de acces") }}</h2>
            <form
                method="POST"
                action="{{ route("devices.tokens.create", [
                    "device" => $device
                ]) }}"
            >
                @csrf

                <x-button class="aspect-square">
                    <img src="/icons/plus.svg" alt="plus" class="w-4 invert">
                </x-button>
            </form>

        </div>

        <ul class="ml-8">
            @forelse ($tokens as $token)
                <li
                    @class([
                        "block md:flex items-center justify-between my-4 p-4 border-2 rounded-md shadow-md",
                        "hover:shadow-lg hover:bg-zinc-100 transition ease-in-out gap-8"
                    ])
                    x-data="{ showToken: false }"
                >
                    <div class="flex-grow">
                        <h3 class="break-all text-lg font-semibold" x-show="showToken">{{ $token->token }}</h3>
                        <div
                            class="w-full p-4 bg-zinc-600 animate-pulse rounded-lg max-w-[400px] hover:cursor-help"
                            title="{{ __("Apasa pe butonul \"Arată\" pentru a vedea tokenul") }}"
                            x-show="!showToken"
                        ></div>
                    </div>

                    <div class="flex items-center gap-4 pt-4 md:pt-0">
                        <button
                            type="button"
                            class="btn "
                            @click="showToken = !showToken"
                            x-text="showToken ? '{{ __("Ascunde") }}' : '{{ __("Arată") }}'"
                        >
                        </button>


                        <form method="POST" action="{{ route("devices.tokens.delete", [
                            "device" => $device,
                            "token" => $token
                        ]) }}">
                            @csrf
                            @method("DELETE")

                            <x-danger-button type="submit" title="remove">{{__("Șterge")}}</x-danger-button>
                        </form>
                    </div>
                </li>
            @empty
                <p>{{ __("Nu sunt tokenuri create.") }}</p>
            @endforelse
        </ul>

        {{ $tokens->links() }}
    </x-white-container>

    <x-device-map :device="$device" />

    <x-white-container>
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-lg font-semibold">{{ __("Sloturi") }}</h2>
            <a href="{{ route('devices.slots.create', ['device' => $device]) }}">
                <x-button class="aspect-square">
                    <img src="/icons/plus.svg" alt="plus" class="w-4 invert">
                </x-button>
            </a>
        </div>

        <ul class="ml-8">
            @forelse ($slots as $slot)
                <li>
                    <a
                        class="flex items-center justify-between my-4 p-4 border-2 rounded-md shadow-md hover:shadow-lg hover:bg-zinc-100 transition ease-in-out"
                        href="{{ route('slots.show', $slot) }}"
                    >
                        <div>
                            <h3 class="text-lg font-semibold">{{ $slot->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $slot->city }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">{{ number_format($slot->volume / $slot->max_volume * 100, 2) }}%</p>
                        </div>
                    </a>
                </li>
            @empty
                <p>{{ __("Nu exista sloturi configurate.") }}</p>
            @endforelse
        </ul>

        {{ $slots->links() }}
    </x-white-container>

    <x-slot-visualizer :device="$device" />

    <x-white-container>
        <h2 class="text-lg font-semibold mb-8">{{ __("Tranzacții") }}</h2>

        <ul class="ml-8">
            @forelse ($transactions as $transaction)
                <x-transaction-display
                    :transaction="$transaction"
                    :device="$device"
                />
            @empty
                <p>{{ __("Nu exista tranzacții.") }}</p>
            @endforelse
        </ul>
    </x-white-container>
</x-app-layout>
