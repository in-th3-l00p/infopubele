<x-app-layout>
    <div class=" min-h-screen flex-col flex">
        <div
            class="w-full flex-grow bg-[url('/public/img.jpg')] bg-cover brightness-100 bg-center flex p-16 items-left">
            <div class="flex flex-col ">
                <h1 class=" text-center text-5xl text-black font-bold drop-shadow-lg uppercase">{{__("BINE AI VENIT, ")}} <b class="text-green-600">{{Request::user()->name}}</b>
                </h1>
                @if(Request::user()->device)
                    <p class="text-3xl uppercase font-bold p-6">{{__("Dispozitivul tau: ")}} <br> {{Request::user()->device->name}}, {{Request::user()->device->city}}</p>
                    @forelse(Request::user()->device->slots as $slot)
                        <p class="text-3xl uppercase font-bold pl-12">{{$slot->name}} <b class="text-green-600">{{$slot->volume / $slot->max_volume * 100}}%</b></p>
                    @empty
                    @endforelse
                @elseif(Request::user()->role === 'operator' || Request::user()->role === 'user')
                    <p class="text-3xl uppercase font-bold p-6">{{__("Nu ai un dispozitiv corespondent")}}</p>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
