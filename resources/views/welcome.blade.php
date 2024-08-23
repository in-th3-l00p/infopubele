<x-guest-layout>
    <div class="relative isolate overflow-hidden bg-white">
        <svg
            class="absolute inset-0 -z-10 h-full w-full stroke-gray-200 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]"
            aria-hidden="true">
            <defs>
                <pattern id="0787a7c5-978c-4f66-83c7-11c213f99cb7" width="200" height="200" x="50%" y="-1"
                         patternUnits="userSpaceOnUse">
                    <path d="M.5 200V.5H200" fill="none"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#0787a7c5-978c-4f66-83c7-11c213f99cb7)"/>
        </svg>
        <div class="mx-auto max-w-7xl px-6 pb-24 pt-10 sm:pb-32 lg:flex lg:px-8 lg:py-40">
            <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-xl lg:flex-shrink-0 lg:pt-8">
                <div class="flex items-center gap-4">
                    <img
                        class="h-11"
                        src="/logo.png"
                        alt="logo"
                    >
                    <h1 class="text-4xl">Infopubele.ro</h1>
                </div>
                <h1 class="mt-10 text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                    Platești cât arunci
                </h1>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    O soluție inteligentă pentru colectarea selectivă a deșeurilor prin containere inteligente
                </p>
                <div class="mt-10 flex items-center gap-x-6">
                    <a
                        href="{{ route("login") }}"
                        class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600"
                    >
                        Loghează-te
                    </a>
                    <a
                        href="{{ route("about") }}"
                        class="text-sm font-semibold leading-6 text-gray-900"
                    >
                        Află mai multe
                    </a>
                </div>
            </div>
            <div
                class="mx-auto mt-16 flex max-w-2xl sm:mt-24 lg:ml-10 lg:mr-0 lg:mt-0 lg:max-w-none lg:flex-none xl:ml-32">
                <div class="max-w-3xl flex-none sm:max-w-5xl lg:max-w-none">
                    <div
                        class="-m-2 rounded-xl bg-gray-900/5 p-2 ring-1 ring-inset ring-gray-900/10 lg:-m-4 lg:rounded-2xl lg:p-4">
                        <img
                            src="/screenshot.png"
                            alt="App screenshot"
                            width="2432"
                            height="1442"
                            class="w-[76rem] rounded-md shadow-2xl ring-1 ring-gray-900/10"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-base font-semibold leading-7 text-green-600">Reciclează inteligent</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Colectarea selectivă, într-un mod optim</p>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    Mems Corporation SRL, prin infopuble.ro, oferă o soluție ecologică și eficientă pentru colectarea selectivă a deșeurilor, simplificând gestionarea acestora și contribuind la un mediu mai curat, prin următoarele funcționalități:
                </p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                            <svg class="h-5 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.5 17a4.5 4.5 0 01-1.44-8.765 4.5 4.5 0 018.302-3.046 3.5 3.5 0 014.504 4.272A4 4 0 0115 17H5.5zm3.75-2.75a.75.75 0 001.5 0V9.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0l-3.25 3.5a.75.75 0 101.1 1.02l1.95-2.1v4.59z" clip-rule="evenodd" />
                            </svg>
                            Monitorizare în timp real
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto">
                                Platforma Infopubele.ro permite utilizatorilor să vadă în timp real cantitatea de deșeuri aruncate, diferențiată pe categorii, oferind astfel control și transparență asupra impactului personal asupra mediului.
                            </p>
                            <p class="mt-6">
                                <a
                                    href="#"
                                    class="text-sm font-semibold leading-6 text-green-600"
                                >
                                    Află mai multe <span aria-hidden="true">→</span>
                                </a>
                            </p>
                        </dd>
                    </div>
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                            <svg class="h-5 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                            </svg>
                            Sistem "Plătești cât arunci"
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto">
                                Fiecare utilizator este taxat în funcție de cantitatea și tipul de deșeuri aruncate, încurajând reducerea și reciclarea eficientă printr-un sistem corect și transparent.
                            </p>
                            <p class="mt-6">
                                <a
                                    href="#"
                                    class="text-sm font-semibold leading-6 text-green-600"
                                >
                                    Află mai multe <span aria-hidden="true">→</span>
                                </a>
                            </p>
                        </dd>
                    </div>
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                            <svg class="h-5 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M15.312 11.424a5.5 5.5 0 01-9.201 2.466l-.312-.311h2.433a.75.75 0 000-1.5H3.989a.75.75 0 00-.75.75v4.242a.75.75 0 001.5 0v-2.43l.31.31a7 7 0 0011.712-3.138.75.75 0 00-1.449-.39zm1.23-3.723a.75.75 0 00.219-.53V2.929a.75.75 0 00-1.5 0V5.36l-.31-.31A7 7 0 003.239 8.188a.75.75 0 101.448.389A5.5 5.5 0 0113.89 6.11l.311.31h-2.432a.75.75 0 000 1.5h4.243a.75.75 0 00.53-.219z" clip-rule="evenodd" />
                            </svg>
                            Optimizare pentru firmele de salubrizare
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto">
                                Platforma centralizată oferă instrumente esențiale pentru firmele de salubrizare, inclusiv generarea de rapoarte, monitorizarea gradului de umplere a containerelor și optimizarea rutelor de colectare.
                            </p>
                            <p class="mt-6">
                                <a
                                    href="#"
                                    class="text-sm font-semibold leading-6 text-green-600"
                                >
                                    Află mai multe <span aria-hidden="true">→</span>
                                </a>
                            </p>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
    <div class="bg-white py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Misiunea noastră</h2>
                <div class="mt-6 flex flex-col gap-x-8 gap-y-20 lg:flex-row">
                    <div class="lg:w-full lg:max-w-2xl lg:flex-auto">
                        <p class="text-xl leading-8 text-gray-600">
                            La Mems Corporation SRL, ne angajăm să creăm o lume mai curată și mai sustenabilă, revoluționând gestionarea deșeurilor. Prin platforma noastră inovatoare, Infopubele.ro, facem colectarea selectivă a deșeurilor simplă, eficientă și prietenoasă cu mediul.
                        </p>
                        <p class="mt-10 max-w-xl text-base leading-7 text-gray-700">
                            Misiunea noastră este de a împuternici comunitățile să își controleze impactul asupra mediului prin furnizarea de date în timp real despre generarea de deșeuri, promovând responsabilitatea și reducerea deșeurilor depozitate în gropi de gunoi. Utilizând tehnologia inteligentă, ne propunem să generăm schimbări pozitive și să inspirăm o cultură a sustenabilității.
                        </p>
                    </div>
                    <div class="lg:flex lg:flex-auto lg:justify-center">
                        <dl class="w-64 space-y-8 xl:w-80">
                            <div class="flex flex-col-reverse gap-y-4">
                                <dt class="text-base leading-7 text-gray-600">Containere inteligente implementate</dt>
                                <dd class="text-5xl font-semibold tracking-tight text-green-600">1.200+</dd>
                            </div>
                            <div class="flex flex-col-reverse gap-y-4">
                                <dt class="text-base leading-7 text-gray-600">Deșeuri reduse anual</dt>
                                <dd class="text-5xl font-semibold tracking-tight text-green-600">15.000 tone</dd>
                            </div>
                            <div class="flex flex-col-reverse gap-y-4">
                                <dt class="text-base leading-7 text-gray-600">Utilizatori implicați</dt>
                                <dd class="text-5xl font-semibold tracking-tight text-green-600">35.000+</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overflow-hidden bg-white py-32">
        <div class="mx-auto max-w-7xl px-6 lg:flex lg:px-8">
            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-12 gap-y-16 lg:mx-0 lg:min-w-full lg:max-w-none lg:flex-none lg:gap-y-8">
                <div class="lg:col-end-1 lg:w-full lg:max-w-lg lg:pb-8">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Echipa noastră</h2>
                    <p class="mt-6 text-xl leading-8 text-gray-600">La Mems Corporation SRL, oamenii noștri sunt motorul inovației și dedicării noastre pentru un mediu mai curat și mai sustenabil. Fiecare membru al echipei aduce expertiză și pasiune pentru a transforma modul în care gestionăm deșeurile.</p>
                    <p class="mt-6 text-base leading-7 text-gray-600">Suntem mândri de diversitatea și profesionalismul echipei noastre, care lucrează neobosit pentru a crea soluții eficiente și inteligente. Împreună, construim o lume mai bună pentru generațiile viitoare.</p>
                    <div class="mt-10 flex">
                        <a href="#" class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Despre noi <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </div>
                <div class="flex flex-wrap items-start justify-end gap-6 sm:gap-8 lg:contents">
                    <div class="w-0 flex-auto lg:ml-auto lg:w-auto lg:flex-none lg:self-end">
                        <img
                            src="https://images.pexels.com/photos/802221/pexels-photo-802221.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            alt="recycled bottles of water"
                            class="aspect-[7/5] w-[37rem] max-w-none rounded-2xl bg-gray-50 object-cover"
                        >
                    </div>
                    <div class="contents lg:col-span-2 lg:col-end-2 lg:ml-auto lg:flex lg:w-[37rem] lg:items-start lg:justify-end lg:gap-x-8">
                        <div class="order-first flex w-64 flex-none justify-end self-end lg:w-auto">
                            <img
                                src="https://images.pexels.com/photos/9324359/pexels-photo-9324359.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="Recycling bin"
                                class="aspect-[4/3] w-[24rem] max-w-none flex-none rounded-2xl bg-gray-50 object-cover"
                            >
                        </div>
                        <div class="flex w-96 flex-auto justify-end lg:w-auto lg:flex-none">
                            <img
                                src="https://images.pexels.com/photos/761297/pexels-photo-761297.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="caps"
                                class="aspect-[7/5] w-[37rem] max-w-none flex-none rounded-2xl bg-gray-50 object-cover"
                            >
                        </div>
                        <div class="hidden sm:block sm:w-0 sm:flex-auto lg:w-auto lg:flex-none">
                            <img
                                src="https://images.pexels.com/photos/2967770/pexels-photo-2967770.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="packed cardboards"
                                class="aspect-[4/3] w-[24rem] max-w-none rounded-2xl bg-gray-50 object-cover"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-white">
        <div class="mx-auto max-w-7xl px-6 py-12 md:flex md:items-center md:justify-between lg:px-8">
            <div class="flex justify-center space-x-6 md:order-2">
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Facebook</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">YouTube</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            <div class="mt-8 md:order-1 md:mt-0">
                <p class="text-center text-xs leading-5 text-gray-500">&copy; 2024 Mems Corporation SRL. Toate drepturile sunt rezervate.</p>
            </div>
        </div>
    </footer>

</x-guest-layout>
