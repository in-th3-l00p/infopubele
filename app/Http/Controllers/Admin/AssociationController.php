<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ("roles.admin.associations.index",[
            "associations" => Association::query()
                ->latest()
                ->paginate(5)
        ]);
    }

    public function create()
    {
        return view("roles.admin.associations.create");
    }

    public function show(string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
