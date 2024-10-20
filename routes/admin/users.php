<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::resource(
    "users",
    UserController::class,
    ["as" => "admin"]
)
    ->except(["store", "show", "update"])
    ->middleware("auth");
