<?php

namespace App\Http\Controllers\Uat;

use App\Http\Controllers\Controller;
use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::allowif(function () {
            return auth()->user()->role === "admin" || auth()->user()->role === "uat";
        });
        return view("roles.uat.associations.index", [
            "associations" => Association::query()
                ->latest()
                ->paginate(5)
                ->where("city", "=", auth()->user()->city)
        ]);
    }

    public function create()
    {
        Gate::allowif(function () {
            return auth()->user()->role === "admin" || auth()->user()->role === "uat";
        });
        return view('roles.uat.associations.create');
    }

    public function show(Association $association)
    {
        Gate::allowif(function () {
            return auth()->user()->role === "admin" || auth()->user()->role === "uat";
        });
        return view('roles.uat.associations.show', [
            'association' => $association
        ]);
    }
    public function destroy(Association $association)
    {
        Gate::allowif(function () {
            return auth()->user()->role === "admin" || auth()->user()->role === "uat";
        });
        $association->delete();
        return redirect()->route('associations.index');
    }
}
