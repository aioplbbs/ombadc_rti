<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\RtiController;
use App\Http\Controllers\AjaxController;

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

Route::get('/', [SetupController::class, 'index']);
Route::post('/setup', [SetupController::class, 'create'])->name('setup.init');
Route::get('/setup/migrate', [SetupController::class, 'migrate']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/users', UserController::class);
    Route::resource('/permission', PermissionController::class);
    Route::post('/permission/assign', [PermissionController::class, 'permissionToRoll'])->name('permission.assign');
    Route::resource('/roles', RolesController::class);
    Route::resource('/rti', RtiController::class)->except(['edit', 'update', 'destroy']);
    Route::get('/rti/{id}/status', [RtiController::class, 'statusUpdate'])->name('rti.status');
    Route::get('/rti/{id}/respond', [RtiController::class, 'respond'])->name('rti.respond.index');
    Route::post('/rti/{id}/respond', [RtiController::class, 'respond'])->name('rti.respond.store');
});

// Ajax Calls
Route::post('/ajax/pincode', [AjaxController::class, 'pincode']);