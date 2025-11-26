<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function gotopayrollsettings(){
        return  view('/settingspayroll');
    }

    //== ADD SCHEDULE ==//
    public function addschedule(Request $request){
            $shift_name = $request->input('name');
            $shift_start = $request->input('start');
            $shift_end = $request->input('end');
            

            $check = Schedule::where('shift_name',$shift_name)->first();

            if($check == null){
                Schedule::create(['shift_name'=> $shift_name,'shift_start'=>$shift_start,'shift_end'=>$shift_end]);
                return response()->json([
                'success' => true,
                ]);
                
                
            } else {
                return response()->json([
                    'success' => false,
                ]);
            }
 
    }


}
