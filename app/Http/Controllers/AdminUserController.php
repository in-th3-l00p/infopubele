<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index() {
        $users = User::query()->paginate(10);
        return view('users.index', ['users' => $users]);
    }

    public function create() {
        return view("users.create");
    }

    public function store(Request $request) {
        $user = User::query()->create($request->validate([
            "name" => "required|max:255",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed|min:8",
            "city" => "required|max:255",
            "role" => "required|in:admin,user,generator,uat,operator"
        ]));

        return redirect()->route("users.index");
    }

    public function show(User $user) {
    }

    public function edit(User $user) {
        return view("users.edit", [
            "user" => $user,
            "devices" => Device::all()
        ]);
    }

    public function update(Request $request, User $user) {
        $user->update($request->validate([
            "name" => "required|max:255",
            "email" => "required|email|unique:users,email," . $user->id,
            "city" => "required|max:255",
            "role" => "required|in:admin,user,generator,uat,operator",
            "device_id" => "nullable|exists:devices,id"
        ]));

        return redirect()->route("users.edit", [
            "user" => $user
        ]);
    }

    public function destroy(User $user) {
    }
 }
