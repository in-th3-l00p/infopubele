<div
    class="flex items-center justify-between my-4 p-4 border-2 rounded-md shadow-md hover:shadow-lg hover:bg-zinc-100 transition ease-in-out"
>
    <div class="flex items-center gap-4">
        <h3 class="text-lg font-semibold">{{ $card->user->name }}</h3>
        <p>{{ $card->uuid }}</p>
    </div>

    <div>
        <form id="deleteForm" wire:submit="deleteCard">
            @csrf
            @method("DELETE")

            <x-danger-button type="submit" title="remove">{{__("Șterge")}}</x-danger-button>
        </form>
    </div>
</div>
