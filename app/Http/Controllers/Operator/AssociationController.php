<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AssociationController extends Controller
{
    public function index()
    {
        Gate::allowIf(function () {
            return auth()->user()->role === "operator";
        });
        return view ("roles.operator.associations.index",[
            "associations" => Association::query()
                ->latest()
                ->paginate(5)
        ]);
    }

    public function create()
    {
        return view('roles.operator.associations.create');
    }

    public function show(Association $association)
    {
        return view('roles.operator.associations.show', [
            'association' => $association
        ]);
    }

    public function destroy(Association $association)
    {
        $association->delete();
        return redirect()->route('operator.associations.index');
    }
}
