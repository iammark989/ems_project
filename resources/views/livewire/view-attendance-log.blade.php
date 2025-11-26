
<div class='container'>
                
                <form wire:submit.prevent="viewResult">
                <select  wire:model="selectedEmployee">
                    
                        <option value="">-- Select Employee --</option>
                   @foreach ($employees as $employee)
                    <option value='{{ $employee->employeeID }}'>
                        {{ $employee->username }}
                            
                        
                    </option>
                    @endforeach
                </select>    
                <label>Date From : <input type='date' wire:model='datefrom' required /></label>@error('datefrom') {{$message}} @enderror
                <label>Date To : <input type='date' wire:model='dateto' required /></label>
                <button type='submit' >VIEW</button>

                </form>
             

                <table class='table table-hover'>
                    <thead>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Clock In</th>
                        <th>Clock Out</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach ($results as $result)

                        <tr>
                            <td>{{$result->empID}}</td>
                            <td>{{ strtoupper($result->name) }}</td>
                            <td>{{$result->recordDate}}</td>
                            <td>{{$result->ClockIN}}</td>
                            <td>{{$result->ClockOUT}}</td>
                            <td>{{ $result->Status }}</td>
                             <td>
                    <!-- Dropdown Menu -->
                    <div class="dropdown">
                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Actions
                        </button>
                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item" data-bs-toggle='modal' data-bs-target='#editModal' wire:click="edit({{ $result->recordDate }},{{ $result->empID }})">Edit</button></li>
                            <li><button class="dropdown-item" wire:click="save()">Save</button></li>
                        </ul>
                    </div>
                </td>
                        </tr>
                        
                           @endforeach
                          
                    </tbody>

                </table>

    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</div>

     