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
            @if(Request::user()->role==='admin')
                <a href="{{ route("users.edit", [ "user" => $user ]) }}">
                    <x-button title="edit">{{ __("Editează") }}</x-button>
                </a>
                @elseif(Request::user()->role==='uat')
                <a href="{{ route("uat.users.edit", [ "user" => $user ]) }}">
                    <x-button title="edit">{{ __("Editează") }}</x-button>
                </a>
            @elseif(Request::user()->role==='operator')
                <a href="{{ route("operator.users.edit", [ "user" => $user ]) }}">
                    <x-button title="edit">{{ __("Editează") }}</x-button>
                </a>
            @endif
            @if(Request::user()->role==='admin')
                <form id="deleteForm" method="POST" action="{{ route("users.destroy", [
                "user" => $user
            ]) }}">
                    @csrf
                    @method("DELETE")

                    <x-danger-button type="submit" title="remove">{{ __("Șterge") }}</x-danger-button>
                </form>
            @elseif(Request::user()->role==='uat')
                <form id="deleteForm" method="POST" action="{{ route("uat.users.destroy", [
                "user" => $user
            ]) }}">
                    @csrf
                    @method("DELETE")

                    <x-danger-button type="submit" title="remove">{{ __("Șterge") }}</x-danger-button>
                </form>
            @elseif(Request::user()->role==='operator')
                <form id="deleteForm" method="POST" action="{{ route("operator.users.destroy", [
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
        @if($user->type === "legal-entity")
            <p>{{ __("Tip") }}: <strong>{{__("Persoana Juridica")}}</strong></p>
        @endif
        @if($user->type === "homeowners-association")
            <p>{{ __("Tip") }}: <strong>{{__("Asociație de Proprietari")}}</strong></p>
        @endif
        @if ($user->type === "individual")
            <p>{{ __("Tip") }}: <strong>{{__("Persoana Fizica")}}</strong></p>
        @endif
        @if ($user->device_id !== null)
            <p>{{ __("Dispozitiv") }}: <strong>{{ $user->device->name }}</strong></p>
        @endif
    </div>
</div>
