<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

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
            "cnp" => "nullable|max:255",
            "cui" =>"nullable|max:255",
            "cif" =>"nullable|max:255",
            "contract_number" => "nullable|max:255",
            "contact_person" => "nullable|max:255",
            "inhabitants" => "nullable|integer",
            "address" => "nullable|max:255",
            "phone" => "nullable|max:255",
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
            "email" => "required|email|unique:users,email," . $user->id,
            "city" => "nullable|max:255",
            "role" => "required|in:user",
            "type" => "nullable|in:homeowners-association,individual,legal-entity",
            "cnp" => "nullable|max:255",
            "cui" =>"nullable|max:255",
            "cif" =>"nullable|max:255",
            "contract_number" => "nullable|max:255",
            "contact_person" => "nullable|max:255",
            "inhabitants" => "nullable|integer",
            "address" => "nullable|max:255",
            "phone" => "nullable|max:255",
            "device_id" => "nullable|exists:devices,id",
        ],[
            "email.required" => "Email-ul este deja folosit",
            "name.required" => "Numele este obligatoriu",
            "role.required" => "Rolul este obligatoriu",
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
