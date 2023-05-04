<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TechnicianController;
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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/users', 'users')->name('users');
        });
    });
    Route::middleware('technician')->group(function () {
        Route::controller(TechnicianController::class)->group(function () {
            Route::get('/users/requests', 'index')->name('users-requests');
            Route::post('/users/requests', 'changeStatus')->name('change-status');
        });
    });

    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/profile/{user}', 'profile')->name('profile');
    });
    Route::controller(ClientRequestController::class)->group(function () {
        Route::post('/request/create', 'updateOrCreate')->name('create-request');
    });
});
