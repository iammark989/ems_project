



   @auth
        <x-main>
                
                <h5>Employee Registration</h5>
                <hr>

        <div class="page-content">

                
        <div class="container-fluid">
                <div class='container'>
                                                <!-- alert -->
                                                @if (session()->has('success'))
                                                <div class='container container--narrow'>
                                                <div class='alert alert-success  text-center'>
                                                {{ session('success') }}
                                                </div>
                                                </div>
                                                @elseif(session()->has('failed'))
                                                <div class='container container--narrow'>
                                                <div class='alert alert-danger  text-center'>
                                                {{ session('failed') }}
                                                </div>
                                                </div>
                                                 @endif
                        <div class='row'>
                                <div div class='col-4 mt-2' style='background-color:white;padding: 7px 0 7px 0;'>
                                                <div class="row text-center">
                                                <div class="col-12 d-flex justify-content-center align-items-center" 
                                                style="height: 35vh;">
                                                <img class='mx-auto.d-block img-fluid img-thumbnail' name='theimages' src="/fallback-image.jpg" alt="Preview" class="img-fluid" style="max-height: 100%; max-width: 100%;">
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
                                <form action="/addemployee" method='POST'>
                                 @csrf  
                                                <div class='row'>
                                                        <div class='col-2 form-group'><label class='label mt-1'>Employee ID</label><input value='{{ old('employeeID') }}' name='employeeID' class='form-control form-control-sm' type='text' maxlength="3"></input></div>
                                                        <div class="col-7"><label class='label mt-1'>Email Address</label><input value='{{ old('email') }}' name='email' class='form-control form-control-sm' type='email' maxlength="50"></input> @error('email')<p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>@enderror</div>
                                                        
                                                        <div class="col-3 checkbox"><label class='label mt-1'><input type="checkbox" name="status" {{ old('status') ? 'checked' : '' }}> Status</label></div>
                                                </div>
                                        <div class='form-group'><label class='label mt-1'>First Name</label><input value='{{ old('first_name') }}' name='first_name' class='form-control form-control-sm' type='text' maxlength="50"></input> @error('first_name')<p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>@enderror</div>
                                        
                                        <div class='form-group'><label class='label mt-1'>Middle Name</label><input value='{{ old('middle_name') }}' name='middle_name' class='form-control form-control-sm' type='text' maxlength="50"></input></div>
                                        <div class='form-group'><label class='label mt-1'>Last Name</label><input value='{{ old('last_name') }}' name='last_name' class='form-control form-control-sm' type='text' maxlength="50"></input> @error('last_name')<p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>@enderror</div>
                                        
                                        
                                </div>  
                                <div class='col-12' style='padding:15px;'>
                                        <div class='row'>
                                                        <div class='col-4 form-group'><label class='label mt-1'>Position</label><input value='{{ old('position') }}' name='position' class='form-control form-control-sm' type='text' maxlength="30"></input> @error('position')<p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>@enderror </div>
                                                        
                                                        <div class='col-4 form-group'><label class='label mt-1'>Date Hired</label><input value='{{ old('date_hired') }}' name='date_hired' class='form-control form-control-sm' type='date'></input> @error('date_hired')<p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>@enderror</div>
                                                        
                                                        <div class='col-4 form-group'><label class='label mt-1'>Daily Rate</label><input value='{{ old('daily_rate') }}' name='daily_rate' class='form-control form-control-sm' type='number' step='0.01' maxlength="10"></input> @error('daily_rate')<p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>@enderror </div>   
                                                                                                       
                                        </div>
                                        <div class='row'>
                                                        <div class='col-4 form-group'><label class='label mt-1'>Allowance</label><input value='{{ old('allowance') }}' name='allowance' class='form-control form-control-sm' type='number' step='0.01' maxlength="10"></input></div>
                                                        <div class='col-4 form-group'><label class='label mt-1'>Service incentive Leave</label><input value='{{ old('leave_bal_SIL') }}' name='leave_bal_SIL' class='form-control form-control-sm'type='number' step='0.01' maxlength="10"></input></div>
                                                        <div class='col-4 form-group'><label class='label mt-1'>Vacation Leave</label><input value='{{ old('leave_bal_VL') }}' name='leave_bal_VL' class='form-control form-control-sm' type='number' step='0.01' maxlength="10"></input></div>                                                   
                                        </div>
                                        <div class='row'>
                                                        <div class='col-4 form-group'><label class='label mt-1'>SSS</label><input value='{{ old('sss') }}' name='sss' class='form-control form-control-sm' type='text' maxlength="20"></input></div>
                                                        <div class='col-4 form-group'><label class='label mt-1'>Pagibig</label><input value='{{ old('pagibig') }}' name='pagibig' class='form-control form-control-sm' type='text' maxlength="20"></input></div>
                                                        <div class='col-4 form-group'><label class='label mt-1'>Philhealth</label><input value='{{ old('philhealth') }}' name='philhealth' class='form-control form-control-sm' type='text' maxlength="20"></input></div>                                                   
                                        </div>
                                        
                                        <div class='row'>
                                                        <div class='col-4 form-group'>
                                                                <label class='label mt-1'>Access Level</label>
                                                                <select name='userlevel' class='content-field inputfield small'>
                                                                <option value="1" {{ old('userlevel') == "1" ? 'selected' : '' }}>Employee</option>
                                                                <option value="2" {{ old('userlevel') == "2" ? 'selected' : '' }}>Accounting</option>
                                                                <option value="3" {{ old('userlevel') == "3" ? 'selected' : '' }}>HR Department</option>
                                                                <option value="4" {{ old('userlevel') == "4" ? 'selected' : '' }}>Administrator</option>
                                                                </select>
                                                        </div>
                                                        
                                                        <div class='col-4 form-group'>
                                                                
                                                        </div>
                                                        <div class='col-4 form-group'>
                                                               
                                                        </div>                 
                                        </div>
                                        <div class='row'>
                                              <div class='col-4 form-group'>
                                                                <button class='btn btn-primary form-control mt-2' type='submit'> Save </button>
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
        </div>

        </x-main>
  @else
  
  @include('login');
     
   @endauth
    
