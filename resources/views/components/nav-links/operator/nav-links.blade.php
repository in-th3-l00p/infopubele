<x-nav-link
    href="{{ route('operator.devices.index') }}"
    :active="request()->routeIs('operator.devices.index')"
>
    {{ __('Dispozitive') }}
</x-nav-link>

<x-nav-link
    href="{{ route('operator.notifications') }}"
    :active="request()->routeIs('operator.notifications')"
>
    {{ __('Notificari') }}
</x-nav-link>
