<?php

namespace App\Http\Controllers\Uat;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// todo authorize
class UserController extends Controller
{
    public function index() {
        return view("roles.uat.users.index", [
            "users" => User::query()
                ->latest()
                ->where("role", "=", "operator")
                ->paginate(10)
        ]);
    }

    public function create() {
        return view("roles.uat.users.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|max:255",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed|min:8",
            "city" => "required|max:255",
        ]);
        $data["password"] = Hash::make($data['password']);
        $user = User::query()->create([
            ...$data,
            "role" => "operator"
        ]);

        return redirect()->route("uat.users.index");
    }
}
