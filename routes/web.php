<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VisitController;
use App\Http\Controllers\Index\IndexController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;
Auth::routes();
Route::get('/', [IndexController::class, 'index'])->name('home.index');
//Route::get('/manager', [\App\Http\Controllers\Manager\IndexController::class, 'index'])->name('home.manager');
Route::get('/widget', \App\Http\Controllers\Widget\IndexController::class)->name('home.widget');
Route::get('/admin', [AdminController::class, 'index'])->name('home.admin');
Route::get('/admin/visits', [VisitController::class, 'index'])->name('admin.visits');


Route::group(['middleware' => [RoleMiddleware::using('manager')]], function () {

});

Route::get('/jokes', [\App\Http\Controllers\JokeController::class, 'index'])->name('jokes.index');
Route::get('/jokes/fields', [\App\Http\Controllers\JokeController::class, 'fields'])->name('jokes.fields');
