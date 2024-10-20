<?php

namespace App\Http\Controllers\Uat;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        Gate::authorize("viewAny", User::class);
        return view("roles.uat.users.index", [
            "users" => User::query()
                ->where("city", "=", auth()->user()->city)
                ->whereNot("role", "admin")
                ->when(request("search"), fn($query, $search) =>
                    $query->where("name", "like", "%$search%")
                        ->orWhere("email", "like", "%$search%")
                )
                ->orderBy("name")
                ->paginate(6)
        ]);
    }

    public function create()
    {
        Gate::authorize("create", User::class);
        return view("roles.uat.users.create");
    }

    public function edit(User $user)
    {
        Gate::authorize("update", $user);
        return view("roles.uat.users.edit", compact("user"));
    }

    public function destroy(User $user)
    {
        Gate::authorize("delete", $user);
        $user->delete();
        return redirect()
            ->route("uat.users.index")
            ->with("success", __("Utilizatorul a fost șters cu succes!"));
    }
}
