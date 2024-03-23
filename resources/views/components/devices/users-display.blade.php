<x-white-container>
    <h2 class="text-lg font-semibold">{{ __("Utilizatori arondați") }}</h2>

    <form
        class="my-8 py-4 border-t border-b mx-8"
        method="POST"
        action="{{ route("users.devices.assign", [
            "device" => $device,
        ]) }}"
    >
        @csrf
        @method("PUT")

        <h2 class="text-lg mb-4">{{ __("Adaugă utilizator") }}</h2>
        <x-label for="user" value="{{ __('Utilizator') }}" />

        @php $unusedUsers = \App\Models\User::query()->whereNull("device_id")->where("role", "user")->get(); @endphp
        <select
            id="user" name="user"
            class="select"
        >
            <option value="" disabled selected>{{ __("Alege utilizator") }}</option>
            @foreach ($unusedUsers as $user)
                <option value="{{ $user->id }}" >{{ $user->name }}</option>
            @endforeach
        </select>
        <x-input-error for="user" class="mt-2" />

        <x-button class="mt-4">
            {{ __("Adaugă") }}
        </x-button>
    </form>

    <ul class="mx-8">
        @forelse ($users as $user)
            <li>
                <div
                    class="flex items-center justify-between my-4 p-4 border-2 rounded-md shadow-md hover:shadow-lg hover:bg-zinc-100 transition ease-in-out"
                >
                    <div class="flex items-center gap-4">
                        <h3 class="text-lg font-semibold">{{ $user->name }}</h3>
                        <p>{{ $user->role }}</p>
                    </div>

                    <div>
                        <form method="POST" action="{{ route("users.devices.remove", [
                            "user" => $user,
                        ]) }}">
                            @csrf
                            @method("DELETE")

                            <x-danger-button type="submit" title="remove">{{__("Șterge")}}</x-danger-button>
                        </form>
                    </div>
                </div>
            </li>
        @empty
            <p>{{ __("Nu exista utilizatori arondați.") }}</p>
        @endforelse
    </ul>
</x-white-container>
