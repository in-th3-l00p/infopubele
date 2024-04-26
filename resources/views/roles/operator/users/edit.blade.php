<x-app-layout>
    <x-slot name="sticky_header">
        <div class="flex items-center gap-4">
            <a href="{{ route("operator.users.index") }}">
                <x-button :title="__('Back')">Back</x-button>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Modifica Utilizator') . ": " . $user->name  }}
            </h2>
        </div>
    </x-slot>

    <x-white-container>
        <x-validation-errors class="mb-4" />

        @session('success')
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ session('success') }}</strong>
        </div>
        @endsession

        <form id="editForm" method="POST" action="{{ route('operator.users.update', ['user' => $user]) }}">
            @csrf
            @method("PUT")

            <div>
                <x-label for="name" value="{{ __('Nume') }}" />
                <x-input
                    id="name"
                    class="block mt-1 w-full"
                    type="text"
                    name="name"
                    :value="$user->name"
                    required autofocus
                    autocomplete="name"
                />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input
                    id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    :value="$user->email"
                    required
                    autocomplete="username"
                />
            </div>

            <div class="mt-4">
                <x-label for="role" value="{{ __('Rol') }}" />
                <select
                    id="role"
                    name="role"
                    class="select"
                >
                    <option value="user" @selected($user->role === "user")>User</option>
                </select>
            </div>

            <div id="typeSelection" class="mt-4" style="display: none;">
                <x-label for="type" value="{{ __('Tip') }}" />
                <select
                    id="type"
                    name="type"
                    class="select"
                >
                    <option value="" selected>{{__("Alege")}}</option>
                    <option value="individual" @selected($user->type === "individual") >{{__("Persoana fizica")}}</option>
                    <option value="legal-entity" @selected($user->type === "legal-entity")>{{__("Persoana juridica")}}</option>
                    <option value="homeowners-association" @selected($user->type === "homeowners-association")>{{__("Asociatie de proprietari")}}</option>
                </select>
            </div>

            <div id="individualSection" class="mt-4" @if($user->type === 'individual') style="display: block;" @else style="display: none;" @endif>
                <div class="mt-4">
                    <x-label for="cnp" value="{{ __('CNP') }}" />
                    <x-input id="cnp" class="block mt-1 w-full" type="text" name="cnp" :value="$user->cnp" autocomplete="cnp" />
                </div>

                <div class="mt-4">
                    <x-label for="phone" value="{{ __('Telefon') }}" />
                    <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"  autocomplete="phone" />
                </div>

                <div class="mt-4">
                    <x-label for="contract_number" value="{{ __('Număr contract') }}" />
                    <x-input id="contract_number" class="block mt-1 w-full" type="text" name="contract_number" :value="$user->contract_number" autocomplete="contract_number" />
                </div>
            </div>

            <div id="legalEntitySection" class="mt-4" @if($user->type === 'legal-entity') style="display: block;" @else style="display: none;" @endif>
                <div class="mt-4">
                    <x-label for="cui" value="{{ __('CUI') }}" />
                    <x-input id="cui" class="block mt-1 w-full" type="text" name="cui" :value="$user->cui" autocomplete="cui" />
                </div>
            </div>

            <div id="hoaSection" class="mt-4" @if($user->type === 'homeowners-association') style="display: block;" @else style="display: none;" @endif>
                <div class="mt-4">
                    <x-label for="cui" value="{{ __('CUI') }}" />
                    <x-input id="cui" class="block mt-1 w-full" type="text" name="cui" :value="$user->cui" autocomplete="cui" />
                </div>

                <div class="mt-4">
                    <x-label for="address" value="{{ __('Adresa') }}" />
                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="$user->address" autocomplete="address" />
                </div>

                <div class="mt-4">
                    <x-label for="contract_number" value="{{ __('Număr contract') }}" />
                    <x-input id="contract_number" class="block mt-1 w-full" type="text" name="contract_number" :value="$user->contract_number" autocomplete="contract_number" />
                </div>

                <div class="mt-4">
                    <x-label for="contact_person" value="{{ __('Persoană de contact') }}" />
                    <x-input id="contact_person" class="block mt-1 w-full" type="text" name="contact_person" :value="$user->contact_person" autocomplete="contact_person" />
                </div>

                <div class="mt-4">
                    <x-label for="phone" value="{{ __('Telefon') }}" />
                    <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="$user->phone" autocomplete="phone" />
                </div>

                <div class="mt-4">
                    <x-label for="inhabitants" value="{{ __('Număr locuitori') }}" />
                    <x-input id="inhabitants" class="block mt-1 w-full" type="text" name="inhabitants" :value="$user->inhabitants" autocomplete="inhabitants" />
                </div>
            </div>


            <div class="mt-4">
                <x-label for="city" value="{{ __('Oraș') }}" />
                @php
                    $cities = \App\Models\City::query()->orderBy("name")->get()
                @endphp
                <select
                    id="city" name="city"
                    class="select"
                    wire:model="city"
                >
                    @if($user->city === null)
                        <option value="" selected>{{ __("Nu exista Oras alocat") }}</option>
                    @endif
                    @foreach($cities as $city)
                        @if($city->name !== $user->city)
                            <option value="{{$city->name}}" >{{$city->name}}</option>
                        @else
                            <option value="{{$user->city}}" selected>{{$user->city}}</option>
                        @endif
                    @endforeach
                </select>
                <x-input-error for="city" class="mt-2" />
            </div>

            @if ($user->role === "user")
                <div class="mt-4">
                    <x-label for="device_id" value="{{ __('Dispozitiv') }}" />
                    <select name="device_id" id="device_id" class="select">
                        <option value="" @selected($user->device === null)>
                            {{ __("Nu exista Dispozitiv alocat") }}
                        </option>

                        @foreach ($devices as $device)
                            <option
                                value="{{ $device->id }}"
                                @selected($user->device_id === $device->id)
                            >
                                {{ $device->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="flex items-center justify-center mt-4">
                <x-button id="submitButton">{{ __('Salvează') }}</x-button>
            </div>
        </form>
    </x-white-container>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var roleSelect = document.getElementById('role');
        var typeSelect = document.getElementById('type');
        var individualSection = document.getElementById('individualSection');
        var legalEntitySection = document.getElementById('legalEntitySection');
        var hoaSection = document.getElementById('hoaSection');
        var submitButton = document.getElementById('submitButton');

        function showTypeSelection() {
            var selectedRole = roleSelect.value;
            if (selectedRole === 'user') {
                typeSelection.style.display = 'block';
            } else {
                typeSelection.style.display = 'none';
                // Reset type selection to "Alege" when role changes from user
                typeSelect.value = '';
                // Hide all sections when role changes
                individualSection.style.display = 'none';
                legalEntitySection.style.display = 'none';
                hoaSection.style.display = 'none';
            }
        }

        function showTypeContent() {
            var selectedType = typeSelect.value;
            // Hide all sections first
            individualSection.style.display = 'none';
            legalEntitySection.style.display = 'none';
            hoaSection.style.display = 'none';
            // Show the section based on the selected type
            if (selectedType === 'individual') {
                individualSection.style.display = 'block';
            } else if (selectedType === 'legal-entity') {
                legalEntitySection.style.display = 'block';
            } else if (selectedType === 'homeowners-association') {
                hoaSection.style.display = 'block';
            }
        }

        showTypeSelection(); // Show initially based on default selected value

        roleSelect.addEventListener('change', function() {
            showTypeSelection();
            // Hide content when role changes
            if (roleSelect.value !== 'user') {
                typeSelection.style.display = 'none';
                // Reset type selection to "Alege" when role changes from user
                typeSelect.value = '';
                // Hide all sections when role changes
                individualSection.style.display = 'none';
                legalEntitySection.style.display = 'none';
                hoaSection.style.display = 'none';
            }
        });

        typeSelect.addEventListener('change', showTypeContent);

        submitButton.addEventListener('click', function() {
            // Make sure to display the selected type content before submitting
            showTypeContent();
            document.getElementById('editForm').submit();
        });
    });
</script>

