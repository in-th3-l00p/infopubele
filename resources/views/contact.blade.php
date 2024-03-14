<x-guest-layout>
        <x-text-card>
            <h1 class=" mt-8 font-bold text-3xl">Contact</h1>
                <p>Trimite echipei Infopubele.ro intrebarea sau comentariul tau.
                    Te rugam sa completezi formularul de mai jos. Vei primi un raspuns in maxim 24 ore lucratoare.</p>
                <br>
            <form action="" method="POST">
                @csrf
                <div class="mb-4 flex flex-col space-y-3">
                    <label for="title">
                        {{__("Prenume")}}
                    </label>
                    <input type="text" name="prenume" id="prenume" class="input"
                        @class(['border-red-500'=>$errors->has('prenume')])>
                    @error('prenume')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-4 flex flex-col space-y-3">
                    <label for="nume">{{__("Nume")}}</label>
                    <input type="text" name="nume" id="nume" class="input"
                        @class(['border-red-500'=>$errors->has('nume')])>
                    @error('nume')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-4 flex flex-col space-y-3">
                    <label for="email">{{__("Email")}}</label>
                    <input type="text" name="email" id="email" class="input"
                        @class(['border-red-500'=>$errors->has('email')])>
                    @error('email')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-4 flex flex-col space-y-3">
                    <label for="numar-de-telefon">{{__("Numar de telefon")}}</label>
                    <input type="text" name="numar-de-telefon" id="numar-de-telefon" class="input"
                        @class(['border-red-500'=>$errors->has('numar-de-telefon')])>
                    @error('numar-de-telefon')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-4 flex flex-col space-y-3">
                    <label for="mesaj">{{__("Mesaj")}}</label>
                    <textarea name="mesaj" id="mesaj" class="input"
                              @class(['border-red-500'=>$errors->has('mesaj')])
                              rows="15"></textarea>
                    @error('mesaj')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>

                <div class="text-center pb-4">
                    <button type="submit" class="btn">
                        {{__("Trimite")}}
                    </button>
                </div>
            </form>
        </x-text-card>
    <x-footer/>
</x-guest-layout>
