<x-responsive-nav-link
    href="{{ route('operator.devices.index') }}"
    :active="request()->routeIs('operator.devices.index')"
>
    {{ __('Dispozitive') }}
</x-responsive-nav-link>

{{--            <x-responsive-nav-link --}}
{{--                        href="{{ route('operator.users.index' )}}" --}}
{{--                        :active="request()->routeIs('operator.users.index')"--}}
{{--            >--}}
{{--                {{ __('Utilizatori') }}--}}
{{--            </x-responsive-nav-link> --}}
<x-responsive-nav-link>
    {{ __('Utilizatori') }}
</x-responsive-nav-link>

{{--            <x-responsive-nav-link--}}
{{--                --}}
{{--                href="{{ route('operator.notifications.index') }}"--}}
{{--                :active="request()->routeIs('operator.notifications.index')"--}}
{{--            >--}}
{{--                {{ __('Notificari') }}--}}
{{--            </x-responsive-nav-link>--}}
<x-responsive-nav-link>
    {{ __('Notificari') }}
</x-responsive-nav-link>
