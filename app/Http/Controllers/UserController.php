<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        if (Auth::user()->role==='admin')
        {
            $users = User::query()->paginate(10);
        }
        elseif (Auth::user()->role==='uat')
        {
            $users = User::query()->where('role','=','operator')->paginate(10);
        }

        return view('users.index',['users'=>$users]);
    }

    public function create() {
        if (Auth::user()->role==='admin')
        {
            return view("users.create");
        }
        elseif (Auth::user()->role==='uat')
        {
            $devices = Device::get();
            return view("users.create_operator",['devices'=>$devices]);
        }
    }

    public function store(Request $request) {
        if (Auth::user()->role==='admin')
        {
            $user = User::query()->create($request->validate([
                "name" => "required|max:255",
                "email" => "required|email|unique:users,email",
                "password" => "required|confirmed|min:8",
                "city" => "required|max:255",
                "role" => "required|in:admin,user,generator,uat,operator"
            ]));
        }
        elseif (Auth::user()->role==='uat')
        {
            $user = User::query()->create([...$request->validate([
                "name" => "required|max:255",
                "email" => "required|email|unique:users,email",
                "password" => "required|confirmed|min:8",
                "city" => "required|max:255",
            ]),
                "role" => "operator"
            ]);

        }
        return redirect()->route("users.index");
    }

    public function show(User $user) {
    }

    public function edit(User $user) {
        if (Auth::user()->role==='admin')
        {
            return view("users.edit", [
                "user" => $user,
                "devices" => Device::all()
            ]);
        }
        elseif (Auth::user()->role==='uat')
        {
            return view("users.edit_operator", [
               "user" => $user,
                "devices" => Device::all()
            ]);
        }

    }

    public function update(Request $request, User $user) {
        if (Auth::user()->role==='admin')
        {
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
        elseif (Auth::user()->role==='uat')
        {
            $user->update($request->validate([
                "name" => "required|max:255",
                "email" => "required|email|unique:users,email," . $user->id,
                "city" => "required|max:255",
                "role" => "same",
                "device_id" => "nullable|exists:devices,id"
            ]));
            return redirect()->route("users.edit", [
                "user" => $user
            ]);
        }


    }

    public function destroy(User $user) {
    }


 }
