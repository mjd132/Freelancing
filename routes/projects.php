<?php

use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjectsController::class, 'index'])->name('home');

Route::prefix('projects')->group(function () {
    Route::get('/{id}', [ProjectsController::class, 'show'])->name('projects.show');
    Route::get('/create', [ProjectsController::class, 'create'])->name('projects.create');
    Route::post('/store', [ProjectsController::class, 'store'])->name('projects.store');
    Route::get('/{id}/edit', [ProjectsController::class, 'edit'])->name('projects.edit');
    Route::put('/{id}', [ProjectsController::class, 'update'])->name('projects.update');
    Route::delete('/{id}', [ProjectsController::class, 'delete'])->name('projects.delete');

});
