<?php

use App\Http\Controllers\CheckupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\TreatmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('owners', OwnerController::class);
Route::resource('pets', PetController::class);
Route::resource('treatments', TreatmentController::class);
Route::resource('checkups', CheckupController::class);
