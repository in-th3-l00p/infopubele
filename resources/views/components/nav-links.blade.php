<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link
                href="{{ route('dashboard') }}"
                :active="request()->routeIs('dashboard')"
    >
        {{ __('Dashboard') }}
    </x-nav-link>
    @switch(Auth::user()->role)
        @case('admin')
{{--            <x-nav-link  --}}
{{--                        href="{{ route('devices.index') }}" --}}
{{--                        :active="request()->routeIs('devices.index')"--}}
{{--            >--}}
{{--                {{ __('Dispozitive') }}--}}
{{--            </x-nav-link>--}}
            <x-nav-link>
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
            @break
        @case('uat')
{{--            <x-nav-link--}}
{{--                --}}
{{--                href="{{ route('uat.devices.index') }}"--}}
{{--                :active="request()->routeIs('uat.devices.index')"--}}
{{--            >--}}
{{--                {{ __('Dispozitive') }}--}}
{{--            </x-nav-link>--}}
            <x-nav-link>
                {{ __('Dispozitive') }}
            </x-nav-link>

{{--            <x-nav-link--}}
{{--                --}}
{{--                href="{{ route('uat.users.index') }}"--}}
{{--                :active="request()->routeIs('uat.users.index')"--}}
{{--            >--}}
{{--                {{ __("Utilizatori") }}--}}
{{--            </x-nav-link>--}}
            <x-nav-link>
                {{ __("Utilizatori") }}
            </x-nav-link>
            @break
        @case('operator')
{{--            <x-nav-link--}}
{{--                --}}
{{--                href="{{ route('operator.devices.index') }}"--}}
{{--                :active="request()->routeIs('operator.devices.index')"--}}
{{--            >--}}
{{--                {{ __('Dispozitive') }}--}}
{{--            </x-nav-link>--}}
            <x-nav-link>
                {{ __('Dispozitive') }}
            </x-nav-link>

{{--            <x-nav-link  --}}
{{--                        href="{{ route('operator.users.index' )}}" --}}
{{--                        :active="request()->routeIs('operator.users.index')"--}}
{{--            >--}}
{{--                {{ __('Utilizatori') }}--}}
{{--            </x-nav-link> --}}
            <x-nav-link>
                {{ __('Utilizatori') }}
            </x-nav-link>

{{--            <x-nav-link--}}
{{--                --}}
{{--                href="{{ route('operator.notifications.index') }}"--}}
{{--                :active="request()->routeIs('operator.notifications.index')"--}}
{{--            >--}}
{{--                {{ __('Notificari') }}--}}
{{--            </x-nav-link>--}}
            <x-nav-link>
                {{ __('Notificari') }}
            </x-nav-link>
            @break
        @case('generator')
{{--            <x-nav-link --}}
{{--                        href="{{ route('device-reports.index') }}"--}}
{{--                        :active="request()->routeIs('device-reports.index')"--}}
{{--            >--}}
{{--                {{ __('Rapoarte Dispozitive') }}--}}
{{--            </x-nav-link>--}}
            <x-nav-link>
                {{ __('Rapoarte Dispozitive') }}
            </x-nav-link>
            @break
        @case('user')
{{--            <x-nav-link--}}
{{--                --}}
{{--                href="{{ route('user.devices.show') }}"--}}
{{--                :active="request()->routeIs('user.devices.show')"--}}
{{--            >--}}
{{--                {{ __("Dispozitiv") }}--}}
{{--            </x-nav-link>--}}
            <x-nav-link>
                {{ __("Dispozitiv") }}
            </x-nav-link>
            @break
    @endswitch
</div>
