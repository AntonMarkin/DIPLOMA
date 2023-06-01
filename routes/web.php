<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientRequestController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\UsersController;
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
    Route::prefix('admin')
        ->name('admin.')
        ->middleware('admin')
        ->group(function () {
            Route::controller(AdminController::class)->group(function () {
                Route::get('/departments', 'departments')->name('departments');
                Route::post('/departments', 'updateOrCreateDepartment');
                Route::post('/departments/edit/{department}', 'updateOrCreateDepartment')->name('edit-department');

                Route::get('/offices', 'offices')->name('offices');
                Route::post('/offices', 'updateOrCreateOffice');
                Route::post('/offices/edit/{office}', 'updateOrCreateOffice')->name('edit-office');

                Route::get('/posts', 'posts')->name('posts');
                Route::post('/posts', 'updateOrCreatePost');
                Route::post('/posts/edit/{post}', 'updateOrCreatePost')->name('edit-post');

            });
            Route::controller(UsersController::class)->group(function () {
                Route::get('/users', 'users')->name('users');
                Route::post('/users', 'updateOrCreate');
                Route::post('/users/edit/{user}', 'updateOrCreate')->name('edit-user');

            });
            Route::controller(EquipmentController::class)->group(function () {
                Route::get('/equipment-types', 'equipmentTypes')->name('equipment-types');
                Route::post('/equipment-types', 'updateOrCreateType');
                Route::post('/equipment-types/edit/{id}', 'updateOrCreateType')->whereNumber('id')->name('edit-equipment-type');

                Route::get('/equipment', 'equipment')->name('equipment');
                Route::post('/equipment', 'updateOrCreate');
                Route::post('/equipment/edit/{id}', 'updateOrCreate')->whereNumber('id')->name('edit-equipment');

            });
        });
    Route::middleware('technician')->group(function () {
        Route::controller(TechnicianController::class)->group(function () {
            Route::get('/users/requests', 'index')->name('users-requests');

            Route::get('/request/start/{request}', 'start')->name('start-work');
            Route::get('/request/success/{request}', 'success')->name('success-work');
            Route::get('/request/reject/{request}', 'reject')->name('reject-request');
        });
    });

    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/profile/{user}', 'profile')->name('profile');
    });
    Route::controller(ClientRequestController::class)->group(function () {
        Route::post('/request/create', 'updateOrCreate')->name('create-request');
        Route::get('/request/delete/{request}', 'delete')->name('delete-request');
    });
});
