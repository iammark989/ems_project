<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;

class ViewAttendanceLog extends Component
{
public $datefrom;
public $dateto;
public $results = [];
public $records = [];
public $selectedEmployee = '';
public $employees = [];

    public function mount(){
       $this->employees = DB::table('users')
       ->select('employeeID','username')
       ->where('id','!=','1')
       ->get();
        
    }

    public function viewResult(){
           if($this->selectedEmployee == null){
            $this->results = DB::table('attendance')
            ->select(
            'attendance.employeeID as empID',
            DB::raw('date(attendance.recordDate) as recordDate'),
            'users.username as name',
            DB::raw('min(attendance.clockRecord) as ClockIN'),
            DB::raw('max(attendance.clockRecord) as ClockOUT'),
            DB::raw('CASE WHEN min(attendance.clockRecord) = max(attendance.clockRecord) THEN "No IN/OUT" ELSE "OK" END AS Status')
            )
            ->join('users','attendance.employeeID','=','users.employeeID')
            ->where('attendance.recordDate','>=',$this->datefrom)->where('attendance.recordDate','<=',$this->dateto)
            ->groupBy('empID','recordDate')
            ->orderBy('empID')
            ->orderBy('recordDate')
            ->get();
           }else{
            $this->results = DB::table('attendance')
            ->select(
            'attendance.employeeID as empID',
            DB::raw('date(attendance.recordDate) as recordDate'),
            'users.username as name',
            DB::raw('CASE WHEN min(attendance.clockRecord) = max(attendance.clockRecord) AND min(attendance.clockRecord) >= "12:00" THEN " - " ELSE min(attendance.clockRecord) END AS ClockIN'),
            DB::raw('CASE WHEN min(attendance.clockRecord) = max(attendance.clockRecord) AND max(attendance.clockRecord) <= "11:59" THEN " - " ELSE max(attendance.clockRecord) END AS ClockOUT'),
            DB::raw('CASE WHEN min(attendance.clockRecord) = max(attendance.clockRecord) THEN "No IN/OUT" ELSE "OK" END AS Status')
            )
            ->join('users','attendance.employeeID','=','users.employeeID')
            ->where('attendance.recordDate','>=',$this->datefrom)->where('attendance.recordDate','<=',$this->dateto)
            ->where('attendance.employeeID','=',$this->selectedEmployee)
            ->groupBy('empID','recordDate')
            ->orderBy('empID')
            ->orderBy('recordDate')
            ->get();
           }
        }

    
    public function edit($recordDate,$empID)
    {
    
        $this->cin = '';
        $this->out = '';
       $records = 
        DB::table('attendance')->select(
            'employeeID as empID',
            DB::raw('min(clockRecord) as ClockIN'),
            DB::raw('max(clockRecord) as ClockOUT'),
        )
        
        ->where('employeeID','=',$empID)->where('recordDate','=',$recordDate)
        ->groupBy('employeeID')
        ->first();

   if(!$records){
    $this->cin = '11:11';
   }else{
     $this->cin = 'asdasdsa';
        $this->cout = $records->ClockOUT;
}
       

    }
        
        
    public function render()
    {

        return view('livewire.view-attendance-log');
    }
}
