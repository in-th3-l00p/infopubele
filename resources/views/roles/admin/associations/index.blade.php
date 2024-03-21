<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Asociatii') }}
        </h2>
    </x-slot>

    <x-white-container>
        @livewire('create-association')
    </x-white-container>

    <x-white-container>
        <div class="py-12">
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="text-2xl">
                            {{ __('Asociatii') }}
                        </div>
                    </div>
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        @foreach($associations as $association)
                            <div class="flex justify-between p-4">
                                <div>
                                    <div class="text-xl">
                                        {{ $association->address }}
                                    </div>
                                    <div class="text-md">
                                        {{ $association->city }}
                                    </div>
                                </div>
                                <div>
                                    <x-button>
                                        <a href="">
                                            {{ __('Modifica') }}
                                        </a>
                                    </x-button>
                                </div>
                            </div>
                            <div class="border-b p-4"></div>
                        @endforeach
                    </div>
                </div>
            </div>
    </x-white-container>
</x-app-layout>
