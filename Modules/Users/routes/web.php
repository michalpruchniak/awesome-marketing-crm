<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\AuthController;
use Modules\Users\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login',
    [AuthController::class, 'login'])
    ->name("login");

Route::post('/login',
    [AuthController::class, 'store'])
    ->name("login");

Route::post('/logout',
    [AuthController::class, 'destroy'])
    ->name("logout");

Route::prefix('users')
    ->middleware('auth')
    ->group(function () {

       Route::get('list',
           [UsersController::class, 'index'])
           ->name('users.list');
});

