<x-app-layout>
    <div class=" min-h-screen flex-col flex">
        <div
            class="w-full flex-grow bg-[url('/public/img.jpg')] bg-cover brightness-100 bg-center flex p-16 items-left">
            <div class="flex flex-col ">
                <h1 class=" text-center text-5xl text-black font-bold drop-shadow-lg uppercase">{{__("BINE AI VENIT, ")}} <b class="text-green-600">{{Request::user()->name}}</b>
                </h1>
                @if(Request::user()->device)
                    <p class="text-2xl uppercase font-bold p-6">{{__("Dispozitivul tau: ")}} <br> {{Request::user()->device->name}}, {{Request::user()->device->city}}</p>
                    @forelse(Request::user()->device->slots as $slot)
                        <p class="text-2xl uppercase font-bold pl-12">{{$slot->name}} <b class="text-green-600">{{$slot->volume / $slot->max_volume * 100}}%</b></p>
                    @empty
                    @endforelse
                @elseif(Request::user()->role === 'user')
                    <p class="text-2xl uppercase font-bold p-6">{{__("Nu ai un dispozitiv corespondent")}}</p>
                @endif
                @if(Request::user()->role==='admin')
                    <div class="flex flex-col-2 w-[50%] space-x-3">
                        <x-white-container>
                            @php
                                $transactions = \App\Models\Transaction::query()->latest(2)->get()
                            @endphp
                            @forelse($transactions as $transaction)
                                <p class="text-2xl uppercase font-bold p-6"><a href="{{route("devices.show",['device'=>$transaction->slot()->first()->device()->first()])}}">
                                        {{__("Tranzacție de ")}}m<sup>3</sup>
                                        {{$transaction->amount}}
                                        {{__("la slotul ")}}
                                        {{$transaction->slot()->first()->name}}
                                        {{(" de la dispozitivul ")}}
                                        {{$transaction->slot()->first()->device()->first()->name}}</a></p>
                            @empty
                                <p>{{__("Nu exista tranzactii")}}</p>
                            @endforelse
                        </x-white-container>
                        <x-white-container>

                        </x-white-container>
                        @endif
                    </div>
            </div>
        </div>
    </div>

</x-app-layout>
