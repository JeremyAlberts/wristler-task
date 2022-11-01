<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index'])->name('index');
Route::post('/', [TaskController::class, 'store'])->name('store');
Route::delete('/{task:id}', [TaskController::class, 'destroy'])->name('destroy');
Route::patch('/{task:id}', [TaskController::class, 'update'])->name('update');

