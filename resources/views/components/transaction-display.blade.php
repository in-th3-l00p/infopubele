<li @class([
                    "flex items-center justify-between",
                    "my-4 p-4 border-2 rounded-md shadow-md",
                    "hover:shadow-lg hover:bg-zinc-100 transition ease-in-out"
                ])>
    <div class="flex gap-4 items-center">
        <h3 class="text-lg font-semibold">{{ $transaction->created_at }}</h3>
        <a href="{{ route("slots.show", [
                            "device" => $device,
                            "slot" => $transaction->slot
                        ]) }}">
            @ {{ __("slot") }}
            <strong>{{ $transaction->slot->name }}</strong>,
            id <strong>{{ $transaction->slot->id }}</strong>
        </a>
    </div>
    <div>
        <p>{{ $transaction->amount }} m<sup>3</sup></p>
    </div>
</li>
