<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-responsive-nav-link>

    @switch (request()->user()->role)
        @case ("admin")
            @include("components.nav-links.admin.responsive-nav-links")
            @break
        @case ("user")
            @include("components.nav-links.user.responsive-nav-links")
            @break
        @case ("uat")
            @include("components.nav-links.uat.responsive-nav-links")
            @break
        @case ("operator")
            @include("components.nav-links.operator.responsive-nav-links")
            @break
        @case ("generator")
            @include("components.nav-links.generator.responsive-nav-links")
            @break
    @endswitch
</div>
