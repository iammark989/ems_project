
<div class='container'>
                
                <form wire:submit.prevent="viewResult">
                     
                <label>Date From : <input type='date' wire:model='datefrom' required /></label>@error('datefrom') {{$message}} @enderror
                <label>Date To : <input type='date' wire:model='dateto' required /></label>
                <button type='submit' >VIEW</button>

                </form>
             

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
                           <td>{{$result->recordDate}}</td>
                            <td>{{$result->clockRecord}}</td>
                            <td>{{ $result->stat === "ClockIn" ? "Clock In" : "Clock Out" }}</td>
                        </tr>
                           @endforeach
                    </tbody>

                </table>

</div>
