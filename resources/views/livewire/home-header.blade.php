<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex my-3">
                    <a href="{{route("welcome")}}"><img src="/logo.png" alt="" class="h-10 "></a>
                    <a class="my-auto ml-2" href="{{route("welcome")}}"><p class="  text-2xl">Infopubele.ro</p></a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-3  sm:ms-4 sm:flex">
                    <x-nav-link href="{{route('welcome')}}" class="text-xl">
                        {{__("Acasă")}}
                    </x-nav-link>
                    <x-nav-link href="{{route('about')}}" class="text-xl">
                        {{__("Despre noi")}}
                    </x-nav-link>
                    <x-nav-link href="{{route('contact')}}" class="text-xl">
                        {{__("Contact")}}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @guest
                    <x-nav-link href="{{route('login')}}" class="text-xl">
                        {{__("Conectează-te")}}
                    </x-nav-link>
                    <x-nav-link href="" class="text-xl">
                        {{__("Înregistrează-te")}}
                    </x-nav-link>
                @endguest

                @auth
                    <x-nav-link href="{{route('dashboard')}}" class="text-xl">
                        {{__("Dashboard")}}
                    </x-nav-link>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
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
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{route('welcome')}}" class="text-xl">
                {{__("Acasă")}}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{route('about')}}" class="text-xl">
                {{__("Despre noi")}}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{route('contact')}}" class="text-xl">
                {{__("Contact")}}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="mt-3 space-y-1">
                @guest
                    <x-responsive-nav-link href="{{route('login')}}" class="text-xl">
                        {{__("Conectează-te")}}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="" class="text-xl">
                        {{__("Înregistrează-te")}}
                    </x-responsive-nav-link>
                @endguest

                @auth
                    <x-responsive-nav-link href="{{route('dashboard')}}" class="text-xl">
                        {{__("Dashboard")}}
                    </x-responsive-nav-link>
                @endauth
            </div>
        </div>
    </div>
</nav>
