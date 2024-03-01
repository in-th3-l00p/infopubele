<?php

namespace App\Http\Controllers;

use App\Models\DeviceReport;
use Illuminate\Http\Request;

class DeviceReportController extends Controller
{
    public function index() {
        return view("device-reports.index", [
            "reports" => DeviceReport::query()->latest()->paginate(10)
        ]);
    }

    public function create() {
        return view("device-reports.create");
    }

    public function store(Request $request) {
        //
    }

    public function show(DeviceReport $deviceReport) {
        //
    }

    public function edit(DeviceReport $deviceReport) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DeviceReport $deviceReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeviceReport $deviceReport)
    {
        //
    }
}
