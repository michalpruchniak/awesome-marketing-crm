<?php

use Illuminate\Support\Facades\Route;
use Modules\Activities\Http\Controllers\ActivitiesController;
use Modules\Activities\Http\Controllers\ActivityController;
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

Route::prefix('activities')
     ->middleware(['auth', ActiveUser::class])
     ->group(function () {

        Route::get('list/{id}',
            [ActivityController::class, 'index'])
            ->name('activity.list');

        Route::post('store',
            [ActivityController::class, 'store'])
            ->name('activity.store');
});

