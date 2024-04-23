<x-guest-layout>
    <div class=" min-h-screen flex-col flex">
        <div
            class="w-full flex-grow bg-[url('/public/img.jpg')] bg-cover bg-center flex justify-center ">
            <div class="flex flex-col pt-12 items-center">
                <h1 class=" text-center text-5xl text-black font-bold drop-shadow-lg">{{__("BINE AI VENIT PE PLATFORMA")}}
                    <span class="text-green-600 font-bold">{{__("INFOPUBELE")}}</span>
                </h1>
                <p class="mt-5 text-center text-lg text-black">{{__("Această platformă este utilizată pentru tranzacții cu pubelele noastre.")}}</p>
                @auth
                    <a class="mt-8 px-12 py-3 bg-green-600 hover:from-amber-600 hover:to-red-700 text-xl text-white/70 font-semibold drop-shadow-lg rounded-full"
                       href="{{route('dashboard')}}">{{__("Dashboard")}}
                    </a>
                @endauth
                @guest
                    <a class="mt-8 px-12 py-3 bg-green-600 hover:from-amber-600 hover:to-red-700 text-xl text-white/70 font-semibold drop-shadow-lg rounded-full"
                       href="{{route('about')}}">{{__("Despre noi")}}
                    </a>
                @endauth
            </div>
        </div>
    </div>
    <x-text-card>
        <h2 class="font-bold text-3xl">{{__("Reciclarea")}}</h2>
        <br>
        <p>{{__("Reciclarea este un proces esențial pentru protejarea mediului înconjurător și pentru conservarea
                        resurselor naturale. Este o practică prin care materialele utilizate sunt colectate, sortate,
                        prelucrate și transformate în noi produse sau materii prime, în loc să fie aruncate la groapa de
                        gunoi sau incinerate.")}}</p>
        <br>
        <p>{{__("Importanța reciclării este una crucială în lupta împotriva poluării și schimbărilor climatice.")}}</p>
        <br>
        <p>{{__("Iată câteva motive pentru care reciclarea este atât de importantă:")}}</p>
        <br>
        <ol class="list-decimal ml-12 space-y-2">
            <li>{{__("Protejarea mediului: Reciclarea reduce cantitatea de deșeuri care ajung în depozitele de
                            gunoi sau în natură. Deșeurile care nu sunt reciclate pot polua solul, apa și aerul, având
                            un impact negativ asupra ecosistemelor și biodiversității.")}}</li>
            <li>{{__("Economisirea resurselor naturale: Reciclarea reduce dependența de materii prime noi, cum ar
                            fi lemnul, petrolul sau mineralele. Prin reciclare, putem extrage și utiliza materialele
                            deja existente într-un ciclu continuu, evitând epuizarea resurselor naturale limitate ale
                            Pământului.")}}</li>
            <li>{{__("Reducerea emisiilor de gaze cu efect de seră: Producerea de noi produse din materiale
                            reciclate necesită mai puțină energie decât producția din materii prime noi. Astfel,
                            reciclarea contribuie la reducerea emisiilor de gaze cu efect de seră și la combaterea
                            schimbărilor climatice.")}}</li>
            <li>{{__("Economisirea energiei: Procesul de reciclare necesită, în general, mai puțină energie decât
                            producția de materiale noi. De exemplu, reciclarea hârtiei poate economisi până la 60% din
                            energia necesară pentru fabricarea hârtiei noi.")}}</li>
            <li>{{__("Crearea de locuri de muncă și stimularea economiei circulare: Industria reciclării oferă
                            oportunități de angajare și contribuie la dezvoltarea unei economii circulare, în care
                            resursele sunt utilizate în mod eficient și durabil.")}}</li>
        </ol>
        <br>
        <p>{{__("Pentru a maximiza beneficiile reciclării, este important să fim conștienți de impactul pe care
                        îl avem asupra mediului și să adoptăm obiceiuri de consum responsabile. Sortarea corectă a
                        deșeurilor și reciclarea lor în mod regulat sunt pași simpli pe care îi putem face pentru a
                        contribui la protejarea mediului și la crearea unui viitor mai sustenabil.")}}
        </p>
        <br>
        <p><b class="font-extrabold">{{__("Infopubele.ro")}}</b> {{__("reprezintă o soluție inovatoare și eficientă
                        pentru colectarea selectivă a deșeurilor, promovând transparența, responsabilitatea și
                        implicarea fiecărei persoane în protejarea mediului înconjurător.")}}

        </p>
        <br>
        <p class="font-extrabold">{{__("Prin utilizarea tehnologiei și a unei abordări inovatoare,
                        Infopubele.ro își propune să transforme gestionarea deșeurilor într-un proces simplu, inteligent
                        și sustenabil.")}}
        </p>
    </x-text-card>
    <x-text-card>
        <div class="space-y-4">
            <h2 class="font-bold text-3xl">{{__("Locația pubelelor")}}</h2>
                <x-maps-google style="width:95%; aspect-ratio: 2/1; margin-inline: auto;"
                               :mapType="'roadmap'"
                               :zoomLevel="12" :centerPoint="['lat' => 44.4259534, 'long' => 26.1098351]"
                               :markers="[[ 44.4172634,26.028211 ], [ 44.4261628,26.0251783 ]]"
                ></x-maps-google>
        </div>
    </x-text-card>
    <x-footer></x-footer>
</x-guest-layout>
