<div class='border'>
        <div class='container-fluid'>
            
                
                <div class='input-group input-group-sm'>
                    <div class='row justify-content-center'>
                       
                            <div class='col-md-4 mt-1 mx-auto'><label class='label'> Date : </label><input name='transdate' wire:model='transdate' type='date' class='input-group-text'></input>
                            @error('transdate') <span class="text-danger">{{ "Date is required" }}</span> @enderror
                            </div>
                                
                            <div class='col-md-4 mt-1 mx-auto'><label class='label'> Transaction Number : </label><input wire:model='transnumber' type='text' class='input-group-text'></input>
                            @error('transnumber') <span class="text-danger">{{ "Transaction Number is required" }}</span> @enderror
                            </div>
                            
                            <div class='col-md-4 mt-1 mx-auto'><label class='label'> P.O. Number : </label><input wire:model='ponumber' type='text' class='input-group-text' required></input>
                            @error('ponumber') <span class="text-danger">{{ "P.O. Number is required" }}</span> @enderror
                            </div>

                            <div class='col-md-4 mt-1 mx-auto'><label class='label'> Quantity </label><input name='' wire:model='quantity' type='number' class='input-group-text' required></input>
                            @error('quantity') <span class="text-danger">{{ "Quantity is required" }}</span> @enderror
                            </div>

                            <div class='col-md-4 mt-1 mx-auto'><label class='label'> Price </label><input name='price' wire:model='price' type='number' class='input-group-text' required></input>
                            @error('price') <span class="text-danger">{{ "Price is required" }}</span> @enderror
                            </div>    

                            <div class='col-md-4 mt-1 mx-auto'><label class='label'> Vehicle </label><select wire:model='vehicle' class='form-select' style='width:205px;' required><option value=''>-- Select Vehicle --</option>@foreach($plates as $plate)<option value='{{$plate->plate_number}}'>{{$plate->plate_number}}</option> @endforeach</select>
                            @error('vehicle') <span class="text-danger">{{ "Vehicle is required" }}</span> @enderror
                            </div>
                            
                            <div class='col-md-4 mt-1 mx-auto'><label class='label'> Product </label><select wire:model='product' class='form-select' style='width:205px;' required><option value=''>-- Select Product --</option><option value='DIESEL'>DIESEL</option><option value='GAS'>GAS</option><option value='BREAK FLUID'>BREAK FLUID</option></select>
                            @error('product') <span class="text-danger">{{ "Product is required" }}</span> @enderror
                            </div>
                            
                            <div class='col-md-4 mt-1 mx-auto' hidden><label> Total Amount </label><input wire:model='totalamount' type='number' class='input-group-text'></input></div>
                            
                            <div class='col-md-4 mt-1 mx-auto'><label class='label'> Driver </label><select wire:model='driver' class='form-select' style='width:205px;' required><option value=''>-- Select Driver --</option>@foreach ($drivers as $driver)<option value='{{$driver->driver}}'>{{$driver->driver}}</option> @endforeach</select>
                            @error('driver') <span class="text-danger">{{ "P.O. Number is required" }}</span> @enderror
                            </div>
                            
                            <div class='col-4 mt-1 mx-auto'><label class='label'> Destination </label><select wire:model='destination' class='form-select' style='width:205px;' required><option value=''>-- Select Destination --</option>@foreach ($destinations as $destination) <option value='{{ $destination->destination}}'>{{ $destination->destination}}</option>@endforeach</select>
                            @error('destination') <span class="text-danger">{{ "Destination is required" }}</span> @enderror
                            </div>
                            
                            <div class='col-4 mt-1 mx-auto'><label class='label'> Company </label><select wire:model='company' class='form-select' style='width:205px;' required><option value=''>-- Select Company --</option> <option value="PETROLERO">PETROLERO</option><option value="TOMADRIAN">TOMADRIAN</option> </select>
                            @error('company') <span class="text-danger">{{ "Company is required" }}</span> @enderror
                            </div>
                            <div class='col-4 mt-1 mx-auto'>
                            </div>
                            <div class='col-4 mt-1 mx-auto'>
                            </div>
                            
                             <div class='col-4 mt-1 mx-auto'>
                                <button wire:click='save' class='btn btn-primary my-2' style='width:100%;'> Save Record </button>
                            </div>
                             <div class='col-4 mt-1 mx-auto'>
                            </div>
                             <div class='col-4 mt-1 mx-auto'>
                            </div>

                
                
                
            </div>
                </div>
            @section('gstoast')
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <script>
           
            window.addEventListener('success', () => {
           
             Swal.fire({
            toast: true,
            position: 'top', // top, top-start, top-end
            icon: 'success',         // success, error, warning, info
            title: 'Data successfully added',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
                    });
            sname.value='';
            sstart.value='';
            send.value='';
                //const modal = bootstrap.Modal.getInstance(document.getElementById('addModal'));
            // modal.hide(); // Close modal
            // form.reset(); // Clear form
          
            });
            </script>
            @endsection
        </div>
 

   
</div>
