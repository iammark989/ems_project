



   @auth
        <x-main>

        <div class="page-content">

        <div class="container-fluid">
                <div class='container'>
                        <form action="/saveEditDetails/{{$empdetails->employeeID}}" method='POST' enctype='multipart/form-data'>
                                 @csrf  
                                 @method('PUT')
                        <div class='row'>
                                
                                <!-- == employee image == -->
                                <div class='col-4 mt-2' style='background-color:white;padding: 7px 0 0 0;'>
                                                <div class="row text-center">
                                                <div class="col-12 d-flex justify-content-center align-items-center" 
                                                style="height: 35vh;">
                                                <img class='mx-auto.d-block img-fluid img-thumbnail' name='theimages' src="{{ $userdetails->images }}" alt="Preview" class="img-fluid" style="max-height: 100%; max-width: 100%;"><input hidden value='{{ $userdetails->images }}' name='imagesrc'>
                                                <!-- or simply use text placeholder -->
                                                <!-- <span class="text-white">image</span> -->
                                                </div>

                                                <div class="col-12 m-1">
                                                <input type="file" name='images'>
                                                @error('images')
                                                <p class='alert-sm alert-sm-danger shadow-sm'>{{ $message }}</p>
                                                @enderror
                                                </div>
                                                </div>
                                </div>

                                <!-- == employee details == -->
                                                             
                                <div class='col-8' style='padding:15px'>
                                
                                                <div class='row'>
                                                        <div class='col-2 form-group'><label class='label mt-1'>Employee ID</label><input value='{{ old('employeeID',$empdetails->employeeID) }}' name ='employeeID' class='form-control form-control-sm' type='text' maxlength="3" disabled></input></div>
                                                        <div class="col-7"><label class='label label mt-1'>Email Address</label><input value='{{ old('email', $userdetails->email) }}' name='email' class='form-control form-control-sm' type='email' maxlength="50"></input> @error('email')<p class='m-0 alert-sm alert-danger shadow-sm'>{{$message}}</p>@enderror</div>
                                                        
                                                        <div class="col-3 checkbox"><label class='label label mt-4'><input {{ old('status', $userdetails->status) ? 'checked' : '' }} type="checkbox" name="status"> Status</label></div>
                                                </div>
                                        <div class='form-group'><label class='label mt-1'>First Name</label><input value='{{ old('first_name', $empdetails->first_name) }}' name='first_name' class='form-control form-control-sm' type='text' maxlength="50"></input> @error('first_name')<p class='m-0 alert-sm alert-danger shadow-sm'>{{$message}}</p>@enderror</div>
                                        
                                        <div class='form-group'><label class='label mt-1'>Middle Name</label><input value='{{ old('middle_name', $empdetails->middle_name) }}' name='middle_name' class='form-control form-control-sm' type='text' maxlength="50"></input></div>
                                        <div class='form-group'><label class='label mt-1'>Last Name</label><input value='{{ old('last_name', $empdetails->last_name) }}' name='last_name' class='form-control form-control-sm' type='text' maxlength="50"></input> @error('last_name')<p class='m-0 alert-sm alert-danger shadow-sm'>{{$message}}</p>@enderror</div>
                                        
                                        
                                </div>  
                                <div class='col-12' style='padding:15px;'>
                                        <div class='row'>
                                                        <div class='col-4 form-group'><label class='label mt-1'>Position</label><input value='{{ old('position', $empdetails->position) }}' name='position' class='content-field form-control form-control-sm' type='text' maxlength="30"></input> @error('position')<p class='m-0 alert-sm alert-danger shadow-sm'>{{$message}}</p>@enderror </div>
                                                        
                                                        <div class='col-4 form-group'><label class='label mt-1'>Date Hired</label><input value='{{ old('date_hired', $empdetails->date_hired) }}' name='date_hired' class='content-field form-control form-control-sm' type='date'></input> @error('date_hired')<p class='m-0 alert-sm alert-danger shadow-sm'>{{$message}}</p>@enderror</div>
                                                        
                                                        <div class='col-4 form-group'><label class='label mt-1'>Daily Rate</label><input value='{{ old('daily_rate', $empdetails->daily_rate) }}' name='daily_rate' class='content-field form-control form-control-sm' type='number' step='0.01' maxlength="10"></input> @error('daily_rate')<p class='m-0 alert-sm alert-danger shadow-sm'>{{$message}}</p>@enderror </div>   
                                                                                                       
                                        </div>
                                        <div class='row'>
                                                        <div class='col-4 form-group'><label class='label mt-1'>Allowance</label><input value='{{ old('allowance', $empdetails->allowance) }}' name='allowance' class='content-field form-control form-control-sm' type='number' step='0.01' maxlength="10"></input></div>
                                                        <div class='col-4 form-group'><label class='label mt-1'>Service incentive Leave</label><input value='{{ old('leave_bal_SIL', $empdetails->leave_bal_SIL) }}' name='leave_bal_SIL' class='content-field form-control form-control-sm' type='number' step='0.01' maxlength="10"></input></div>
                                                        <div class='col-4 form-group'><label class='label mt-1'>Vacation Leave</label><input value='{{ old('leave_bal_VL', $empdetails->leave_bal_VL) }}' name='leave_bal_VL' class='content-field form-control form-control-sm' type='number' step='0.01' maxlength="10"></input></div>                                                   
                                        </div>
                                        <div class='row'>
                                                        <div class='col-4 form-group'><label class='label mt-1'>SSS</label><input value='{{ old('sss', $empdetails->sss) }}' name='sss' class='content-field form-control form-control-sm' type='text' maxlength="20"></input></div>
                                                        <div class='col-4 form-group'><label class='label mt-1'>Pagibig</label><input value='{{ old('pagibig', $empdetails->pagibig) }}' name='pagibig' class='content-field form-control form-control-sm' type='text' maxlength="20"></input></div>
                                                        <div class='col-4 form-group'><label class='label mt-1'>Philhealth</label><input value='{{ old('philhealth', $empdetails->philhealth) }}' name='philhealth' class='content-field form-control form-control-sm' type='text' maxlength="20"></input></div>                                                   
                                        </div>
                                        
                                        <div class='row'>
                                                        <div class='col-4 form-group'><label class='label mt-1'>Access Level</label>
                                                                <select name='userlevel' class='inputfield form-control-sm'>
                                                                <option value="1" {{ "1" == $userdetails->userlevel ? 'selected' : '' }}>Employee</option>
                                                                <option value="2" {{ "2" == $userdetails->userlevel ? 'selected' : '' }}>Accounting</option>
                                                                <option value="3" {{ "3" == $userdetails->userlevel ? 'selected' : '' }}>HR Department</option>
                                                                <option value="4" {{ "4" == $userdetails->userlevel ? 'selected' : '' }}>Administrator</option>
                                                                </select>
                                                        </div>
                                                        <div class='col-4 d-flex align-items-center justify-content-evenly'>                                                   
                                                                <button type="button" class="mt-3 px-5 btn btn-primary" data-bs-toggle="modal" data-bs-target="#fingerprintModal">  Register Fingerprint </button>           
                                                        </div>
                                                        <div class='col-4 d-flex align-items-center justify-content-evenly'>
                                                                <button type='button' class='mt-3 px-5 btn btn-primary' data-bs-toggle="modal" data-bs-target="#rfidModal"> Register ID Card </button>                                                                      
                                                        </div>
                                                        
                                               
                                        </div>
                                        <div class='row'>
                                                        <div class='col-4 btn-group'>
                                                                <button type='submit' class='mt-2 me-3 px-5 btn btn-primary' name="saveedit"> Save </button>
                                                                <a href='/employeelist/{{$empdetails->employeeID}}' class='mt-2 px-5 btn btn-primary' name="cancel"> Back </a>
                                                        </div>
                                                        <div class='col-4 form-group'>
                                                                
                                                        </div>
                                                        <div class='col-4 form-group'>
                                                                
                                                        </div>


                                        </div>        

                                </form> 
                                </div>     
                        </div>
                </div>        
        </div>
        </div>
        
        @include('components.sections')
        </x-main>
  @else
  
  @include('login');
     
   @endauth
    
