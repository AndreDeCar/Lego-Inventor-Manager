<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\KitController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('builds', BuildController::class)->only(['index', 'show']);
Route::resource('kits', KitController::class)->only(['index', 'show']);