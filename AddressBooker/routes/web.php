<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserWebController;

Route::get('/', [UserWebController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserWebController::class, 'create'])->name('users.create');
Route::post('/users', [UserWebController::class, 'store'])->name('users.store');
