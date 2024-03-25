<?php

namespace App\Http\Controllers\Uat;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

// todo authorize
class UserController extends Controller
{
    public function index() {
        Gate::allowIf(function () {
            return auth()->user()->role === "admin" || auth()->user()->role === "uat";
        });
        return view("roles.uat.users.index", [
            "users" => User::query()
                ->latest()
                ->where([
                    ['role', '=', 'operator'],
                    ['city', '=', auth()->user()->city],
                ])
                ->paginate(10)
        ]);
    }

    public function create() {
        Gate::allowIf(function () {
            return auth()->user()->role === "admin" || auth()->user()->role === "uat";
        });
        return view("roles.uat.users.create");
    }

    public function store(Request $request)
    {
        Gate::allowIf(function () {
            return auth()->user()->role === "admin" || auth()->user()->role === "uat";
        });
        $data = $request->validate([
            "name" => "required|max:255",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed|min:8",
            "city" => "required|max:255",
        ]);
        $data["password"] = Hash::make($data['password']);
        $user = User::query()->create([
            ...$data,
            "role" => "operator",
            "city" => auth()->user()->city
        ]);

        return redirect()->route("uat.users.index");
    }
    public function edit(User $user)
    {
        Gate::allowIf(function () {
            return auth()->user()->role === "admin" || auth()->user()->role === "uat";
        });
        return view("roles.uat.users.edit", [
            "user" => $user
        ]);
    }
    public function update(User $user, Request $request)
    {
        Gate::allowIf(function () {
            return auth()->user()->role === "admin" || auth()->user()->role === "uat";
        });
        $user->update($request->validate([
            "name" => "required|max:255",
            "email" => "required|email|unique:users,email," . $user->id,
            "city" => "required|max:255",
        ]));
        return redirect()->route("uat.users.edit", [
            "user" => $user
        ]);

    }
    public function destroy(User $user)
    {
        Gate::allowIf(function () {
        return auth()->user()->role === "admin" || auth()->user()->role === "uat";
        });
        if($user->role === 'operator') {
            $user->delete();
        }
        return redirect()->route("uat.users.index");
    }
}
