<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>
    @switch(Auth::user()->role)
        @case('admin')
            @include('layouts.navigation.links.nav-links.admin.links')
            @break
        @case('uat')
            @include('layouts.navigation.links.nav-links.uat.links')
            @break
        @case('operator')
            @include('layouts.navigation.links.nav-links.operator.links')
            @break
        @case('generator')
            @include('layouts.navigation.links.nav-links.generator.links')
            @break
        @case('user')
            @include('layouts.navigation.links.nav-links.user.links')
            @break
    @endswitch
</div>
