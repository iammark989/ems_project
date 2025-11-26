<div class='d-flex justify-content-center align-items-center'>
        <div class='container-fluid'>
            <div class='row g-2'>
                <div class='input-group input-group-sm'>
                <div class='col-md-4 mx-3 mt-1'><label> Date : </label><input wire:model='transdate' type='date' class='input-group-text' required></input></div>
                <div class='col-md-4 mx-3 mt-1'><label> Transaction Number : </label><input wire:model='transnumber' type='text' class='input-group-text'></input></div>
                <div class='col-md-4 mx-3 mt-1'><label> P.O. Number : </label><input wire:model='ponumber' type='text' class='input-group-text'></input></div>
                <div class='col-md-4 mx-3 mt-1'><label> Vehicle </label><select wire:model='vehicle' class='form-select'><option value=''>-- Select Vehicle --</option>@foreach($plates as $plate)<option value='{{$plate->plate_number}}'>{{$plate->plate_number}}</option> @endforeach</select></div>
                <div class='col-md-4 mx-3 mt-1'><label> Product </label><select wire:model='product' class='form-select'><option value=''>-- Select Product --</option><option value='DIESEL'>DIESEL</option><option value='GAS'>GAS</option><option value='BREAK FLUID'>BREAK FLUID</option></select></div>
                <div class='col-md-4 mx-3 mt-1'><label> Quantity </label><input wire:model='gasqty' type='number' class='input-group-text'></input></div>
                <div class='col-md-4 mx-3 mt-1'><label> Price </label><input wire:model='gasprice' type='number' class='input-group-text'></input></div>
                <div class='col-md-4 mx-3 mt-1'><label> Total Amount </label><input wire:model='gastotalamount' type='number' class='input-group-text'></input></div>
                <div class='col-md-4 mx-3 mt-1'><label> Driver </label><select wire:model='driver' class='form-select'><option value=''>-- Select Driver --</option>@foreach ($drivers as $driver)<option value='{{$driver->driver}}'>{{$driver->driver}}</option> @endforeach</select></div>
                <div class='col-md-4 mx-3 mt-1'><label> Destination </label><select wire:model='destination' class='form-select'><option value=''>-- Select Destination --</option>@foreach ($destinations as $destination) <option value='{{ $destination->destination}}'>{{ $destination->destination}}</option>@endforeach</select></div>
                <div class='col-md-4 mx-3 mt-1'><label> Company </label><select wire:model='company' class='form-select'><option value=''>-- Select Company --</option> <option value="PETROLERO">PETROLERO</option><option value="TOMADRIAN">TOMADRIAN</option> </select></div>
            </div>
             <button wire:click='save' > save </button>
            </div>
            
        </div>
 

   
</div>
