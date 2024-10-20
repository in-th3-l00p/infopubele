<x-nav-link
    href="{{ route('admin.devices.index') }}"
    :active="request()->routeIs('admin.devices.index')"
>
    {{ __('Dispozitive') }}
</x-nav-link>

<x-nav-link
    href="{{ route('admin.users.index' )}}"
    :active="request()->routeIs('admin.users.index')"
>
    {{ __('Utilizatori') }}
</x-nav-link>

<x-nav-link
    href="{{ route('admin.device-reports.index') }}"
    :active="request()->routeIs('admin.device-reports.index')"
>
    {{ __('Rapoarte Dispozitive') }}
</x-nav-link>
