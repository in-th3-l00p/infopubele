<x-form-section submit="updateDevice">
    <x-slot name="title">
        {{ __('Device Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Complete with the initial device\'s information.') }}
    </x-slot>

    <x-slot name="form">
        @if ($updated)
            <div class="col-span-6 sm:col-span-4">
                <div
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded flex justify-between"
                    role="alert"
                >
                    <div>
                        <strong class="font-bold">{{ __("Device updated successfully!") }}</strong>
                        <span class="block sm:inline">{{ __("The device has been updated successfully.") }}</span>
                    </div>

                    <x-button
                        type="button"
                        class="aspect-square"
                        wire:click="closeUpdated"
                    >
                        X
                    </x-button>
                </div>
            </div>
        @endif

        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input
                id="name" type="text" class="mt-1 block w-full"
                required autocomplete="name"
                wire:model="name"
            />
            <x-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="city" value="{{ __('City') }}" />
            <select
                id="city" name="city"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                wire:model="city"
            >
                <option value="New York">New York</option>
                <option value="San Francisco">San Francisco</option>
                <option value="Austin">Austin</option>
                <option value="Seattle">Seattle</option>
            </select>
            <x-input-error for="city" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
