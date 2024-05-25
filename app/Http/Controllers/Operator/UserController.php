<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\User;
use App\Rules\CNP;
use App\Rules\CUIorCIF;
use App\Rules\ONRCNumberValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index() {
        return view("roles.operator.users.index", [
            "users" => User::query()
                ->latest()
                ->where(function($query) {
                    $query->where([
                        ['role', '=', 'user'],
                        ['city', '=', auth()->user()->city],
                    ]);
                })
                ->paginate(10)
        ]);
    }

    public function create() {
        return view("roles.operator.users.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|max:255",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8|confirmed",
            "role" => "required|in:user",
            "type" => "nullable|in:homeowners-association,individual,legal-entity",
            "cnp" => ["nullable","max:255",new CNP()],
            "cui" =>["nullable",new CUIorCIF()],
            "cif" =>["nullable",new CUIorCIF()],
            "contract_number" => "nullable|max:255|unique:users,contract_number",
            "contact_person" => "nullable|max:255",
            "inhabitants" => "nullable|integer",
            "address" => "nullable|max:255",
            "phone" => "nullable|max:255",
            "onrc_number" => ["nullable", new ONRCNumberValidation()],
        ],[
            "name.required" => "Câmpul nume este obligatoriu.",
            "name.max" => "Numele trebuie să aibă maxim 255 de caractere.",

            "email.required" => "Câmpul email este obligatoriu.",
            "email.email" => "Emailul trebuie să fie valid.",
            "email.unique" => "Emailul este deja folosit.",

            "password.confirmed" => "Parolele nu coincid.",
            "password.min" => "Parola trebuie să aibă cel puțin 8 caractere.",
            "password.required" => "Câmpul parolă este obligatoriu.",

            "role.required" => "Câmpul rol este obligatoriu.",
            "role.in" => "Rolul utilizatorului nu este valid.",

            "type.in" => "Tipul de utilizator nu este valid.",

            "cnp.max" => "CNP-ul trebuie să aibă maxim 255 de caractere.",

            "cui.max" => "CUI-ul trebuie să aibă maxim 255 de caractere.",

            "cif.max" => "CIF-ul trebuie să aibă maxim 255 de caractere.",

            "contract_number.max" => "Numărul de contract trebuie să aibă maxim 255 de caractere.",

            "contact_person.max" => "Persoana de contact trebuie să aibă maxim 255 de caractere.",
       "contract_number.unique" => "Numărul de contract este deja folosit.",
            "inhabitants.integer" => "Numărul de locuitori trebuie să fie un număr întreg.",

            "address.max" => "Adresa trebuie să aibă maxim 255 de caractere.",

            "phone.max" => "Numărul de telefon trebuie să aibă maxim 255 de caractere.",
            "phone.digits" => "Numărul de telefon trebuie să aibă 10 cifre.",

            "address_work.max" => "Adresa de lucru trebuie să aibă maxim 255 de caractere.",

            "onrc_number.max" => "Numărul ONRC trebuie să aibă maxim 255 de caractere.",
        ]);

        $data["password"] = Hash::make($data['password']);
        $user = User::query()->create([
            ...$data,
            "city" => auth()->user()->city
        ]);

        return redirect()->route("operator.users.index")->with("success", "Utilizatorul a fost creat cu succes.");
    }
    public function edit(User $user)
    {
        Gate::allowIf(
            auth()->user()->city === $user->city,
            __("You are not authorized to access this page.")
        );
        return view("roles.operator.users.edit", [
            "user" => $user,
            "devices" => Device::where("city", auth()->user()->city)->get(),
        ]);
    }
    public function update(User $user, Request $request)
    {
        $user->update($request->validate([
            "name" => "required|max:255",
            "email" => ["required", "email", Rule::unique('users')->ignore($user->id)],
            "city" => "nullable|max:255",
            "role" => "required|in:user",
            "type" => "nullable|in:homeowners-association,individual,legal-entity",
            "cnp" => ["nullable","max:255",new CNP()],
            "cui" =>["nullable",new CUIorCIF()],
            "cif" =>["nullable",new CUIorCIF()],
            "contract_number" => "nullable|max:255|unique:users,contract_number",
            "contact_person" => "nullable|max:255",
            "inhabitants" => "nullable|integer",
            "address" => "nullable|max:255",
            "phone" => "nullable|max:255",
            "onrc_number" => ["nullable", new ONRCNumberValidation()],
            "device_id" => "nullable|exists:devices,id",
        ],[
            "name.required" => "Câmpul nume este obligatoriu.",
            "name.max" => "Numele trebuie să aibă maxim 255 de caractere.",

            "email.required" => "Câmpul email este obligatoriu.",
            "email.email" => "Emailul trebuie să fie valid.",
            "email.unique" => "Emailul este deja folosit.",

            "password.confirmed" => "Parolele nu coincid.",
            "password.min" => "Parola trebuie să aibă cel puțin 8 caractere.",
            "password.required" => "Câmpul parolă este obligatoriu.",

            "role.required" => "Câmpul rol este obligatoriu.",
            "role.in" => "Rolul utilizatorului nu este valid.",

            "type.in" => "Tipul de utilizator nu este valid.",

            "cnp.max" => "CNP-ul trebuie să aibă maxim 255 de caractere.",

            "cui.max" => "CUI-ul trebuie să aibă maxim 255 de caractere.",

            "cif.max" => "CIF-ul trebuie să aibă maxim 255 de caractere.",

            "contract_number.max" => "Numărul de contract trebuie să aibă maxim 255 de caractere.",
            "contract_number.unique" => "Numărul de contract este deja folosit.",

            "contact_person.max" => "Persoana de contact trebuie să aibă maxim 255 de caractere.",

            "inhabitants.integer" => "Numărul de locuitori trebuie să fie un număr întreg.",

            "address.max" => "Adresa trebuie să aibă maxim 255 de caractere.",

            "phone.max" => "Numărul de telefon trebuie să aibă maxim 255 de caractere.",
            "phone.digits" => "Numărul de telefon trebuie să aibă 10 cifre.",

            "address_work.max" => "Adresa de lucru trebuie să aibă maxim 255 de caractere.",

            "onrc_number.max" => "Numărul ONRC trebuie să aibă maxim 255 de caractere.",
        ]));

        $user->city = auth()->user()->city;
        return redirect()->route("operator.users.edit", [
            "user" => $user
        ])->with("success", "Utilizatorul a fost actualizat cu succes.");

    }
    public function destroy(User $user)
    {
        if ($user->role === 'user' && $user->city === auth()->user()->city)
            $user->delete();
        return redirect()->route("operator.users.index");
    }
}
