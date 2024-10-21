<div class="white-container" wire:poll.750ms.visible.keep-alive>
    <div class="flex flex-wrap items-center justify-between sm:flex-nowrap mb-4">
        <div>
            <h3 class="text-base font-semibold leading-6 text-gray-900">{{ __("Tranzacții") }}</h3>
            <p class="mt-1 text-sm text-gray-500">{{ __("Vizualizează ultimele tranzacții efectuate") }}</p>
        </div>
    </div>

    @if ($transactions->count() > 0)
        <ul role="list" class="divide-y divide-gray-100 rounded-b-md overflow-hidden">
            @foreach($transactions as $transaction)
                <li class="relative flex justify-between gap-x-6 py-5 hover:bg-gray-50 px-4 sm:px-6">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                            <p class="text leading-6 text-gray-900">
                                {{ __("Slot") }} <span class="font-semibold">{{ $transaction->slot->name }}</span> - {{ __("Utilizator") }} <span class="font-semibold">{{ $transaction->card->user->name }}</span>
                            </p>
                            <p class="mt-1 flex text-sm leading-5 text-gray-500">
                                {{ $transaction->amount }} L
                            </p>
                            <p class="flex text-sm leading-5 text-gray-500">
                                {{ __("Card") }}: {{ $transaction->card->uuid }}
                            </p>
                        </div>
                    </div>
                    <div class="flex shrink-0 items-center gap-x-4">
                        <p>{{ \Carbon\Carbon::make($transaction->created_at)->timezone("Europe/Bucharest") }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="pt-4">
            {{ $transactions->links() }}
        </div>
    @else
        <p class="text-center pt-4">{{ __("Nu a fost efectuată nicio tranzacție") }}</p>
    @endif
</div>
