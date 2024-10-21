<?php

use App\Http\Controllers\Generator\DeviceReportController;
use Illuminate\Support\Facades\Route;

Route::resource(
    "device-reports",
    DeviceReportController::class,
    ["as" => "generator"]
)
    ->except(["store", "edit", "update"]);
