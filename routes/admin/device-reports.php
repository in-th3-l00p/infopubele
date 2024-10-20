<?php

use App\Http\Controllers\Admin\DeviceReportController;
use Illuminate\Support\Facades\Route;

Route::resource(
    "device-reports",
    DeviceReportController::class,
    ["as" => "admin"]
)
    ->except(["store", "edit", "update"]);
