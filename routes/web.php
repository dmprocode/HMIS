<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffModelController;
use App\Http\Controllers\DepertmeantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;






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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/depertmeants',[DepertmeantController::class,'depertmeantIndex'])->name('depertmeant-index');
Route::get('/staff-index',[StaffModelController::class,'staffIndex'])->name('staff-index');
Route::post('/add-staff', [StaffModelController::class, 'addStaff'])->name('add-staff');
Route::post('/delete-staff',[StaffModelController::class,'deleteStaff'])->name('delete-staff');
Route::post('/update-staff',[StaffModelController::class,'updateStaffData'])->name('update-staff-data');

// ================Login Route===============
Route::get('/login-index',[AuthController::class,'loginIndex']);
Route::post('/login-data',[LoginController::class,'login'])->name('user-login-data');
Route::get('/logout-user',[AuthController::class,'logout'])->name('log-out');


Route::get('/admin/staff', [AdminController::class, 'manageStaff'])->name('admin.staff');


Auth::routes();
//  Admin  route
Route::middleware(['auth:admin', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'adminIndex'])->name('admin-dashboard');
});
// Super Admin
Route::middleware(['auth:admin', 'is_SuperAdmin'])->prefix('super-sdmin')->group(function () {
   Route::get('/dashboard' , [AdminController::class,'superAdmin'])->name('super-adimin');
});



// routes/web.php
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/doctor/home', [HomeController::class, 'doctorHome'])->name('doctor.home')->middleware('is_doctor');
Route::get ('/recptionst/home',[HomeController::class,'receptionistIndex'])->name('receptionist.home')->middleware('is_Receptionist');
