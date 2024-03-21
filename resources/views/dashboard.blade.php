<x-app-layout>
    <div class=" min-h-screen flex-col flex ">
        <div
            class="w-full flex-grow bg-[url('/public/img.jpg')] bg-cover brightness-100 bg-center flex justify-center  lg:justify-start">
            <div class="flex flex-col ">
                <h1 class="px-16 pt-16 text-center text-5xl text-black font-bold drop-shadow-lg uppercase">{{__("BINE AI VENIT, ")}} <b class="text-green-600">{{Request::user()->name}}</b>
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
                    <div class="px-4 mx-auto md:mx-0">
{{--                        <x-white-container>--}}
                            <div class="block lg:flex space-x-3">
                            <div class="block lg:flex space-x-3">
                                <x-white-container class="h-full">
                                    <p class="text-2xl text-center uppercase font-bold p-6">{{__("DISPOZITIVE")}}</p>
                                    <div class="w-full text-center">
                                        @php
                                            $slots = \App\Models\Slot::query()->withCount('transactions')->orderBy('transactions_count','desc')->latest()->take(4)->get()
                                        @endphp
                                        @foreach($slots as $slot)
                                            <p class="text-2xl uppercase font-bold pt-6 text-green-600">
                                                <a href="{{route("devices.show",['device'=>$slot->device()->first()])}}">{{$slot->device()->first()->name}}</a>
                                            </p>
                                            <p class="text-lg text-gray-300">{{$slot->device()->first()->city}}</p>
                                        @endforeach
                                    </div>
                                </x-white-container>
                                <x-white-container class="h-full">
                                    <p class="text-2xl text-center uppercase font-bold p-6">{{__("Tranzacții")}}</p>
                                    <div class="w-full]">
                                        @php
                                            $transactions = \App\Models\Transaction::query()->latest()->take(2)->get()

                                        @endphp
                                        @forelse($transactions as $transaction)
                                            @php
                                            $slot=$transaction->slot()->first();
                                            $device=$slot->device()->first();
                                            @endphp
                                            <p class="text-2xl uppercase font-bold p-6"><a href="{{route("devices.show",['device'=>$device])}}">
                                                    {{__("Tranzacție de ")}}
                                                    {{$transaction->amount}}
                                                    dm<sup>3</sup>
                                                    <br>
                                                    {{__("la slotul ")}}
                                                    {{$slot->name}}
                                                    <br>
                                                    {{(" de la dispozitivul ")}}
                                                    {{$device->name}}</a></p>
                                        @empty
                                            <p>{{__("Nu exista tranzacții")}}</p>
                                        @endforelse
                                    </div>
                                </x-white-container>
                            </div>
{{--                        </x-white-container>--}}
                    </div>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
