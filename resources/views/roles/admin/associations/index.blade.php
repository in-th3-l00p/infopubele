<x-app-layout>
    <x-slot name="sticky_header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Asociatii') }}
        </h2>
    </x-slot>

    <x-white-container>
        <div class="w-full flex gap-8 mb-8">
            <a href="{{ route("associations.create") }}">
                <x-button class="aspect-square">
                    <img src="/icons/plus.svg" alt="plus" class="w-4 invert">
                </x-button>
            </a>
        </div>
        @forelse ($associations as $association)
            @php
            $device=\App\Models\Device::find($association->device_id);
            @endphp
            <a
                class="flex items-center justify-between my-4 p-4 border-2 rounded-md shadow-md hover:shadow-lg hover:bg-zinc-100 transition ease-in-out"
                href="{{ route('associations.show', $association) }}"
            >
                <div>
                    <h3 class="text-lg font-semibold">{{ $association->city }}</h3>
                    <p class="text-sm text-gray-500">{{ $association->address }}</p>
                </div>

                <div class="flex gap-2 my-auto items-center">
                    <p class="text-sm text-gray-500">{{ __("Dispozitiv") . ": " . $device->name }}</p>
                    <form id="deleteForm"
                          method="POST"
                          action="{{ route("associations.destroy", $association) }}"
                    >
                        @csrf
                        @method("DELETE")

                        <x-danger-button type="submit" onclick="return confirm('Are you sure you want to delete?')">
                            {{ __("Șterge") }}
                        </x-danger-button>
                    </form>
                </div>
            </a>

        @empty
            <p class="text-center">{{ __("Nu s-au găsit dispozitive.") }}</p>
        @endforelse

        {{ $associations->links() }}
    </x-white-container>
</x-app-layout>
