<div
    class="flex items-center justify-between my-4 p-4 border-2 rounded-md shadow-md hover:shadow-lg transition ease-in-out"
>
    <h3 class="text-lg font-semibold">{{ $user->name }}</h3>

    <div>
        <a href="{{ route("users.edit", [ "user" => $user ]) }}">
            <x-button title="edit">{{ __("Edit") }}</x-button>
        </a>
        <x-danger-button title="remove">{{ __("Remove") }}</x-danger-button>
    </div>
</div>
