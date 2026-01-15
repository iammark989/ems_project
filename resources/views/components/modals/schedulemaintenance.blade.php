<!-- SCHEDULE MAINTENANCE -->

    @section('schedulemaintenance')
    <div class="modal fade mt-5" id="schemaintenanceModal" tabindex="-1" aria-labelledby="schemaintenanceModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="schemaintenanceModalLabel">Create Cutoff Period</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form id='schedmaintenance' action="/settings-payroll/schedule-maintenance" method="POST">
                                @csrf
                                <div class="modal-body">
                                <div class="mb-3">
                                  
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





<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection