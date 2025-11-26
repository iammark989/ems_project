<!-- MAKE SCHEDULE -->

    @section('editclockinout')
    <div class="modal fade mt-5" id="cutoffperiodModal" tabindex="-1" aria-labelledby="cutoffperiodModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="cutoffperiodModalLabel">Create Cutoff Period</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form id='addschedule' action="/settings-payroll/cutoffperiod" method="POST">
                                @csrf
                                <div class="modal-body">
                                <div class="mb-3">
                                  <label for='cutoffperiod' class="form-label">Select Cut off Period :</label>
                                  <select name='cotoffperiod'>
                                      <option value='1'>5th & 20th of the month</option>
                                      <option value='2'>10th & 25th of the month </option>
                                      <option value='3'>15th & end of the month </option>
                                  </select>
                                </div>
                                </div>
                                <div class="modal-footer">
                                <button hidden type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                
                                <button type='submit' class="btn btn-primary">Save</button>
                                </div>
                        </form>
                        </div>
                        </div>
                        </div>




@endsection

@section('editclockinoutscript')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>



const form = document.querySelector('#addschedule');
form.addEventListener('submit', async (e) => {
  e.preventDefault();

  const formData = new FormData(form);
    const sname = document.getElementById('shiftname');
    const sstart = document.getElementById('shiftstart');
    const send = document.getElementById('shiftend');
    const namevalue = sname.value.trim();
    const startvalue = sstart.value.trim();
    const endvalue = send.value.trim();
  const response = await fetch('/settings-payroll/addschedule', {
    method: 'POST',
    headers: {
       'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    //body: formData
    body: JSON.stringify({ name: namevalue, start: startvalue , end: endvalue})
  });

  const result = await response.json();

  if (result.success) {
    Swal.fire({
            toast: true,
            position: 'top', // top, top-start, top-end
            icon: 'success',         // success, error, warning, info
            title: 'Schedule successfully added',
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
  } else if(!result.success){
    Swal.fire({
            toast: true,
            position: 'top', // top, top-start, top-end
            icon: 'error',         // success, error, warning, info
            title: 'Schedule already exist',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
  }
});
              
             

                
</script>    
@endsection