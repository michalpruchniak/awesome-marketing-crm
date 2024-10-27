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
    ->name('login');

Route::post('/login',
    [AuthController::class, 'store'])
    ->name('login');

Route::post('/logout',
    [AuthController::class, 'destroy'])
    ->name('logout');

Route::prefix('users')
    ->middleware(['auth', ActiveUser::class])
    ->group(function () {

        Route::get('list',
            [UsersController::class, 'index'])
            ->can('manage users')
            ->name('users.list');

        Route::get('create',
            [UsersController::class, 'create'])
            ->can('manage users')
            ->name('users.create');

        Route::post('store',
            [UsersController::class, 'store'])
            ->can('manage users')
            ->name('users.store');

        Route::get('edit/{id}',
            [UsersController::class, 'edit'])
            ->can('manage users')
            ->name('users.edit');

        Route::patch('update/{id}',
            [UsersController::class, 'update'])
            ->can('manage users')
            ->name('users.update');

        Route::delete('delete/{id}',
            [UsersController::class, 'destroy'])
            ->can('manage users')
            ->name('users.destroy');

        Route::get('delete-ban/{id}',
            [UsersController::class, 'deleteBan'])
            ->can('manage users')
            ->name('users.deleteBan');
    });
