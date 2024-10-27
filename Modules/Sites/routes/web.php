<?php

use Illuminate\Support\Facades\Route;
use Modules\Sites\Http\Controllers\SitesController;
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

Route::prefix('sites')
    ->middleware(['auth', ActiveUser::class])
    ->group(function () {

        Route::post('store',
            [SitesController::class, 'store'])
            ->name('sites.store');
    });
