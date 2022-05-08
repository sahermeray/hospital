<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

######################admin###############################
Route::get('/add_doctor',[App\Http\Controllers\AdminController::class,'addDoctorView'])->name('add_doctor_view');
Route::post('/add_doctor',[App\Http\Controllers\AdminController::class,'addDoctor'])->name('add_doctor');
Route::get('/doctors',[App\Http\Controllers\AdminController::class,'doctors'])->name('doctors');
Route::get('/delete_doctor/{id}',[App\Http\Controllers\AdminController::class, 'deleteDoctor'])->name('delete_doctor');
Route::get('/edit_doctor/{id}',[App\Http\Controllers\AdminController::class, 'editDoctor'])->name('edit_doctor');
Route::post('/update_doctor/{id}',[App\Http\Controllers\AdminController::class, 'updateDoctor'])->name('update_doctor');
Route::get('/appointments',[App\Http\Controllers\AdminController::class,'appointments'])->name('appointments');
Route::get('/cancel_appointment/{id}', [App\Http\Controllers\AdminController::class, 'cancelAppointment'])->name('cancel_appointment');
Route::get('/approve_appointment/{id}', [App\Http\Controllers\AdminController::class, 'approveAppointment'])->name('approve_appointment');

######################end admin###########################

#####################user#################################
Route::post('/add_appointment',[App\Http\Controllers\UserController::class, 'addAppointment'])->name('add_appointment');
Route::get('/my_appointments/{id}', [App\Http\Controllers\UserController::class, 'myAppointments'])->name('my_appointments');
Route::get('/delete_appointment/{id}', [App\Http\Controllers\UserController::class, 'deleteAppointment'])->name('delete_appointment');

