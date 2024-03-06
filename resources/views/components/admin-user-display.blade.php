<div
    class="my-4 p-4 border-2 rounded-md shadow-md hover:shadow-lg transition ease-in-out"
    x-data="{ showData: false }"
>
    <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold">{{ $user->name }}</h3>

        <div class="flex flex-wrap items-center gap-2">
            <button
                title="edit" class="btn"
                x-text="showData ? '{{ __("Hide")}}' : '{{ __("Show")}}'"
                x-on:click="showData = !showData"
            ></button>
            <a href="{{ route("users.edit", [ "user" => $user ]) }}">
                <x-button title="edit">{{ __("Edit") }}</x-button>
            </a>

            <form method="POST" action="{{ route("users.destroy", [
                "user" => $user
            ]) }}">
                @csrf
                @method("DELETE")

                <x-danger-button type="submit" title="remove">{{ __("Remove") }}</x-danger-button>
            </form>
        </div>
    </div>

    <div x-show="showData" class="mt-4">
        <p>{{ __("Name") }}: <strong>{{ $user->name }}</strong></p>
        <p>{{ __("Email") }}: <strong>{{ $user->email }}</strong></p>
        <p>{{ __("City") }}: <strong>{{ $user->city }}</strong></p>
        <p>{{ __("Role") }}: <strong>{{ $user->role }}</strong></p>
        @if ($user->device_id !== null)
            <p>{{ __("Device") }}: <strong>{{ $user->device->name }}</strong></p>
        @endif
    </div>
</div>
