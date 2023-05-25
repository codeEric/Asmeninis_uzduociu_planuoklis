<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\RegisterController;

Route::get('/', [TaskController::class, 'index']);

Route::middleware('auth')->group(function () {

  Route::resource('/tasks', TaskController::class)->except('show');
  Route::resource('/statuses', StatusController::class)->except('show');

  Route::post('/tasks/search', [TaskController::class, 'search']);

  Route::post('/logout', [LoginController::class, 'destroy']);
});

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);
