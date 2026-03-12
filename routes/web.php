<?php

use App\Http\Controllers\Index\IndexController;
use Illuminate\Support\Facades\Route;
Route::get('/', [IndexController::class, 'index'])->name('home.index'); // стандартный метод

Route::group(['middleware' => ['role:manager']], function () {
Route::get('/widget', \App\Http\Controllers\Widget\IndexController::class)->name('home.widget'); // однометодный контроллер

});