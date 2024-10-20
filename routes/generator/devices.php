<?php

use App\Http\Controllers\Generator\DeviceController;
use Illuminate\Support\Facades\Route;

Route::resource(
    "devices",
    DeviceController::class,
    [ "as" => "generator" ]
)
    ->only(["index", "show"])
    ->middleware("auth");
