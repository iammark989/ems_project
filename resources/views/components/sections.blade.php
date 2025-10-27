    <!-- RFID Registration Modal -->
                @section('rfidregistration')
                        
                        <div class="modal fade mt-5" id="rfidModal" tabindex="-1" aria-labelledby="rfidModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="rfidModalLabel">RFID Registration</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- <form action="/sample" method="POST">
                                csrf -->
                                <div class="modal-body">
                                <div class="mb-3">
                                <!--<label for="employeeID" class="form-label">Employee ID</label> -->
                                <input hidden value='{{ $empdetails->employeeID }}' type="text" class="form-control" name="employeeID" disabled index='-1'>
                                </div>
                                <div class="mb-3">
                                <label for="rfid_code" class="form-label">RFID Code</label>
                                <input type="text" class="form-control" name="rfid_code" id="rfid_code" placeholder="Tap RFID card..." required autofocus>
                                <p id='toscanmsg'>Click here to register ID card</p>
                                </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                
                                <button type="" class="btn btn-primary">Save RFID</button>
                                </div>
                        <!--</form>-->
                        </div>
                        </div>
                        </div>
                @endsection
                

                <!-- Fingerprint Registration Modal -->
                @section('fpregistration')
                <div class="modal fade" id="fingerprintModal" tabindex="-1" aria-labelledby="fingerprintModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="fingerprintModalLabel">Fingerprint Registration</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="" method="POST">
                        @csrf
                        <div class="modal-body">
                        <div class="mb-3">
                        <label for="employeeID" class="form-label">Employee ID</label>
                        <input value='{{ $empdetails->employeeID }}' type="text" class="form-control" name="employeeID" disabled>
                        </div>
                        <div class="mb-3 text-center">
                        <p>Place your finger on the scanner...</p>
                        <!-- You can integrate your JS scanner script here -->
                        </div>
                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Fingerprint</button>
                        </div>
                </form>
                </div>
                </div>
                </div>
                @endsection

                @section('rfidmodalscript')
                <script>
                        // RFID start //
                const regID = document.getElementById('rfid_code');
                const toscanmsg = document.getElementById('toscanmsg');             

                // Always refocus input in case the user clicks somewhere else
                rfidModal.addEventListener('click', function(event){ 
                       if(event.target !== regID){
                        regID.focus();
                        toscanmsg.innerHTML = "Scan your ID card";
                }
                });
                        
                // event after scanned
                        regID.addEventListener('change', async () => {
                        const scannedValue = regID.value.trim();
                        if (!regID) return;

                // Example: send data to Laravel route
                        const response = await fetch('/register/rfid', {
                        method: 'POST',
                        headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ rfid: regID })
                        });

                
                        const result = await response.json();

                        if (result.success) {
                        toscanmsg.innerHTML = `success`;
                        } else {
                        toscanmsg.innerHTML = 'failed';

                        }
                        // Reset input for next scan
                        regID.value = '';
                        regID.focus();
                });
                
               </script>
                @endsection