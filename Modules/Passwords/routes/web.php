<?php

use Illuminate\Support\Facades\Route;
use Modules\Passwords\Http\Controllers\PasswordsController;

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

Route::prefix('passwords')
     ->middleware('auth')
     ->group(function () {

        Route::post('store',
            [PasswordsController::class, 'store'])
            ->name('passwords.store')
            ->can('add new password');

        Route::get('get-password/{id}',
            [PasswordsController::class, 'getPassword'])
            ->name('got password');

});
