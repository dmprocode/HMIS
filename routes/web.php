<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffModelController;
use App\Http\Controllers\DepertmeantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;








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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [LogoutController::class, 'logout'])
    ->name('logout')
    ->middleware('auth:admin');  
    


Route::get('/depertmeants',[DepertmeantController::class,'depertmeantIndex'])->name('depertmeant-index');
Route::get('/staff-index',[StaffModelController::class,'staffIndex'])->name('staff-index');
Route::post('/add-staff', [StaffModelController::class, 'addStaff'])->name('add-staff');
Route::post('/delete-staff',[StaffModelController::class,'deleteStaff'])->name('delete-staff');
Route::post('/update-staff',[StaffModelController::class,'updateStaffData'])->name('update-staff-data');

// ================Login Route===============
Route::get('/login-index',[AuthController::class,'loginIndex']);
Route::post('/login-data',[AuthController::class,'LoginData'])->name('user-login-data');
Route::get('/logout-user',[AuthController::class,'logout'])->name('log-out');


Route::get('/admin-index', [AdminController::class, 'adminIndex'])->name('admin-index');
Route::get('/admin/staff', [AdminController::class, 'manageStaff'])->name('admin.staff');


Auth::routes();


Route::middleware(['auth:admin', 'is_SuperAdmin'])
    ->prefix('super-admin')
    ->group(function () {                                          
        Route::get('index', [AdminController::class, 'superAdmin'])
            ->name('super-admin');                                  
    });


Route::middleware(['auth:admin','is_Admin'])->prefix('admin')->group(function () {
    Route::get('index', [AdminController::class, 'adminIndex'])->name('admin.index');
    Route::get('user-index', [AdminController::class, 'userIndex'])->name('user.index');
    Route::post('add-user', [AdminController::class, 'addUser'])->name('user.add');
    Route::post('delete-user',[AdminController::class,'deleteUser'])->name('delete-user');
    Route::post ('update-user',[AdminController::class,'updateUser'])->name('update-user-data');
    Route::get('user-profile',[AdminController::class,'adminProfile'])->name('admin.profile');
    Route::post('update-password',[AdminController::class,'UpdatePassword'])->name('update.password');

    // =====================Depetrmeant ==================

    Route::get('depertmeantIndex',[DepertmeantController::class,'depertmeantIndex'])->name('depertments.index');


});

// routes/web.php
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/doctor/home', [HomeController::class, 'doctorHome'])->name('doctor.home')->middleware('is_doctor');
Route::get ('/recptionst/home',[HomeController::class,'receptionistIndex'])->name('receptionist.home')->middleware('is_Receptionist');
