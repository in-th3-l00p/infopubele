<div
    class="flex items-center justify-between my-4 p-4 border-2 rounded-md shadow-md hover:shadow-lg transition ease-in-out"
    href="{{ route('users.show', $user) }}"
>
    <h3 class="text-lg font-semibold">{{ $user->name }}</h3>

    <div>
        <x-button title="edit">{{ __("Edit") }}</x-button>
        <x-danger-button title="remove">{{ __("Remove") }}</x-danger-button>
    </div>
</div>
