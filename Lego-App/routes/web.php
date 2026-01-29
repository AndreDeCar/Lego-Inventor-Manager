<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\KitController;

use App\Http\Controllers\Admin\BuildController as AdminBuildController;
use App\Http\Controllers\Admin\KitController as AdminKitController;
use App\Http\Controllers\Admin\BoxController as AdminBoxController;
use App\Http\Controllers\Admin\ClassroomController as AdminClassroomController;
use App\Http\Controllers\Admin\CupboardController as AdminCupboardController;
use App\Http\Controllers\Admin\PieceController as AdminPieceController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('builds', BuildController::class)->only(['index', 'show']);
Route::resource('kits', KitController::class)->only(['index', 'show']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('builds', AdminBuildController::class);
    Route::resource('kits', AdminKitController::class);
    Route::resource('boxes', AdminBoxController::class);
    Route::resource('classrooms', AdminClassroomController::class);
    Route::resource('cupboards', AdminCupboardController::class);
    Route::resource('pieces', AdminPieceController::class);
});