<nav id="navigation-bar" x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex my-3">
                    <a href="{{route("welcome")}}"><img src="/logo.png" alt="" class="h-10 "></a>
                    <a class="my-auto ml-2" href="{{route("welcome")}}"><p class="  text-2xl">Infopubele.ro</p></a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-3  lg:ms-4 lg:flex">
                    <x-nav-link class="text-xl" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @if (Request::user()->role === "admin")
                        <x-nav-link class="text-xl" href="{{ route('devices.index') }}" :active="request()->routeIs('devices.index')">
                            {{ __('Dispozitive') }}
                        </x-nav-link>
                        <x-nav-link class="text-xl" href="{{ route('users.index' )}}" :active="request()->routeIs('users.index')">
                            {{ __('Utilizatori') }}
                        </x-nav-link>
                    @endif

                    @if (Request::user()->role === "user" && Request::user()->device_id !== null)
                        <x-nav-link
                            class="text-xl"
                            href="{{ route('user.devices.show') }}"
                            :active="request()->routeIs('user.devices.show')"
                        >
                            {{ __("Dispozitiv") }}
                        </x-nav-link>
                    @endif

                    @if (Request::user()->role === "admin" || Request::user()->role === "generator")
                        <x-nav-link class="text-xl"
                            href="{{ route('device-reports.index') }}"
                            :active="request()->routeIs('device-reports.index')"
                        >
                            {{ __('Rapoarte Dispozitive') }}
                        </x-nav-link>
                    @endif

                    @if (Request::user()->role === "uat")
                        <x-nav-link
                            class="text-xl"
                            href="{{ route('uat.devices.index') }}"
                            :active="request()->routeIs('uat.devices.index')"
                        >
                            {{ __('Dispozitive') }}
                        </x-nav-link>

                        <x-nav-link
                            class="text-xl"
                            href="{{ route('uat.users.index') }}"
                            :active="request()->routeIs('uat.users.index')"
                        >
                            {{ __("Utilizatori") }}
                        </x-nav-link>

                    @endif
                    @if (Request::user()->role === "operator")
                        <x-nav-link
                            class="text-xl"
                            href="{{ route('operator.devices.index') }}"
                            :active="request()->routeIs('operator.devices.index')"
                        >
                            {{ __('Dispozitive') }}
                        </x-nav-link>

                        <x-nav-link class="text-xl" href="{{ route('operator.users.index' )}}" :active="request()->routeIs('operator.users.index')">

                            {{ __('Utilizatori') }}
                        </x-nav-link>

                        <x-nav-link
                            class="text-xl"
                            href="{{ route('operator.notifications.index') }}"
                            :active="request()->routeIs('operator.notifications.index')"
                        >
                            {{ __('Notificari') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <div class="hidden lg:flex lg:items-center lg:ms-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="text-xl inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Gestionează Cont') }}
                            </div>

                            <x-dropdown-link href="{{ route('welcome') }}">
                                {{ __('Acasă') }}
                            </x-dropdown-link>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profil') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Delogheaza-te') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center lg:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class=" hidden lg:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link  href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @if (Request::user()->role === "user" && Request::user()->device_id !== null)
                <x-responsive-nav-link
                    href="{{ route('user.devices.show') }}"
                    :active="request()->routeIs('user.devices.show')"
                >
                    {{ __("Dispozitiv") }}
                </x-responsive-nav-link>
            @endif

            @if (Request::user()->role === "admin")
                <x-responsive-nav-link href="{{ route('devices.index') }}" :active="request()->routeIs('devices.index')">
                    {{ __('Dispozitive') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('users.index' )}}" :active="request()->routeIs('users.index')">

                    {{ __('Utilizatori') }}
                </x-responsive-nav-link>
            @endif

            @if (Request::user()->role === "admin" || Request::user()->role === "generator")
                <x-responsive-nav-link
                    href="{{ route('device-reports.index') }}"
                    :active="request()->routeIs('device-reports.index')"
                >
                    {{ __('Rapoarte Dispozitive') }}
                </x-responsive-nav-link>
            @endif

            @if (Request::user()->role === "uat")
                <x-responsive-nav-link
                    href="{{ route('uat.devices.index') }}"
                    :active="request()->routeIs('uat.devices.index')"
                >
                    {{ __('Dispozitive') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link
                    href="{{ route('uat.users.index') }}"
                    :active="request()->routeIs('uat.users.index')"
                >
                    {{ __("Utilizatori") }}
                </x-responsive-nav-link>
            @endif

            @if (Request::user()->role === "operator")
                <x-responsive-nav-link
                    href="{{ route('operator.devices.index') }}"
                    :active="request()->routeIs('operator.devices.index')"
                >
                    {{ __('Dispozitive') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link
                    href="{{ route('operator.notifications.index') }}"
                    :active="request()->routeIs('operator.notifications.index')"
                >
                    {{ __('Notificari') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 me-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium  text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium  text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profil') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Deconectare') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</nav>
