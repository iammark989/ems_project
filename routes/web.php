<?php

use Livewire\Volt\Volt;
use Laravel\Fortify\Features;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OthersController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ReportsController;
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

    // == ATTENDANCE RELATED == //
Route::get('/attendance',[AttendanceController::class,'showAttendancePage']);
Route::get('/att',[AttendanceController::class,'showAttendancePageB']);

Route::get('/attendance/view-clockinout-log',[AttendanceController::class,'showClockinoutLogPage']);
Route::get('/attendance/view-attendance-log',[AttendanceController::class,'showAttendanceLogPage']);


//== attendance log recording ==//
Route::post('/attendance/log/rfid',[AttendanceController::class,'attendancelog']);

//== registration of rfid / fingerprint ==//
Route::post('/register/rfid',[AttendanceController::class,'rfidregistration'])->middleware('signInCheck');
//Route::post('/attendance/viewlog',[AttendanceController::class,'attendanceLogs']);


   //== REPORTS ==//
Route::get('/gas-consumption-report',[ReportsController::class,'viewgasconsumption'])->middleware('signInCheck');




   //== OTHERS ==//
Route::get('/gas-consumption',[OthersController::class,'viewgasconsumption'])->middleware('signInCheck');


    //== SETTINGS ==//

    //== payrrollsettings ==//
Route::get('/settings-payroll',[PayrollController::class,'gotopayrollsettings'])->middleware('signInCheck');


Route::post('/settings-payroll/addschedule',[PayrollController::class,'addschedule']);



