<x-app-layout>
    <x-slot name="sticky_header">
        <div class="flex items-center gap-4">
            <a href="{{ route("uat.users.index") }}">
                <x-button :title="__('Back')">Back</x-button>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Creează Utilizator') }}
            </h2>
        </div>
    </x-slot>

    <x-white-container>
        <x-validation-errors class="mb-4" />
        <form
            id="createForm"
            method="POST"
            action="{{ route('uat.users.store') }}"
            x-data="{ role: null, type: null }"
        >
            @csrf

            <div>
                <x-label for="name" value="{{ __('Nume') }}" />
                <x-input
                    id="name"
                    class="block mt-1 w-full"
                    type="text"
                    name="name"
                    :value="old('name')"
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
                    :value="old('email')"
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
                    x-model="role"
                >
                    <option value="operator" selected >Operator</option>
                    <option value="user">User</option>
                </select>
            </div>

            <div id="typeSelection" class="mt-4" x-show=" role === 'user'">
                <x-label for="type" value="{{ __('Tip') }}" />
                <select
                    id="type"
                    name="type"
                    class="select"
                    x-model="type"
                >
                    <option value="" selected>{{__("Alege")}}</option>
                    <option value="individual" selected >{{__("Persoana fizica")}}</option>
                    <option value="legal-entity">{{__("Persoana juridica")}}</option>
                    <option value="homeowners-association">{{__("Asociatie de proprietari")}}</option>
                </select>
            </div>

            <div
                id="individualSection"
                class="mt-4"
                x-show="type === 'individual'"
            >
                <div class="mt-4">
                    <x-label for="cnp" value="{{ __('CNP') }}" />
                    <x-input
                        id="cnp"
                        class="block mt-1 w-full"
                        type="text"
                        name="cnp"
                        :value="old('cnp')"
                        autocomplete="cnp"
                        x-bind:disabled="type !== 'individual'"
                    />
                </div>

                <div class="mt-4">
                    <x-label for="address" value="{{ __('Adresa') }}" />
                    <x-input
                        id="address"
                        class="block mt-1 w-full"
                        type="text"
                        name="address"
                        :value="old('address')"
                        autocomplete="address"
                        x-bind:disabled="type !== 'individual'"
                    />
                </div>

                <div class="mt-4">
                    <x-label for="phone" value="{{ __('Telefon') }}" />
                    <x-input
                        id="phone"
                        class="block mt-1 w-full"
                        type="text"
                        name="phone"
                        :value="old('phone')"
                        autocomplete="phone"
                        x-bind:disabled="type !== 'individual'"
                    />
                </div>

                <div class="mt-4">
                    <x-label for="contract_number" value="{{ __('Număr contract') }}" />
                    <x-input
                        id="contract_number"
                        class="block mt-1 w-full"
                        type="text"
                        name="contract_number"
                        :value="old('contract_number')"
                        autocomplete="contract_number"
                        x-bind:disabled="type !== 'individual'"
                    />
                </div>
            </div>

            <div
                id="legalEntitySection"
                class="mt-4"
                x-show="type === 'legal-entity'"
            >
                <div class="mt-4">
                    <x-label for="cui" value="{{ __('CUI') }}" />
                    <x-input
                        id="cui"
                        class="block mt-1 w-full"
                        type="text"
                        name="cui"
                        :value="old('cui')"
                        autocomplete="cui"
                        x-bind:disabled="type !== 'legal-entity'"
                    />
                </div>

                <div class="mt-4">
                    <x-label for="cif" value="{{ __('CIF') }}" />
                    <x-input
                        id="cif"
                        class="block mt-1 w-full"
                        type="text"
                        name="cif"
                        :value="old('cif')"
                        autocomplete="cif"
                        x-bind:disabled="type !== 'legal-entity'"
                    />
                </div>

                <div class="mt-4">
                    <x-label for="address" value="{{ __('Sediu Social') }}" />
                    <x-input
                        id="address"
                        class="block mt-1 w-full"
                        type="text"
                        name="address"
                        :value="old('address')"
                        autocomplete="address"
                        x-bind:disabled="type !== 'legal-entity'"
                    />
                </div>

                <div class="mt-4">
                    <x-label for="_work" value="{{ __('Punct de Lucru') }}" />
                    <x-input
                        id="address_work"
                        class="block mt-1 w-full"
                        type="text"
                        name="address_work"
                        :value="old('address_work')"
                        autocomplete="address_work"
                        x-bind:disabled="type !== 'legal-entity'"
                    />
                </div>

                <div class="mt-4">
                    <x-label for="contract_number" value="{{ __('Număr contract') }}" />
                    <x-input
                        id="contract_number"
                        class="block mt-1 w-full"
                        type="text"
                        name="contract_number"
                        :value="old('contract_number')"
                        autocomplete="contract_number"
                        x-bind:disabled="type !== 'legal-entity'"
                    />
                </div>

                <div class="mt-4">
                    <x-label for="contact_person" value="{{ __('Persoană de contact') }}" />
                    <x-input
                        id="contact_person"
                        class="block mt-1 w-full"
                        type="text"
                        name="contact_person"
                        :value="old('contact_person')"
                        autocomplete="contact_person"
                        x-bind:disabled="type !== 'legal-entity'"
                    />
                </div>

                <div class="mt-4">
                    <x-label for="phone" value="{{ __('Telefon') }}" />
                    <x-input
                        id="phone"
                        class="block mt-1 w-full"
                        type="text"
                        name="phone"
                        :value="old('phone')"
                        autocomplete="phone"
                        x-bind:disabled="type !== 'legal-entity'"
                    />
                </div>

                <div class="mt-4">
                    <x-label for="onrc_number" value="{{ __('Nr. Registrul Comertului') }}" />
                    <x-input
                        id="onrc_number"
                        class="block mt-1 w-full"
                        type="text"
                        name="onrc_number"
                        :value="old('onrc_number')"
                        autocomplete="onrc_number"
                        x-bind:disabled="type !== 'legal-entity'"
                    />
                </div>
            </div>

            <div
                id="hoaSection"
                class="mt-4"
                x-show="type === 'homeowners-association'"
            >
                <div class="mt-4">
                    <x-label for="cui" value="{{ __('CUI') }}" />
                    <x-input
                        id="cui"
                        class="block mt-1 w-full"
                        type="text"
                        name="cui"
                        :value="old('cui')"
                        autocomplete="cui"
                        x-bind:disabled="type !== 'homeowners-association'"
                    />
                </div>

                <div class="mt-4">
                    <x-label for="cif" value="{{ __('CIF') }}" />
                    <x-input
                        id="cif"
                        class="block mt-1 w-full"
                        type="text"
                        name="cif"
                        :value="old('cif')"
                        autocomplete="cif"
                        x-bind:disabled="type !== 'homeowners-association'"
                    />
                </div>

                <div class="mt-4">
                    <x-label for="onrc_number" value="{{ __('Nr. Registrul Comertului') }}" />
                    <x-input
                        id="onrc_number"
                        class="block mt-1 w-full"
                        type="text"
                        name="onrc_number"
                        :value="old('onrc_number')"
                        autocomplete="onrc_number"
                        x-bind:disabled="type !== 'homeowners-association'"
                    />
                </div>

                <div class="mt-4">
                    <x-label for="address" value="{{ __('Adresa') }}" />
                    <x-input
                        id="address"
                        class="block mt-1 w-full"
                        type="text"
                        name="address"
                        :value="old('address')"
                        autocomplete="address"
                        x-bind:disabled="type !== 'homeowners-association'"
                    />
                </div>

                <div class="mt-4">
                    <x-label for="contract_number" value="{{ __('Număr contract') }}" />
                    <x-input
                        id="contract_number"
                        class="block mt-1 w-full"
                        type="text"
                        name="contract_number"
                        :value="old('contract_number')"
                        autocomplete="contract_number"
                        x-bind:disabled="type !== 'homeowners-association'"
                    />
                </div>

                <div class="mt-4">
                    <x-label for="contact_person" value="{{ __('Persoană de contact') }}" />
                    <x-input
                        id="contact_person"
                        class="block mt-1 w-full"
                        type="text"
                        name="contact_person"
                        :value="old('contact_person')"
                        autocomplete="contact_person"
                        x-bind:disabled="type !== 'homeowners-association'"
                    />
                </div>

                <div class="mt-4">
                    <x-label for="phone" value="{{ __('Telefon') }}" />
                    <x-input
                        id="phone"
                        class="block mt-1 w-full"
                        type="text"
                        name="phone"
                        :value="old('phone')"
                        autocomplete="phone"
                        x-bind:disabled="type !== 'homeowners-association'"
                    />
                </div>

                <div class="mt-4">
                    <x-label for="inhabitants" value="{{ __('Număr locuitori') }}" />
                    <x-input
                        id="inhabitants"
                        class="block mt-1 w-full"
                        type="text"
                        name="inhabitants"
                        :value="old('inhabitants')"
                        autocomplete="inhabitants"
                        x-bind:disabled="type !== 'homeowners-association'"
                    />
                </div>
            </div>

            <div class="mt-4">
                <x-label for=" city " value="{{ __('Oras') }}" />
                @if(Request::user()->city)
                    <x-input
                        id="id" type="text" class="mt-1 block w-full"
                        required autocomplete="id"
                        disabled value="{{ Request::user()->city}}"
                    />
                @else
                    <x-input
                        id="id" type="text" class="mt-1 block w-full"
                        required autocomplete="id"
                        disabled value="Nu aveti un oras asociat"
                    />
                @endif
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Parola') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmare Parola') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var roleSelect = document.getElementById('role');
                    var typeSelection = document.getElementById('typeSelection');
                    var typeSelect = document.getElementById('type');
                    var individualContent = document.getElementById('individualSection');
                    var legalEntityContent = document.getElementById('legalEntitySection');
                    var hoaContent = document.getElementById('hoaSection');

                    function showTypeSelection() {
                        var selectedRole = roleSelect.value;
                        if (selectedRole === 'user') {
                            typeSelection.style.display = 'block';
                        } else {
                            typeSelection.style.display = 'none';
                        }
                    }

                    function showTypeContent() {
                        var selectedType = typeSelect.value;
                        // Hide all content
                        individualContent.style.display = 'none';
                        legalEntityContent.style.display = 'none';
                        hoaContent.style.display = 'none';

                        // Show content based on selected type
                        if (selectedType === 'individual') {
                            individualContent.style.display = 'block';
                        } else if (selectedType === 'legal-entity') {
                            legalEntityContent.style.display = 'block';
                        } else if (selectedType === 'homeowners-association') {
                            hoaContent.style.display = 'block';
                        }
                    }

                    showTypeSelection(); // Show initially based on default selected value

                    roleSelect.addEventListener('change', function() {
                        showTypeSelection();
                        // Hide content when role changes
                        if (roleSelect.value !== 'user') {
                            typeSelection.style.display = 'none';
                            individualContent.style.display = 'none';
                            legalEntityContent.style.display = 'none';
                            hoaContent.style.display = 'none';
                            typeSelect.value = '';
                        }
                    });

                    typeSelect.addEventListener('change', showTypeContent);
                });
            </script>

            <div class="flex items-center justify-center mt-4">
                <x-button>{{ __('Creează') }}</x-button>
            </div>
        </form>
    </x-white-container>
</x-app-layout>
