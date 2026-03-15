<?php

use App\Http\Controllers\Index\IndexController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;

Route::get('tickets/statistics', [\App\Http\Controllers\Api\IndexController::class, 'stats'])->name('tickets.stats')->middleware('api');

Route::post('tickets', [\App\Http\Controllers\Api\IndexController::class, 'store'])->name('tickets.store')->middleware('api');

Route::get('tickets/{id}', [\App\Http\Controllers\Api\IndexController::class, 'show'])->name('tickets.show')->middleware('api');
Route::put('tickets/{id}', [\App\Http\Controllers\Api\IndexController::class, 'update'])->name('tickets.update')->middleware('api');


