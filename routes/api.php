<?php

use App\Http\Controllers\Index\IndexController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;

Route::get('tickets/statistics', [\App\Http\Controllers\Api\IndexController::class, 'stats'])->name('tickets.stats')->middleware('api');

Route::post('tickets', [\App\Http\Controllers\Api\IndexController::class, 'store'])->name('tickets.store')->middleware('api');



