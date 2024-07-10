<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Livewire\CardPanel;
use App\Models\Card;
use App\Models\Device;
use App\Models\User;
use App\Rules\CNP;
use App\Rules\CUIorCIF;
use App\Rules\ONRCNumberValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->paginate(10);

        return view('roles.admin.users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view("roles.admin.users.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|max:255",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8|confirmed",
            "city" => "required|max:255",
            "role" => "required|in:user,uat,operator",
            "type" => "nullable|in:homeowners-association,individual,legal-entity",
            "cnp" => ["nullable","max:255",new CNP()],
            "cui" =>["nullable", new CUIorCIF()],
            "cif" =>["nullable",new CUIorCIF()],
            "contract_number" => "nullable|max:255|unique:users,contract_number",
            "contact_person" => "nullable|max:255",
            "inhabitants" => "nullable|integer",
            "address" => "nullable|max:255",
            "phone" => "nullable|digits:10",
            "address_work" => "nullable|max:255",
            "onrc_number" => ["nullable", new ONRCNumberValidation()],
        ], [
            "name.required" => "Câmpul nume este obligatoriu.",
            "name.max" => "Numele trebuie să aibă maxim 255 de caractere.",

            "email.required" => "Câmpul email este obligatoriu.",
            "email.email" => "Emailul trebuie să fie valid.",
            "email.unique" => "Emailul este deja folosit.",

            "password.confirmed" => "Parolele nu coincid.",
            "password.min" => "Parola trebuie să aibă cel puțin 8 caractere.",
            "password.required" => "Câmpul parolă este obligatoriu.",

            "city.required" => "Câmpul oraș este obligatoriu.",
            "city.max" => "Orașul trebuie să aibă maxim 255 de caractere.",

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
        ]);

        $data["password"] = Hash::make($data['password']);
        $user = User::query()->create($data);


        return redirect()->route("users.index")->with("success", "Utilizatorul a fost creat cu succes.");
    }

    public function show(User $user)
    {

    }

    public function edit(User $user)
    {
        return view("roles.admin.users.edit", [
            "user" => $user,
            "devices" => Device::all()
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->validate([
            "name" => "required|max:255",
            "email" => ["required", "email", Rule::unique('users')->ignore($user->id)],
            "city" => "nullable|max:255",
            "role" => "required|in:admin,user,generator,uat,operator",
            "device_id" => "nullable|exists:devices,id",
            "type" => "nullable|in:homeowners-association,individual,legal-entity",
            "cnp" => ["nullable","max:255",new CNP()],
            "cui"  =>"nullable|max:255",
            "cif" => "nullable|max:255",
            "contract_number" => ["nullable","max:255", Rule::unique('users','contract_number')->ignore($user->id)],
            "contact_person" => "nullable|max:255",
            "inhabitants" => "nullable|integer",
            "address" => "nullable|max:255",
            "phone" => "nullable|max:255",
            "address_work" => "nullable|max:255",
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

            "city.required" => "Câmpul oraș este obligatoriu.",
            "city.max" => "Orașul trebuie să aibă maxim 255 de caractere.",

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
        ]));


        return redirect()->route("users.edit", [
            "user" => $user
        ])->with("success", "Utilizatorul a fost actualizat cu succes.");
    }

    public function destroy(User $user)
    {
        $card=Card::query()->where("user_id",$user->id)->first();
        if ($card) {
            $card->delete();
        }
        $user->delete();
        return redirect()->route("users.index");
    }

    public function assignDevice(Request $request, Device $device)
    {
        $request->validate([
            "user" => "required|exists:users,id"
        ],[
            "user.required" => "Utilizatorul este obligatoriu.",
            "user.exists" => "Utilizatorul nu există."
        ]);

        $user = User::query()->where("id", $request->user)->firstOrFail();
        $user->device_id = $device->id;
        $user->save();
        return redirect()->back();
    }

    public function removeDevice(User $user)
    {
        $user->device_id = null;
        $user->save();
        return redirect()->back();
    }
}
