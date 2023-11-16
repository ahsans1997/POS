<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
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

Route::redirect('/', 'admin/dashboard');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


    require __DIR__.'/products.php';


    //User Route
    Route::resource('users', UserController::class);
    Route::get('users/assignRole/{id}', [UserController::class, 'assignRole'])->name('users.assignRole');
    Route::post('users/assignRole/{id}', [UserController::class, 'assignRoleToUser'])->name('users.assignRoleToUser');

    //Roles Route
    Route::resource('roles', RoleController::class);
    Route::get('roles/assignPermission/{id}', [RoleController::class, 'assignPermission'])->name('roles.assignPermission');
    Route::post('roles/assignPermission/{id}', [RoleController::class, 'assignPermissionToRole'])->name('roles.assignPermissionToRole');

    //Settings Route
    Route::resource('setting', SettingController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
