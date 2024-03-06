<?php

namespace App\Http\Controllers\Generator;

use App\Http\Controllers\Controller;
use App\Models\DeviceReport;
use App\Policies\RolePolicies;

class DeviceReportController extends Controller
{
    public function constructor() {
        $this->authorizeResource(DeviceReport::class);
    }

    public function index() {
        return view("roles.generator.device-reports.index", [
            "reports" => DeviceReport::query()->latest()->paginate(10)
        ]);
    }

    public function create() {
        return view("roles.generator.device-reports.create");
    }

    public function show(DeviceReport $deviceReport) {
        return view("roles.generator.device-reports.show", [
            "report" => $deviceReport
        ]);
    }

    public function destroy(DeviceReport $deviceReport) {
        $deviceReport->delete();
        return redirect()->route("device-reports.index");
    }
}
