<x-white-container>
    <h2 class="text-lg font-semibold">{{ __("Carduri") }}</h2>

    <form
        class="my-8 py-4 border-t border-b mx-8"
        wire:submit="createCard"
    >
        @csrf
        @method("PUT")

        <h2 class="text-lg mb-4">{{ __("Adaugă card") }}</h2>
        <x-label for="user" value="{{ __('Utilizator') }}" />

        @php $unusedUsers = \App\Models\User::query()->whereNull("device_id")->where("role", "user")->where("city",$device->city)->get(); @endphp
        <select
            id="user" name="user"
            class="select"
            wire:model.fill="userId"
            wire:model.change="userId"
            wire:model="userId"
        >
            <option value="" disabled selected>{{ __("Alege utilizator") }}</option>
            @foreach ($unusedUsers as $user)
                <option value="{{ $user->id }}" >{{ $user->name }}</option>
            @endforeach
        </select>

        <x-button class="mt-4">
            {{ __("Adaugă") }}
        </x-button>
    </form>

    <ul class="mx-8">
        @php
        $cards = $device->cards;
        @endphp
        @forelse ($cards as $card)
            <li>
                <livewire:card-display :card="$card" />
            </li>
        @empty
            <p>{{ __("Nu exista utilizatori arondați.") }}</p>
        @endforelse
    </ul>
</x-white-container>
