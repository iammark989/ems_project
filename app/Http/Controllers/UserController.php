<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\RfidCard;
use App\Models\Attendance;
use Illuminate\Support\Str;
use App\Models\Employeelist;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class UserController extends Controller
{
        // == USER REGISTRATION == //
    public function register(Request $request){
        $incomingFields = $request->validate([
            'username' => ['required','max:30',Rule::unique('users','username')],
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => ['required','max:30','confirmed'],
            'userlevel' => ['required','in:1,2,3,4'],
        ]);
       $incomingFields['status'] = true;
       $incomingFields['employeeID'] = "000";
        User::create($incomingFields);
        return redirect('/')->with('success','Registration Success');
    }


        // == USER LOGIN == //
    public function login(Request $request){
        $incomingFields = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if(Auth::attempt($incomingFields)){
            $request->session()->regenerate();
            return redirect('/');
        }else{
            return back()->with('failed','Invalid Credentials');
        }
    }
        // == USER OUT == //
        public function logout(Request $request){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }



        // == EMPLOYEE PANEL == //
        public function employeelist(){
        $employeelisting = User::with('employeelist')->where('employeeID', '!=', '000')->orderBy('username')->paginate(10);

        return view('/employeelist', compact('employeelisting'));
        }
        public function employeeadd(){
            return view('/employeeregistration');
        }

        public function employeedetails($employeeID){

                $employeeDetails = Employeelist::where('employeeID',$employeeID)->first();
                $userDetails = User::where('employeeID',$employeeID)->first();
            return view('/employeedetails',['empdetails' => $employeeDetails,'userdetails'=> $userDetails]);
        }



            public function showEditForm($employeeID)
            {
                $empdetails = Employeelist::where('employeeID', $employeeID)->firstOrFail();
                $userdetails = User::where('employeeID', $employeeID)->firstOrFail();

                return view('/employeeeditdetails', compact('empdetails', 'userdetails'));
            }

             // = save edited Employee details = //
        public function EditDetails($employeeID,Request $request){
                    $incomingFields = $request->validate([
                    'email' => ['required','email'],
                    'status' => ['nullable'],
                    'first_name' => ['required'],
                    'middle_name' => ['nullable'],
                    'last_name' => ['required'],
                    'position' => ['required'],
                    'date_hired' => ['required'],
                    'daily_rate' => ['required'],
                    'allowance' => ['required'],
                    'leave_bal_VL' => ['required'],
                    'leave_bal_SIL' => ['required'],
                    'sss' => ['nullable'],
                    'pagibig'=> ['nullable'],
                    'philhealth' => ['nullable'],
                    'userlevel' => ['required','in:1,2,3,4'], 
                    'images' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:3000']
                ]);
                        // == image uploader == //
                 $user = User::where('employeeID',$employeeID)->firstOrFail();
                $employeelist = Employeelist::where('employeeID',$employeeID)->firstOrFail();
                
                        if(($request->file('images')) == null){
                            $filename = Str::afterLast($request->imagesrc, '/');
                        }else{
                            
                            $filename = $employeeID . "-" .uniqid() . ".jpg";
                            $imanager = new ImageManager(new Driver());
                            $image = $imanager->read($request->file('images'));
                            $imgData = $image->cover(250,250)->toJpeg();
                            Storage::disk('public')->put('images/'.$filename,$imgData);
                            $oldImage = $user->images;
                            if($oldImage != "/fallback-image.jpg"){
                            Storage::disk('public')->delete(str_replace("/storage/","",$oldImage));
                            }
                        }
                
               
                        
                
                $userData = $request->only(['email', 'status', 'userlevel']);
                $userData['status'] = $request->boolean('status');
                $userData['images'] = $filename;
                

                $employeeData = $request->only([
                'first_name', 'middle_name', 'last_name',
                'position', 'date_hired', 'daily_rate', 'allowance',
                'leave_bal_VL', 'leave_bal_SIL',
                'sss', 'pagibig', 'philhealth','user_id'
            ]);
                $employeeData['user_id'] = auth()->id();
                $employeeData['images'] = $filename;



                $user->update($userData);
                $employeelist->update($employeeData);
                return redirect('/employeelist/'.$employeeID)->with(['message' => 'Record Successfully Updated','type' => 'success']);
                
        }


            // = Add new Employee = //
        public function addemployee(Request $request){
                $incomingFields = $request->validate([
                    'employeeID' => ['required',Rule::unique('users','employeeID')],
                    'email' => ['required','email'],
                    'status' => ['nullable'],
                    'first_name' => ['required'],
                    'middle_name' => ['nullable'],
                    'last_name' => ['required'],
                    'position' => ['required'],
                    'date_hired' => ['required'],
                    'daily_rate' => ['required'],
                    'allowance' => ['required'],
                    'leave_bal_VL' => ['required'],
                    'leave_bal_SIL' => ['required'],
                    'sss' => ['nullable'],
                    'pagibig'=> ['nullable'],
                    'philhealth' => ['nullable'],
                    'images' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:3000']
                ]);
                $incomingFields['status'] = $request->boolean('status');
                $incomingFields['username'] = strtolower($incomingFields['first_name']) . " " . strtolower($incomingFields['last_name']);
                $incomingFields['password'] = '12345';
                $incomingFields['userlevel'] = '1';
                $incomingFields['user_id'] = auth()->id();
                

                //= user model =//
                User::create($incomingFields);
                    //= employee model =//
                Employeelist::create($incomingFields);
                
                return redirect('/employee_register')->with(['meesage'=>'Employee Successfully Register','type'=>'success']);
        }

}