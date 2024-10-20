<?php

use Illuminate\Support\Facades\Route;

Route::middleware("can:admin")
    ->prefix("admin")
    ->group(function () {
        require __DIR__ . "/devices.php";
        require __DIR__ . "/slots.php";
        require __DIR__ . "/users.php";
    });
