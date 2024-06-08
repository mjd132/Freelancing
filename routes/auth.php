<?php

use App\Http\Controllers\AuthController;
use Illuminate\Auth\Middleware\Authenticate;
use \Illuminate\Support\Facades\Route;

Route::get('login',Authcontroller::class . '@loginPage')->name('login')->middleware('guest');
Route::get('register',Authcontroller::class . '@registerPage')->name('register')->middleware('guest');
Route::post('login',Authcontroller::class . '@login')->name('auth.login')->middleware('guest');
Route::post('register',Authcontroller::class . '@register')->name('auth.register')->middleware('guest');

Route::get('logout',Authcontroller::class . '@logout')->name('auth.logout')->middleware('auth');
