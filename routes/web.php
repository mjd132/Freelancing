<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjectController::class , 'index'])->name('home');
Route::resource('projects', ProjectController::class);
