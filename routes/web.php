<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentsController;
use App\Http\Controllers\AlarmsController;

Route::get('/', function () {
    return view('login');
});

Route::get('/actuations', function () {
    return view('actuations', ['title' => 'Laravel Alarmes | Atuações dos Alarmes', 'actuations' => []]);
});

Route::resource('equipments', EquipmentsController::class);

Route::resource('alarms', AlarmsController::class);
