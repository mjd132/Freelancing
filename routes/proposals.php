<?php

use Illuminate\Support\Facades\Route;

Route::prefix('proposals')->group(function () {
//    Route::get('/', ProposalController::class.'@index');
    Route::get('/create/{}', ProposalController::class . '@create');

});
