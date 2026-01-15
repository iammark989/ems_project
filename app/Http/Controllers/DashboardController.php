<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employeepayroll;

class DashboardController extends Controller
{
    public function home(){
        $month = ['JANUARY','FEBRUARY','MARCH','APRIL','MAY','JUNE','JULY','AUGUST','SEPTEMBER','OCTOBER','NOVEMBER','DECEMBER'];
        $currentMonth = $month[date('m')-1];
        $currentYear = date('Y');
        $net_pay = Employeepayroll::where('month',$currentMonth)->where('year',$currentYear)->sum('net_pay');

        $monthly = EmployeePayroll::SelectRaw('month as month,sum(net_pay) as netpay')->where('year',$currentYear)->groupBy('month')->get();
        
        $theMonth = $monthly->pluck('month');
        $theNetpay = $monthly->pluck('netpay')->map(fn($v) => (float)$v);
        //return view('/home',['netpay'=>$net_pay,'monthly'=>$monthly]);
        return view('/home',compact('theMonth','theNetpay','currentYear'));
    }
}
