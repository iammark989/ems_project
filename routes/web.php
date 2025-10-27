<?php

use Livewire\Volt\Volt;
use Laravel\Fortify\Features;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;

// == LOGIN ==//
Route::get('/',[DashboardController::class,'home'])->name('home');
Route::post('/login',[UserController::class,'login']);

// == LOGOUT == //
Route::post('/logout',[UserController::class,'logout']);

// == REGISTRATION ==//
Route::get('/register', function(){
        return view('register');
    })->name('register');
Route::post('/register',[UserController::class,'register']);

// == EMPLOYEE PANEL ==//
Route::get('/employeelist',[UserController::class,'employeelist'])->middleware('signInCheck');
Route::get('/employeelist/{employeeID}',[UserController::class,'employeedetails'])->middleware('signInCheck');
Route::get('/employeelist/{employeeID}/edit',[UserController::class,'showEditForm'])->middleware('signInCheck');
Route::put('/saveEditDetails/{employeeID}',[UserController::class,'EditDetails'])->middleware('signInCheck');


Route::get('/employee_registration',[UserController::class,'employeeadd'])->middleware('signInCheck')->middleware('can:hrdAdmin');

Route::post('/addemployee',[UserController::class,'addemployee']);


// == SERVICES PANEL ==//
Route::get('/view_payslip/{employeeID}',[ServicesController::class,'viewpayslip']);

//Route::get('/view_payslipdata/{employeeID}',[ServicesController::class,'viewpayslip']);

Route::get('/attendance',[AttendanceController::class,'showAttendancePage']);
Route::get('/att',[AttendanceController::class,'showAttendancePageB']);

//== attendance log recording ==//
Route::post('/attendance/log/rfid',[AttendanceController::class,'attendancelog']);

//== registration of rfid / fingerprint ==//
Route::post('/register/rfid',[AttendanceController::class,'rfidregistration'])->middleware('signInCheck');

    



