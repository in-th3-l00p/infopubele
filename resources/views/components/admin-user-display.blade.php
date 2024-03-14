<div
    class="my-4 p-4 border-2 rounded-md shadow-md hover:shadow-lg transition ease-in-out"
    x-data="{ showData: false }"
>
    <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold">{{ $user->name }}</h3>

        <div class="flex flex-wrap items-center gap-2">
            <button
                title="edit" class="btn"
                x-text="showData ? '{{ __("Ascunde")}}' : '{{ __("Arată")}}'"
                x-on:click="showData = !showData"
            ></button>
            <a href="{{ route("users.edit", [ "user" => $user ]) }}">
                <x-button title="edit">{{ __("Editează") }}</x-button>
            </a>
            @if(Request::user()->role==='admin')
                <form method="POST" action="{{ route("users.destroy", [
                "user" => $user
            ]) }}">
                    @csrf
                    @method("DELETE")

                    <x-danger-button type="submit" title="remove">{{ __("Șterge") }}</x-danger-button>
                </form>
            @elseif(Request::user()->role==='uat')
                <form method="POST" action="{{ route("uat.users.destroy", [
                "user" => $user
            ]) }}">
                    @csrf
                    @method("DELETE")

                    <x-danger-button type="submit" title="remove">{{ __("Șterge") }}</x-danger-button>
                </form>
            @endif

        </div>
    </div>

    <div x-show="showData" class="mt-4">
        <p>{{ __("Nume") }}: <strong>{{ $user->name }}</strong></p>
        <p>{{ __("Email") }}: <strong>{{ $user->email }}</strong></p>
        <p>{{ __("Oraș") }}: <strong>{{ $user->city }}</strong></p>
        <p>{{ __("Rol") }}: <strong>{{ $user->role }}</strong></p>
        @if ($user->device_id !== null)
            <p>{{ __("Dispozitiv") }}: <strong>{{ $user->device->name }}</strong></p>
        @endif
    </div>
</div>
