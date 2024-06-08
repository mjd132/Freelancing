<?php

use \Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserPanelController;
//Route::get('dashboard', UserPanelController::class.'@index')->name('dashboard');
Route::prefix('dashboard')->group(function () {
    Route::get('/',UserPanelController::class.'@index')->name('dashboard')->middleware('auth');
});
