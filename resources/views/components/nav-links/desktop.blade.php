<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>
    @switch (request()->user()->role)
        @case ("admin")
            @include("components.nav-links.admin.nav-links")
            @break
        @case ("user")
            @if (request()->user()->associatedDevice()->exists())
                @include("components.nav-links.user.nav-links")
            @endif
            @break
        @case ("uat")
            @include("components.nav-links.uat.nav-links")
            @break
        @case ("operator")
            @include("components.nav-links.operator.nav-links")
            @break
        @case ("generator")
            @include("components.nav-links.generator.nav-links")
            @break
    @endswitch
</div>
