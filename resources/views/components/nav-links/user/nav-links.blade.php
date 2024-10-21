<x-nav-link
    :href="route('user.devices.show')"
    :active="request()->routeIs('user.devices.show')"
>
    {{ __("Dispozitiv") }}
</x-nav-link>
