<?php

use Illuminate\Support\Facades\Route;

Route::middleware("can:uat")
    ->prefix("uat")
    ->group(function () {
        require __DIR__ . "/devices.php";
        require __DIR__ . "/users.php";
    });
