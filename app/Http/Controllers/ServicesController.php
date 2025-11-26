<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employeelist;
use Illuminate\Http\Request;
use App\Models\Employeepayroll;

class ServicesController extends Controller
{

     // = GO TO VIEW PAYSLIP = //
    public function viewpayslip($employeeID,Request $request){
       
            $month = $request->month;
            $year = $request->month;
            $cutoff = $request->cutoff; 
        

      $userDetails = User::where('employeeID',$employeeID)->first();
      $employeeDetails = Employeelist::where('employeeID',$employeeID)->first();
      $payrollDetails = Employeepayroll::where('employeeID',$employeeID)->where('month',$request->month)->where('year',$request->year)->where('cutoff',$request->cutoff)->first();
    
      if($payrollDetails == null){
          return view('/servicesviewpayslip',['userDetails'=>$userDetails,'payrollDetails'=>$payrollDetails,'employeeDetails'=>$employeeDetails]);
        }else{
          return view('/servicesviewpayslip',['userDetails'=>$userDetails,'payrollDetails'=>$payrollDetails,'employeeDetails'=>$employeeDetails,'result'=> 'one']);
        }
        

    }

}
