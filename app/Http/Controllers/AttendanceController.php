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
        $employeeID = $request->input('employeeID');
        $employee = RfidCard::where('rfid_data', $rfid)->first();
        $rfidData['rfid_data'] = $rfid;
        $rfidData['employeeID'] = $employeeID;
        $rfidData['is_active'] = '1';
        
        if(!$employee){

            RfidCard::create($rfidData);
            return response()->json(['success' => true]);
           

        } else {
           return response()->json(['success' => false]);
        }
    }

    // == USER CLOCK IN AND OUT == //
        // show attendance page
     public function showAttendancePageB(){
        return view('att');
    }
    
    // == clock in / out == //
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
                    'recordDate' => now()->toDateString(),
                    'stat' => 'ClockIn'
                    ]);
                } else if($status === 'clockOut' && $checkDate !== Carbon::parse($lastLog->date)->toDateString()){
                    Attendance::create([
                    'employeeID' => $employee->employeeID,
                    'clockRecord' => now(),
                    'recordDate' => now()->toDateString(),
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
                        'recordDate' => now()->toDateString(),
                        'stat' => 'ClockOut'
                    ]);
                }
               
                return response()->json([
                    'success' => true,
                    'employee_name' => $theUser->username,
                    'status' => $status === 'clockIn' ? 'Time In' : 'Time Out',
                    'image' => $theUser->images,
                    'employeeID' => $theUser->employeeID,

                ]);

            }
   
    }

    // == ATTENDANCE REPORT == //

        public function showAttendancePage(){
        return view('employeeattpanel');
    }
    public function showAttendanceLogPage(){
        return view('employeeattlog');
    }
    public function showClockinoutLogPage(){
        return view('employeeclockinoutlog');
    }

    function attendanceLogs(Request $request){
        $dateRange = $request->validate([
            'datefrom' => 'required',
            'dateto' => 'required',
        ]);
        $qry = Attendance::where('clockRecord','>=',$dateRange['datefrom']);
        return redirect('/attendance/viewlog',['sample'=> $qry]);
    }

    

}
