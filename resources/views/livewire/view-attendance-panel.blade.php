            @if (!$activeView || $activeView=='main')
            <style>
                .selection:hover {
                        background-color: rgb(247, 247, 247);
                        transform: translateY(-5px);
                }
                .viewlink{
                        text-decoration: none;
                        color:black;
                }
                </style>
                <div class='container'>
                <div class='col-5'><h5>Employee Attendance</h5></div> 
                <hr>
                
                <div class='row'>
                        
                        <a href='/attendance/view-clockinout-log' class='viewlink'><div class='selection col-md-4 border text-center m-2 shadow' style='width:300px;cursor:pointer;'>
                        <p class='mt-3'>View employee clock in/out logs</p>
                        </div>
                        </a>

                         <a href='/attendance/view-attendance-log' class='viewlink'>
                        <div class='selection col-md-4 border text-center m-2 shadow' style='width:300px;'>
                        <p class='mt-3'>View Employee attendance</p>
                        </div>
                        </a>

                         <a href='/attendance/view-attendance-log' class='viewlink'>
                        <div class='selection col-md-4 border text-center m-2 shadow' style='width:300px;'>
                        <p class='mt-3'>Update Employee Daily Schedule</p>
                        </div>
                        </a>
                        
                <div>
                </div>
                
                
            @elseif ($activeView == 'attlogs') <!-- View Attendance Log -->
           <div class='container'>
                <div class='col-5'><h5>Employee Attendance Log</h5></div> 
                <hr>
                <form wire:submit.prevent="viewResult">
                     
                <label>Date From : <input type='date' wire:model='datefrom' required /></label>@error('datefrom') {{$message}} @enderror
                <label>Date To : <input type='date' wire:model='dateto' required /></label>
                <button type='submit' >VIEW</button>

                </form>
                 <div class='selection col-md-4 border text-center m-2 shadow' style='width:300px;cursor:pointer;' wire:click="showView('main')">
                        <p>back</p>
                        </div>

                <table class='table table-hover'>
                    <thead>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Clock</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach ($results as $result)
                        <tr>
                            <td>{{$result->employeeID}}</td>
                            <td>{{ strtoupper($result->user->username) }}</td>
                           <td>{{$result->date}}</td>
                            <td>{{$result->clockRecord}}</td>
                            <td>{{ $result->stat === "ClockIn" ? "Clock In" : "Clock Out" }}</td>
                        </tr>
                           @endforeach
                    </tbody>

                </table>
                
           </div>  
           
            @endif

              