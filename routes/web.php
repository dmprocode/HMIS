<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffModelController;
use App\Http\Controllers\DepertmeantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;





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
    return view('welcome');
});
Route::get('/depertmeants',[DepertmeantController::class,'depertmeantIndex'])->name('depertmeant-index');
Route::get('/staff-index',[StaffModelController::class,'staffIndex'])->name('staff-index');
Route::post('/add-staff', [StaffModelController::class, 'addStaff'])->name('add-staff');
Route::post('/delete-staff',[StaffModelController::class,'deleteStaff'])->name('delete-staff');
Route::post('/update-staff',[StaffModelController::class,'updateStaffData'])->name('update-staff-data');

// ================Login Route===============
Route::get('/Login-index',[AuthController::class,'loginIndex'])->name('login');
Route::post('/login-data',[AuthController::class,'LoginData'])->name('user-login-data');

Route::get('/admin-index',[AdminController::class,'adminIndex'])->name('admin-dashboard')->middleware('isAdmin');

