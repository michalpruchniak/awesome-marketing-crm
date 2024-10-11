<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\AuthController;
use Modules\Users\Http\Controllers\UsersController;
use Modules\Users\Http\Middleware\ActiveUser;

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
    ->middleware(['auth', ActiveUser::class])
    ->group(function () {

       Route::get('list',
           [UsersController::class, 'index'])
           ->name('users.list');

       Route::get('create',
           [UsersController::class, 'create'])
           ->name('users.create');

       Route::post('store',
           [UsersController::class, 'store'])
           ->name('users.store');

        Route::get('edit/{id}',
           [UsersController::class, 'edit'])
           ->name('users.edit');

        Route::post('update/{id}',
           [UsersController::class, 'update'])
           ->name('users.update');
});

