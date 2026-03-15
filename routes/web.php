<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Index\IndexController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;
Auth::routes();
Route::get('/', [IndexController::class, 'index'])->name('home.index');
Route::get('/manager', [\App\Http\Controllers\Manager\IndexController::class, 'index'])->name('home.manager');
Route::get('/widget', \App\Http\Controllers\Widget\IndexController::class)->name('home.widget');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');


Route::group(['middleware' => [RoleMiddleware::using('manager')]], function () {

});

