<div>
    <table class='table small'>
        <thead>
            <tr>
        <th>Date</th>
        <th>Transaction Number</th>
        <th>PO Number</th>
        <th>Plate Number</th>
        <th>Item Description</th>
        <th>Quantity</th>
        <th>Sold Price</th>
        <th>Total Amount</th>
        <th>Driver</th>
        <th>Destination</th>
        <th>Company</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($addRows as $addRow)
                
         <tr>
        <td><input wire:model='addRow.transdate' type='date' class='small' required></input></td>
        <td><input wire:model='addRow.transnumber' type='text' class='small'></input></td>
        <td><input wire:model='addRow.ponumber' type='text' class='small'></input></td>
        <td>
            <select wire:model='addRow.vehicle'><option value=''>-- Select Vehicle --</option>@foreach($plates as $plate)<option value='{{$plate->plate_number}}'>{{$plate->plate_number}}</option> @endforeach</select>
           
        </td>
        <td><select wire:model='addRow.product'><option value=''>-- Select Product --</option><option value='DIESEL'>DIESEL</option><option value='GAS'>GAS</option><option value='BREAK FLUID'>BREAK FLUID</option></select></td>
        <td><input wire:model='addRow.gasqty' type='number' class='small'></input></td>
        <td><input wire:model='addRow.gasprice' type='number' class='small'></input></td>
        <td><input wire:model='addRow.gastotalamount' type='number' class='small'></input></td>
        <td>
            <select wire:model='addRow.driver'><option value=''>-- Select Driver --</option>@foreach ($drivers as $driver)<option value='{{$driver->driver}}'>{{$driver->driver}}</option> @endforeach</select>
        </td>
        <td><select wire:model='addRow.destination'><option value=''>-- Select Destination --</option>@foreach ($destinations as $destination) <option value='{{ $destination->destination}}'>{{ $destination->destination}}</option>@endforeach</select></td>
        <td><select wire:model='addRow.company'><option value=''>-- Select Company --</option> <option value="PETROLERO">PETROLERO</option><option value="TOMADRIAN">TOMADRIAN</option> </select></td>
    </tr>
        @endforeach
        </tbody>

    </table>
    <button wire:click='sample' >sample</button>
    <button wire:click='save' >save</button>
</div>
