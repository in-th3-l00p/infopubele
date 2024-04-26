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
        Gate::allowif(
            Auth::user()->role !== "user",
            __("You are not authorized to access this page.")
        );
        if(Auth::user()->role==='admin')
        return view("roles.generator.device-reports.index", [
            "reports" => DeviceReport::query()->latest()->paginate(10)
        ]);
        else
        {
            return view("roles.generator.device-reports.index", [
                "reports" => DeviceReport::query()->where('device_city','=',Auth::user()->city)->latest()->paginate(10)
            ]);
        }
    }

    public function create() {
        Gate::allowif(
            Auth::user()->role !== "user",
            __("You are not authorized to access this page.")
        );
        return view("roles.generator.device-reports.create");
    }

    public function show(DeviceReport $deviceReport) {
        Gate::allowif(
            Auth::user()->role !== "user",
            __("You are not authorized to access this page.")
        );
        Gate::allowIf(
            Auth::user()->role === "admin" || Auth::user()->city === $deviceReport->device_city,
            __("You are not authorized to access this page."));
        return view("roles.generator.device-reports.show", [
            "report" => $deviceReport
        ]);
            //TODO : Catalin : Probably knows better to use Gates and doesnt have to use 2 so I will leave it to him
    }

    public function destroy(DeviceReport $deviceReport) {
        Gate::allowif(
            Auth::user()->role !== "user",
            __("You are not authorized to access this page.")
        );
        Gate::allowIf(
            Auth::user()->role === "admin" || Auth::user()->city === $deviceReport->device_city,
            __("You are not authorized to access this page."));
        $deviceReport->delete();
        return redirect()->route("device-reports.index");
    }
}
