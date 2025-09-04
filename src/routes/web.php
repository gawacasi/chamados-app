<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;
use Illuminate\Support\Facades\Route;

Route::middleware([CheckIsNotLogged::class])->group(function () {
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/loginSub', [AuthController::class, 'loginSub']);
});

Route::middleware([CheckIsLogged::class])->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    //CRUD
    Route::get('/create-chamado', [MainController::class, 'createChamado'])->name('createChamado');
    Route::post('/createChamadoSubmit', [MainController::class, 'createChamadoSubmit'])->name('createChamadoSubmit');
    Route::post('/editSubmit', [MainController::class, 'editSubmit'])->name('editSubmit');
    Route::get('/edit/{id}', [MainController::class, 'edit'])->name('edit');
    
    Route::get('/delete/{id}', [MainController::class, 'delete'])->name('delete');
    Route::get('/delete-confirm/{id}', [MainController::class, 'deleteConfirm'])->name('deleteConfirm');

    //kanban
    Route::post('/chamados/{id}/status', [MainController::class, 'updateStatus'])->name('chamados.updateStatus');
});
