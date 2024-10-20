<?php

use App\Http\Controllers\Operator\DeviceController;
use Illuminate\Support\Facades\Route;

Route::resource(
    "devices",
    DeviceController::class,
    [ "as" => "operator" ]
)
    ->only(["index", "show"])
    ->middleware("auth");
