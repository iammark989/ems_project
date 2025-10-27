



   @auth
        <x-main>

        <div class="page-content">

        <div class="container-fluid">
                <div class='container'>
                        <div class='row'>
                                <div class='col-4' style='border:solid black;'>image </div>

                                <!-- == employee details == -->
                                                             
                                <div class='col-8' style='border:solid rgb(245, 0, 0);padding:15px'>
                                <form action="/addemployee" method='POST'>
                                 @csrf  
                                                <div class='row'>
                                                        <div class='col-2 form-group'><label class='label'>Employee ID</label><input value='{{ old('employeeID',Auth()->user()->employeeID) }}' name ='employeeID' class='form-control input-sm' type='text' maxlength="3"></input></div>
                                                        <div class="col-7"><label class='label'>Email Address</label><input value='{{ old('email', Auth()->user()->email) }}' name='email' class='form-control input-sm' type='email' maxlength="50"></input> @error('email')<p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>@enderror</div>
                                                        
                                                        <div class="col-3 checkbox"><label class='label'><input {{ old('status', Auth::user()->status) ? 'checked' : '' }} type="checkbox" name="status"> Status</label></div>
                                                </div>
                                        <div class='form-group'><label class='label'>First Name</label><input value='{{ old('first_name', Auth()->user()->employeelist->first_name) }}' name='first_name' class='form-control input-sm' type='text' maxlength="50"></input> @error('first_name')<p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>@enderror</div>
                                        
                                        <div class='form-group'><label class='label'>Middle Name</label><input value='{{ old('middle_name', Auth()->user()->employeelist->middle_name) }}' name='middle_name' class='form-control input-sm' type='text' maxlength="50"></input></div>
                                        <div class='form-group'><label class='label'>Last Name</label><input value='{{ old('last_name', Auth()->user()->employeelist->last_name) }}' name='last_name' class='form-control input-sm' type='text' maxlength="50"></input> @error('last_name')<p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>@enderror</div>
                                        
                                        
                                </div>  
                                <div class='col-12' style='padding:15px;border:solid black;'>
                                        <div class='row'>
                                                        <div class='col-4 form-group'><label class='label'>Position</label><input value='{{ old('position', Auth()->user()->employeelist->position) }}' name='position' class='content-field form-control input-sm' type='text' maxlength="30"></input> @error('position')<p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>@enderror </div>
                                                        
                                                        <div class='col-4 form-group'><label class='label'>Date Hired</label><input value='{{ old('date_hired', Auth()->user()->employeelist->date_hired) }}' name='date_hired' class='content-field form-control input-sm' type='date'></input> @error('date_hired')<p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>@enderror</div>
                                                        
                                                        <div class='col-4 form-group'><label class='label'>Rate</label><input value='{{ old('daily_rate', Auth()->user()->employeelist->daily_rate) }}' name='daily_rate' class='content-field form-control input-sm' type='number' maxlength="10"></input> @error('daily_rate')<p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>@enderror </div>   
                                                                                                       
                                        </div>
                                        <div class='row'>
                                                        <div class='col-4 form-group'><label class='label'>Allowance</label><input value='{{ old('allowance', Auth()->user()->employeelist->allowance) }}' name='allowance' class='content-field form-control input-sm' type='number' maxlength="10"></input></div>
                                                        <div class='col-4 form-group'><label class='label'>Service incentive Leave</label><input value='{{ old('leave_bal_SIL', Auth()->user()->employeelist->leave_bal_SIL) }}' name='leave_bal_SIL' class='content-field form-control input-sm' type='number' maxlength="10"></input></div>
                                                        <div class='col-4 form-group'><label class='label'>Vacation Leave</label><input value='{{ old('leave_bal_VL', Auth()->user()->employeelist->leave_bal_VL) }}' name='leave_bal_VL' class='content-field form-control input-sm' type='number' maxlength="10"></input></div>                                                   
                                        </div>
                                        <div class='row'>
                                                        <div class='col-4 form-group'><label class='label'>SSS</label><input value='{{ old('sss', Auth()->user()->employeelist->sss) }}' name='sss' class='content-field form-control input-sm' type='text' maxlength="20"></input></div>
                                                        <div class='col-4 form-group'><label class='label'>Pagibig</label><input value='{{ old('pagibig', Auth()->user()->employeelist->pagibig) }}' name='pagibig' class='content-field form-control input-sm' type='text' maxlength="20"></input></div>
                                                        <div class='col-4 form-group'><label class='label'>Philhealth</label><input value='{{ old('philhealth', Auth()->user()->employeelist->philhealth) }}' name='philhealth' class='content-field form-control input-sm' type='text' maxlength="20"></input></div>                                                   
                                        </div>
                                        
                                        <div class='row'>
                                                        
                                                        <div class='col-4 form-group'>
                                                                <button type='submit' class='btn btn-primary' name="save"> Save </button>
                                                        </div>
                                                        
                                </form>                
                                        </div>
                                
                                </div>     
                        </div>
                </div>        
        </div>
        </div>

        </x-main>
  @else
  
  @include('login');
     
   @endauth
    
