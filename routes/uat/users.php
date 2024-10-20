<?php

use App\Http\Controllers\Uat\UserController;
use Illuminate\Support\Facades\Route;

Route::resource(
    "users",
    UserController::class,
    ["as" => "uat"]
)
    ->except(["store", "show", "update"])
    ->middleware("auth");
