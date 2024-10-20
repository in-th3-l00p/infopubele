<x-responsive-nav-link
            href="{{ route('admin.devices.index') }}"
            :active="request()->routeIs('admin.devices.index')"
>
    {{ __('Dispozitive') }}
</x-responsive-nav-link>

{{--            <x-responsive-nav-link --}}
{{--                        href="{{ route('users.index' )}}" --}}
{{--                        :active="request()->routeIs('users.index')"--}}
{{--            >--}}
{{--                {{ __('Utilizatori') }}--}}
{{--            </x-responsive-nav-link>--}}

<x-responsive-nav-link>
    {{ __('Utilizatori') }}
</x-responsive-nav-link>

{{--            <x-responsive-nav-link--}}
{{--                        href="{{ route('device-reports.index') }}"--}}
{{--                        :active="request()->routeIs('device-reports.index')"--}}
{{--            >--}}
{{--                {{ __('Rapoarte Dispozitive') }}--}}
{{--            </x-responsive-nav-link>--}}
<x-responsive-nav-link>
    {{ __('Rapoarte Dispozitive') }}
</x-responsive-nav-link>
