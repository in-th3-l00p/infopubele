<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeviceReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeviceReportController extends Controller
{
    public function index() {
        Gate::authorize("viewAny", DeviceReport::class);
        return view("roles.admin.devices.reports.index", [
            "deviceReports" => DeviceReport::query()->latest()->paginate(5)
        ]);
    }

    public function create() {
        Gate::authorize("create", DeviceReport::class);
        return view("roles.admin.devices.reports.create");
    }

    public function show(DeviceReport $deviceReport) {
        Gate::authorize("view", $deviceReport);
        return view("roles.admin.devices.reports.show", [
            "deviceReport" => $deviceReport
        ]);
    }

    public function destroy(DeviceReport $deviceReport)
    {
        Gate::authorize("delete", $deviceReport);
        $deviceReport->delete();
        return redirect()
            ->route("admin.device-reports.index")
            ->with("success", __('Raportul dispositivului a fost șters cu succes'));
    }
}
