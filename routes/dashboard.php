<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest:admin')->group(function () {
    Route::get('login', [\App\Http\Controllers\Backend\LoginController::class, 'index'])->name('login');
    Route::post('login', [\App\Http\Controllers\Backend\LoginController::class, 'login'])->name('login.login');
});

Route::middleware('auth:admin')->group(function () {

    Route::get('logout', [\App\Http\Controllers\Backend\LoginController::class, 'logout'])->name('logout');
    Route::get('', [DashboardController::class, 'index'])->name('index');
    Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::post('profile-update', 'profileUpdate')->name('profile-update');
        Route::post('password-update', 'passwordUpdate')->name('password-update');
    });

    Route::resource('country', \App\Http\Controllers\Backend\CountryController::class);
    Route::resource('city', \App\Http\Controllers\Backend\CityController::class);
    Route::resource('gift', \App\Http\Controllers\Backend\GiftController::class);
    Route::resource('package', \App\Http\Controllers\Backend\PackageController::class);

});
