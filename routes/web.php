<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Listagem
Route::get('/', [UserController::class, 'index'])->name('index');

// Criação
Route::get('/create', [UserController::class, 'create'])->name('create');
Route::post('/store/user', [UserController::class, 'store'])->name('create.record');

// Edição
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::put('/edit/{id}', [UserController::class, 'update'])->name('update');

// Remoção
Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
