<?php

use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ProposalsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjectsController::class, 'index'])->name('home');

Route::prefix('projects')->group(function () {
    Route::get('/{id}', [ProjectsController::class, 'show'])->name('projects.show');
    Route::get('/create', [ProjectsController::class, 'create'])->name('projects.create');
    Route::post('/store', [ProjectsController::class, 'store'])->name('projects.store');
    Route::get('/{id}/edit', [ProjectsController::class, 'edit'])->name('projects.edit');
    Route::put('/{id}', [ProjectsController::class, 'update'])->name('projects.update');
//    Route::delete('/{id}', [ProjectsController::class, 'delete'])->name('projects.delete');
    Route::get('/{id}/close', [ProjectsController::class, 'close'])->name('projects.close');
    Route::get('/{id}/abandon', [ProjectsController::class, 'abandon'])->name('projects.abandon');
    Route::get('/{id}/proposals', [ProposalsController::class, 'showAll'])->name('projects.showAllProposals');


});
Route::prefix('proposals')->group(function () {
    Route::get('{projectId}/SendProposal', ProposalsController::class . '@create')->name('proposals.create');
    Route::post('{projectId}/SendProposal', ProposalsController::class . '@store')->name('proposals.store');
    Route::get('{id}', ProposalsController::class . '@show')->name('proposals.show');
    Route::get('{id}/accept', ProposalsController::class . '@accept')->name('proposals.accept');
    Route::get('{id}/edit', ProposalsController::class . '@edit')->name('proposals.edit');
    Route::put('{id}', ProposalsController::class . '@update')->name('proposals.update');
    Route::delete('{id}', ProposalsController::class . '@destroy')->name('proposals.delete');
});
