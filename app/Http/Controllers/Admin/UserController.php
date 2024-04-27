<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            "role" => "required|in:admin,user,generator,uat,operator",
            "type" => "nullable|in:homeowners-association,individual,legal-entity",
            "cnp" => "nullable|max:255",
            "cui" =>"nullable|max:255",
            "cif" =>"nullable|max:255",
            "contract_number" => "nullable|max:255",
            "contact_person" => "nullable|max:255",
            "inhabitants" => "nullable|integer",
            "address" => "nullable|max:255",
            "phone" => "nullable|max:255",
        ], [
            "password.confirmed" => "Parolele nu coincid.",
            "password.min" => "Parola trebuie să aibă cel puțin 8 caractere.",
            "password.required" => "Câmpul parolă este obligatoriu.",
            "email.required" => "Câmpul email este obligatoriu.",
            "email.email" => "Emailul trebuie să fie valid.",
            "email.unique" => "Emailul este deja folosit.",
            "name.required" => "Câmpul nume este obligatoriu.",
            "city.required" => "Câmpul oraș este obligatoriu.",
            "role.required" => "Câmpul rol este obligatoriu."
        ]);

        $data["password"] = Hash::make($data['password']);
        $user = User::query()->create($data);

        return redirect()->route("users.index");
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
            "email" => "required|email|unique:users,email," . $user->id,
            "city" => "nullable|max:255",
            "role" => "required|in:admin,user,generator,uat,operator",
            "device_id" => "nullable|exists:devices,id",
            "type" => "nullable|in:homeowners-association,individual,legal-entity",
            "cnp" => "nullable|max:255",
            "cui"  =>"nullable|max:255",
            "cif" => "nullable|max:255",
            "contract_number" => "nullable|max:255",
            "contact_person" => "nullable|max:255",
            "inhabitants" => "nullable|integer",
            "address" => "nullable|max:255",
            "phone" => "nullable|max:255",
        ]));
        return redirect()->route("users.edit", [
            "user" => $user
        ])->with("success", "Utilizatorul a fost actualizat cu succes.");
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route("users.index");
    }

    public function assignDevice(Request $request, Device $device)
    {
        $request->validate([
            "user" => "required|exists:users,id"
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
