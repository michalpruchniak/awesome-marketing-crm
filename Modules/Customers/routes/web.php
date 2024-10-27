<?php

use Illuminate\Support\Facades\Route;
use Modules\Customers\Http\Controllers\CustomersController;
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

Route::prefix('customers')
    ->middleware(['auth', ActiveUser::class])
    ->group(function () {

        Route::get('',
            [CustomersController::class, 'index'])
            ->name('customers.list');

        Route::get('show/{id}',
            [CustomersController::class, 'show'])
            ->name('customers.show');

        Route::get('create',
            [CustomersController::class, 'create'])
            ->name('customers.create')
            ->can('add new customer');

        Route::post('store',
            [CustomersController::class, 'store'])
            ->name('customers.store')
            ->can('add new customer');

        Route::get('edit/{id}',
            [CustomersController::class, 'edit'])
            ->name('customers.edit')
            ->can('add new customer');

        Route::post('update/{id}',
            [CustomersController::class, 'update'])
            ->name('customers.update')
            ->can('add new customer');
    });
