<div class="pt-2 pb-3 space-y-1">
    @switch (request()->user()->role)
        @case ("admin")
            @include("components.nav-links.admin.responsive-nav-links")
            @break
        @case ("user")
            @if (request()->user()->associatedDevice()->exists())
                @include("components.nav-links.user.responsive-nav-links")
            @endif
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
