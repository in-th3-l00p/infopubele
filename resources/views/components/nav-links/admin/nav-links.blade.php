<x-nav-link
    href="{{ route('admin.devices.index') }}"
    :active="request()->routeIs('admin.devices.index')"
>
    {{ __('Dispozitive') }}
</x-nav-link>

{{--            <x-nav-link  --}}
{{--                        href="{{ route('users.index' )}}" --}}
{{--                        :active="request()->routeIs('users.index')"--}}
{{--            >--}}
{{--                {{ __('Utilizatori') }}--}}
{{--            </x-nav-link>--}}

<x-nav-link>
    {{ __('Utilizatori') }}
</x-nav-link>

{{--            <x-nav-link --}}
{{--                        href="{{ route('device-reports.index') }}"--}}
{{--                        :active="request()->routeIs('device-reports.index')"--}}
{{--            >--}}
{{--                {{ __('Rapoarte Dispozitive') }}--}}
{{--            </x-nav-link>--}}
<x-nav-link>
    {{ __('Rapoarte Dispozitive') }}
</x-nav-link>
