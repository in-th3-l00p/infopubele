<div class="white-container">
    <div class="pb-4">
        <h3 class="text-base font-semibold leading-6 text-gray-900">{{ __("Card") }}</h3>
        <p class="mt-1 text-sm text-gray-500">{{ __("Vizualizează cardul tău") }}</p>
    </div>
    <div id="cards" role="list" class="divide-y divide-gray-100 rounded-b-md overflow-hidden">
        <div class="relative flex justify-between gap-x-6 py-5 hover:bg-gray-50 px-4 sm:px-6">
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
        </div>
    </div>
</div>
