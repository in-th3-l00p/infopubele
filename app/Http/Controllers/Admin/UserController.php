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

        return view('roles.admin.users.index_admin', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view("roles.admin.users.create_admin");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|max:255",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8|confirmed",
            "city" => "required|max:255",
            "role" => "required|in:admin,user,generator,uat,operator"
        ], [
            "password.confirmed" => "Parolele nu coincid.",
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
        return view("roles.admin.users.edit_admin", [
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
            "device_id" => "nullable|exists:devices,id"
        ]));
        return redirect()->route("users.edit", [
            "user" => $user
        ]);
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
