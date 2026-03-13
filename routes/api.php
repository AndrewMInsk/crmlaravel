<?php

use App\Http\Controllers\Index\IndexController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;


Route::post('/tickets', [\App\Http\Controllers\Api\IndexController::class, 'store'])->name('tickets.store');

