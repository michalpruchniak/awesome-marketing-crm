<?php

use Illuminate\Support\Facades\Route;
use Modules\Histories\Http\Controllers\HistoriesController;
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

Route::prefix('histories')
    ->middleware(['auth', ActiveUser::class])
    ->group(function () {

        Route::get('show/{id}',
            [HistoriesController::class, 'show'])
            ->name('histories.show');
    });
