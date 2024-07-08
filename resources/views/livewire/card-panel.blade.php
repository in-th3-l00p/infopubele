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

        <select
            id="user" name="user"
            class="select"
{{--            wire:model.fill="userId"--}}
{{--            wire:model.change="userId"--}}
            wire:model="userId"
        >
            <option value="null" disabled selected>{{ __("Alege utilizator") }}</option>
            @foreach ($unusedUsers as $user)
                <option value="{{ $user->id }}" >{{ $user->name }}</option>
            @endforeach
        </select>

        <x-button class="mt-4">
            {{ __("Adaugă") }}
        </x-button>
    </form>

    <ul class="mx-8">
        @forelse ($cards as $card)
            <li>
                <div
                    class="flex items-center justify-between my-4 p-4 border-2 rounded-md shadow-md hover:shadow-lg hover:bg-zinc-100 transition ease-in-out"
                >
                    <div class="flex items-center gap-4">
                        <h3 class="text-lg font-semibold">{{ $card->user->name }}</h3>
                        <p>{{ $card->uuid }}</p>
                    </div>

                    <div>
                        <form id="deleteForm" wire:submit="deleteCard({{ $card->id }})">
                            @csrf
                            @method("DELETE")

                            <x-danger-button type="submit" title="remove">{{__("Șterge")}}</x-danger-button>
                        </form>
                    </div>
                </div>
            </li>
        @empty
            <p>{{ __("Nu exista utilizatori arondați.") }}</p>
        @endforelse
    </ul>
</x-white-container>
