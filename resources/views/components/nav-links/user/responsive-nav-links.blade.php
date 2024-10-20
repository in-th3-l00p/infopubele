<x-responsive-nav-link
    href="{{ route(
        'user.devices.show',
        [ "device" => request()->user()->associatedDevice->id ]
    ) }}"
    :active="request()->routeIs('user.devices.show')"
>
    {{ __("Dispozitiv") }}
</x-responsive-nav-link>
