<?php

use App\Http\Controllers\Index\IndexController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;

Route::get('/', [IndexController::class, 'index'])->name('home.index');
Route::get('/manager', [\App\Http\Controllers\Manager\IndexController::class, 'index'])->name('home.manager');
Route::get('/widget', \App\Http\Controllers\Widget\IndexController::class)->name('home.widget');
phpinfo();
$_SESSION['tset']= 33;
Route::post('/api/tickets', [\App\Http\Controllers\Api\IndexController::class, 'store'])->name('tickets.store');

Route::group(['middleware' => [RoleMiddleware::using('manager')]], function () {


});
Auth::routes();

