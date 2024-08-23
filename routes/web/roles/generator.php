<?php

use App\Http\Controllers\Generator\DeviceReportController;
use Illuminate\Support\Facades\Route;

Route::prefix("/generator")
    ->middleware("can:user")
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('generator.dashboard');
        Route::resource("device-reports", DeviceReportController::class)
            ->only([ "index", "show", "create", "destroy" ]);
    });

