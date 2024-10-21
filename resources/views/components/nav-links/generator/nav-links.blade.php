<x-nav-link
    href="{{ route('generator.device-reports.index') }}"
    :active="request()->routeIs('generator.device-reports.index')"
>
    {{ __('Rapoarte Dispozitive') }}
</x-nav-link>
