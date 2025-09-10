<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolesController;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/users', UserController::class);
    Route::resource('/permission', PermissionController::class);
    Route::post('/permission/assign', [PermissionController::class, 'permissionToRoll'])->name('permission.assign');
    Route::resource('/roles', RolesController::class);
    Route::resource('/report', ReportController::class);
});