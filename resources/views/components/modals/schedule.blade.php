<!-- MAKE SCHEDULE -->

    @section('makeschedule')
    <div class="modal fade mt-5" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="scheduleModalLabel">Create Employee Schedule/Shift</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form id='addschedule' action="/settings-payroll/addschedule" method="POST">
                                @csrf
                                <div class="modal-body">
                                <div class="mb-3">
                                <label for="shiftname" class="form-label">Schedule Name</label>
                                <input type="text" class="form-control" name="shift_name" id='shiftname' placeholder='ex: Opening, Closing...' required >
                                </div>
                                <div class="mb-3">
                                <label for="shiftstart" class="form-label">Start</label>
                                <input type="time" class="form-control" name="shift_start" id="shiftstart" required>
                                </div>
                                <div class="mb-3">
                                <label for="shiftend" class="form-label">Start</label>
                                <input type="time" class="form-control" name="shift_end" id="shiftend" required>
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

@section('schedulescript')
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