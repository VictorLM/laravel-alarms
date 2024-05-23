<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentsController;
use App\Http\Controllers\AlarmsController;
use App\Http\Controllers\ActuationsController;

Route::get('/', function () {
    return view('login');
});


Route::resource('equipments', EquipmentsController::class);

Route::resource('alarms', AlarmsController::class);

Route::get('/actuations', [ActuationsController::class, 'index'])->name('actuations.index');
