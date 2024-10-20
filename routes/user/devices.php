<?php

use App\Http\Controllers\User\DeviceController;
use Illuminate\Support\Facades\Route;

Route::resource(
    "devices",
    DeviceController::class,
    [ "as" => "user" ]
)
    ->only([ "show" ])
    ->middleware("auth");
