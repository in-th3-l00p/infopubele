<div class="flex my-3 px-8  sm:px-12 lg:px-16 justify-between h-[40px] ">
    <div class="flex lg:hidden justify-between w-screen">
        <div class="flex">
            <img src="/logo.png" alt="" class="h-10 ">
            <p class=" my-auto ml-2 text-2xl">Infopubele.ro</p>
        </div>
        <div class="">
            <x-bladewind.dropmenu>
                <x-bladewind.dropmenu-item>
                    <p class="text-black"></p>
                </x-bladewind.dropmenu-item>
                <x-bladewind.dropmenu-item>
                    <p class="text-black"><a href="{{route('about')}}">Despre noi</a></p>
                </x-bladewind.dropmenu-item>
                <x-bladewind.dropmenu-item>
                    <p class="text-black"><a href="{{route('contact')}}">Contact</a></p>
                </x-bladewind.dropmenu-item>
                @guest
                    <x-bladewind.dropmenu-item>
                        <p class="text-black"><a href="{{route('login')}}">Logare</a></p>
                    </x-bladewind.dropmenu-item>
                    <x-bladewind.dropmenu-item>
                        <p class="text-black"><a href="{{route('register')}}">Inregistrare</a></p>
                    </x-bladewind.dropmenu-item>
                @endguest
                @auth
                    <x-bladewind.dropmenu-item>
                        <p class="text-black"><a href="{{route('dashboard')}}">Dashboard</a></p>
                    </x-bladewind.dropmenu-item>
                @endauth
            </x-bladewind.dropmenu>
        </div>

    </div>
    <div class="hidden lg:flex space-x-3">
        <img src="/logo.png" alt="" class="h-10 ">
        <p class="my-auto ml-2 text-2xl">Infopubele.ro</p>
        <x-nav-link href="{{route('welcome')}}" class="text-xl">
            Acasa
        </x-nav-link>
        <x-nav-link href="{{route('about')}}" class="text-xl">
            Despre noi
        </x-nav-link>
        <x-nav-link href="{{route('contact')}}" class="text-xl">
            Contact
        </x-nav-link>
    </div>
    <div class="hidden lg:flex flex my-3">
        @guest
            <x-nav-link href="{{route('login')}}" class="text-xl">
                Logare
            </x-nav-link>
            <x-nav-link href="" class="text-xl">
                Inregistrare
            </x-nav-link>
        @endguest

        @auth
            <x-nav-link href="{{route('dashboard')}}" class="text-xl">
                Dashboard
            </x-nav-link>
        @endauth
    </div>
</div>
