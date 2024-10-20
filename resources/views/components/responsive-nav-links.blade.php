<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-responsive-nav-link>
    @switch(Auth::user()->role)
        @case('admin')
            {{--            <x-responsive-nav-link --}}
            {{--                        href="{{ route('devices.index') }}" --}}
            {{--                        :active="request()->routeIs('devices.index')"--}}
            {{--            >--}}
            {{--                {{ __('Dispozitive') }}--}}
            {{--            </x-responsive-nav-link>--}}
            <x-responsive-nav-link>
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
            @break
        @case('uat')
            {{--            <x-responsive-nav-link--}}
            {{--                --}}
            {{--                href="{{ route('uat.devices.index') }}"--}}
            {{--                :active="request()->routeIs('uat.devices.index')"--}}
            {{--            >--}}
            {{--                {{ __('Dispozitive') }}--}}
            {{--            </x-responsive-nav-link>--}}
            <x-responsive-nav-link>
                {{ __('Dispozitive') }}
            </x-responsive-nav-link>

            {{--            <x-responsive-nav-link--}}
            {{--                --}}
            {{--                href="{{ route('uat.users.index') }}"--}}
            {{--                :active="request()->routeIs('uat.users.index')"--}}
            {{--            >--}}
            {{--                {{ __("Utilizatori") }}--}}
            {{--            </x-responsive-nav-link>--}}
            <x-responsive-nav-link>
                {{ __("Utilizatori") }}
            </x-responsive-nav-link>
            @break
        @case('operator')
            {{--            <x-responsive-nav-link--}}
            {{--                --}}
            {{--                href="{{ route('operator.devices.index') }}"--}}
            {{--                :active="request()->routeIs('operator.devices.index')"--}}
            {{--            >--}}
            {{--                {{ __('Dispozitive') }}--}}
            {{--            </x-responsive-nav-link>--}}
            <x-responsive-nav-link>
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
            @break
        @case('generator')
            {{--            <x-responsive-nav-link--}}
            {{--                        href="{{ route('device-reports.index') }}"--}}
            {{--                        :active="request()->routeIs('device-reports.index')"--}}
            {{--            >--}}
            {{--                {{ __('Rapoarte Dispozitive') }}--}}
            {{--            </x-responsive-nav-link>--}}
            <x-responsive-nav-link>
                {{ __('Rapoarte Dispozitive') }}
            </x-responsive-nav-link>
            @break
        @case('user')
            {{--            <x-responsive-nav-link--}}
            {{--                --}}
            {{--                href="{{ route('user.devices.show') }}"--}}
            {{--                :active="request()->routeIs('user.devices.show')"--}}
            {{--            >--}}
            {{--                {{ __("Dispozitiv") }}--}}
            {{--            </x-responsive-nav-link>--}}
            <x-responsive-nav-link>
                {{ __("Dispozitiv") }}
            </x-responsive-nav-link>
            @break
    @endswitch
</div>
