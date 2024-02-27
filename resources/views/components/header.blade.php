<div class="flex my-3 pl-[12%] lg:px-[12%] justify-between ">
    <div class="flex lg:hidden justify-between w-screen">
        <div class="flex">
            <img src="/logo.png" alt="" class="h-10 ">
            <p class=" my-auto ml-2 text-2xl">Infopubele.ro</p>
        </div>
        <div class="">
                        <x-bladewind.dropmenu>
                            <x-bladewind.dropmenu-item>
                                <p class="text-black">Acasa</p>
                            </x-bladewind.dropmenu-item>
                            <x-bladewind.dropmenu-item>
                                <p class="text-black">Despre noi</p>
                            </x-bladewind.dropmenu-item>
                            <x-bladewind.dropmenu-item>
                                <p class="text-black">Contact</p>
                            </x-bladewind.dropmenu-item>
                            <x-bladewind.dropmenu-item>
                                <p class="text-black">Logare</p>
                            </x-bladewind.dropmenu-item>
                            <x-bladewind.dropmenu-item>
                                <p class="text-black">Inregistrare</p>
                            </x-bladewind.dropmenu-item>
                        </x-bladewind.dropmenu>

        </div>

    </div>
    <div class="hidden lg:flex space-x-3">
        <img src="/logo.png" alt="" class="h-10 ">
        <p class="my-auto ml-2 text-2xl">Infopubele.ro</p>
        <x-nav-link href="" class="text-xl">
            Acasa
        </x-nav-link>
        <x-nav-link href="" class="text-xl">
            Despre noi
        </x-nav-link>
        <x-nav-link href="" class="text-xl">
            Contact
        </x-nav-link>
    </div>
    <div class="hidden lg:flex flex my-3">
        <x-nav-link href="" class="text-xl">
            Logare
        </x-nav-link>
        <x-nav-link href="" class="text-xl">
            Inregistrare
        </x-nav-link>
    </div>
</div>
