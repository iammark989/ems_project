<!-- MAKE SCHEDULE -->

    @section('makecutoffperiod')
    <div class="modal fade mt-5" id="editModal" tabindex="-1" aria-labelledby="editModalModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="editModalModalLabel">Edit Clock In / Out</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                   
                        <div class="modal-body">
                    <div class="mb-3">
                        
                        <label>Clock In</label>
                        <input type="text" class="form-control" wire:model='cin'>
                       
                    </div>
                    <div class="mb-3">
                     
                        <label>Clock Out</label>
                        <input type="time" class="form-control" wire:model='cout'>
                    </div>
                    </div>
                    
                      
                     
                        </div>
                        </div>
                        </div>




@endsection
