<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Modules\Customers\Models\Customer;
use Modules\Reports\Services\Reports\Creators\TimeActivesForCustomerCreator;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/test', function () {
    $customer = Customer::first();
    $test = new TimeActivesForCustomerCreator($customer);

    return $test->view();
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
