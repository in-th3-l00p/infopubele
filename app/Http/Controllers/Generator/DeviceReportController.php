<?php

namespace App\Http\Controllers\Generator;

use App\Http\Controllers\Controller;
use App\Models\DeviceReport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class DeviceReportController extends Controller
{
    public function constructor() {
        $this->authorizeResource(DeviceReport::class);
    }

    public function index() {

        if(Auth::user()->role==='admin')
        return view("roles.generator.device-reports.index", [
            "reports" => DeviceReport::query()->latest()->paginate(10)
        ]);
        elseif(Auth::user()->role!=="user")
        {
            return view("roles.generator.device-reports.index", [
                "reports" => DeviceReport::query()->where('device_city','=',Auth::user()->city)->latest()->paginate(10)
            ]);
        }
        else
        {
            return view("roles.generator.device-reports.index", [
                "reports" => DeviceReport::query()->where('user_id','=',Auth::user()->id)->latest()->paginate(10)
            ]);
        }
    }

    public function create() {
        return view("roles.generator.device-reports.create");
    }

    public function show(DeviceReport $deviceReport) {
        Gate::allowIf(
            Auth::user()->role === "admin" || Auth::user()->city === $deviceReport->device_city || Auth::user()->id === $deviceReport->user_id,
            __("You are not authorized to access this page."));
        return view("roles.generator.device-reports.show", [
            "report" => $deviceReport
        ]);
    }

    public function destroy(DeviceReport $deviceReport) {
        Gate::allowIf(
            Auth::user()->role === "admin" || Auth::user()->city === $deviceReport->device_city|| Auth::user()->id === $deviceReport->user_id,
            __("You are not authorized to access this page."));
        $deviceReport->delete();
        return redirect()->route("device-reports.index");
    }
}
