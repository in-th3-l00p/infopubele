<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-responsive-nav-link>
    @switch(Auth::user()->role)
        @case('admin')
            @include('layouts.navigation.links.responsive-nav-links.admin.links')
            @break
        @case('uat')
            @include('layouts.navigation.links.responsive-nav-links.uat.links')
            @break
        @case('operator')
            @include('layouts.navigation.links.responsive-nav-links.operator.links')
            @break
        @case('generator')
            @include('layouts.navigation.links.responsive-nav-links.generator.links')
            @break
        @case('user')
            @include('layouts.navigation.links.responsive-nav-links.user.links')
            @break
    @endswitch
</div>
