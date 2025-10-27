<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\RfidCard;
use App\Models\Attendance;
use Illuminate\Http\Request;


class AttendanceController extends Controller
{
    // rfid registration //
    public function rfidregistration(Request $request){
        $rfid = $request->input('rfid');
        $employee = RfidCard::where('rfid_data', $rfid)->first();
        
        if(!$employee){
            return response()->json(['success' => true]);
            return with(['message' => 'Record Successfully Updated','type' => 'success']);
        } else {
           
        }
    }

    // == USER CLOCK IN AND OUT == //
        // show attendance page
    public function showAttendancePage(){
        return view('clockinout');
    }
     public function showAttendancePageB(){
        return view('att');
    }
    
    // == clock in / our using rfid == //
    public function attendancelog(Request $request){
        $rfid = $request->input('rfid');
        $employee = RfidCard::where('rfid_data', $rfid)->first();
        

            if (!$employee) {
                return response()->json(['success' => false]);
            }  else{
                $theUser = User::where('employeeID',$employee->employeeID)->first();
                // Determine if clock-in or clock-out
                $lastLog = Attendance::where('employeeID', $employee->employeeID)
                ->latest()
                ->first();

                $status = (!$lastLog) ? 'clockIn' : 'clockOut';
                $checkDate = now()->toDateString();
                if ($status === 'clockIn') {
                    Attendance::create([
                    'employeeID' => $employee->employeeID,
                    'clockRecord' => now(),
                    'date' => now()->toDateString(),
                    'stat' => 'ClockIn'
                    ]);
                } else if($status === 'clockOut' && $checkDate !== Carbon::parse($lastLog->date)->toDateString()){
                    Attendance::create([
                    'employeeID' => $employee->employeeID,
                    'clockRecord' => now(),
                    'date' => now()->toDateString(),
                    'stat' => 'ClockIn'
                    ]);
                    $status = 'clockIn';
                } else {
                    //$lastLog->update(['clockOut' => now()]);
                    if($employee->stat === 'ClockOut')
                        $lastLog->update(['stat' => 'Break']);
                        Attendance::create([
                        'employeeID' => $employee->employeeID,
                        'clockRecord' => now(),
                        'date' => now()->toDateString(),
                        'stat' => 'ClockOut'
                    ]);
                }
        
                return response()->json([
                    'success' => true,
                    'employee_name' => $theUser->username,
                    'status' => $status === 'clockIn' ? 'Time In' : 'Time Out'
                ]);

            }
   
    }


}
