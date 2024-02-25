<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function index() {
    }

    public function create(Device $device) {
        return view("slots.create", [
            "device" => $device
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show(Slot $slot) {
        return view("slots.show", [
            "slot" => $slot
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slot $slot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slot $slot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slot $slot)
    {
        //
    }
}
