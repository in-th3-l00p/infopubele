<x-app-layout>
    <x-slot name="sticky_header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificari') }}
        </h2>
    </x-slot>

    <x-white-container>
        <ul>
            @php $exists = false; @endphp
            @foreach ($slots as $slot)
                @if(($slot->volume / $slot->max_volume * 100 )>=90)
                    <li>
                        <a
                            class="flex items-center justify-between my-4 p-4 border-2 rounded-md shadow-md hover:shadow-lg hover:bg-zinc-100 transition ease-in-out"
                            href="{{ route('user.devices.slots.show', [$slot->device()->first(), $slot]) }}"
                        >
                            <h1>{{__("Slotul")}} <b>{{$slot->name}}</b> {{__("a depasit la 90%")}}</h1>
                        </a>
                    </li>
                    @php $exists = true; @endphp
                @endif
            @endforeach
            @if (!$exists)
                <p>{{ __("Nu exista notificari") }}</p>
            @endif
        </ul>
    </x-white-container>

</x-app-layout>
