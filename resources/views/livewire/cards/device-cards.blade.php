<div class="white-container" id="cards">
    <div class="pb-4">
        <h3 class="text-base font-semibold leading-6 text-gray-900">{{ __("Carduri") }}</h3>
        <p class="mt-1 text-sm text-gray-500">{{ __("Vizualizează sau creează cardurile dispozitivului") }}</p>
    </div>

    <form
        wire:submit="createCard"
        class="py-4 space-y-4"
    >
        <p>{{ __("Creează un card") }}:</p>

        <div>
            <x-label for="user" value="{{ __('Utilizator') }}" />
            <x-select
                id="user"
                type="text"
                class="mt-1 block w-full"
                wire:model="user"
                required
                autocomplete="user"
            >
                <option value="">{{ __('Selectează utilizatorul') }}</option>
                @foreach($cardPossibleUsers as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </x-select>
            <x-input-error for="user" class="mt-2" />
        </div>

        <div class="flex items-center">
            <x-button wire:loading.attr="disabled">
                {{ __('Creează') }}
            </x-button>

            <x-action-message class="ms-3" on="saved">
                {{ __('Salvat.') }}
            </x-action-message>
        </div>
    </form>

    @if ($cards->count() > 0)
        <ul role="list" class="divide-y divide-gray-100 rounded-b-md overflow-hidden">
            @foreach($cards as $card)
                <li class="relative flex justify-between gap-x-6 py-5 hover:bg-gray-50 px-4 sm:px-6">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">
                                {{ __("Utilizator") }} {{ $card->user->name }}
                            </p>
                            <p class="mt-1 flex text-xs leading-5 text-gray-500">
                                {{ $card->uuid }}
                            </p>
                        </div>
                    </div>

                    <div>
                        <x-button
                            wire:click="deleteCard({{ $card->id }})"
                            type="button"
                            class="!bg-red-600"
                            :title="__('Șterge cardul')"
                        >
                            <i class="fa-solid fa-trash"></i>
                        </x-button>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="pt-4">
            {{ $cards->links(data: ['scrollTo' => '#cards']) }}
        </div>
    @else
        <p class="text-center pt-4">{{ __("Dispozitivul nu are niciun card") }}</p>
    @endif
</div>
