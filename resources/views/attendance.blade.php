



   @auth
        <x-main>
                <div class='row'>
                        <div class='col-lg-12'>
                <div class='col-5'><h5>Clock In / Out</h5></div>
                <!-- Search bar (Bootstrap 5) -->

                </div>        
                <hr>

        <div class="page-content">
 

                
        <div class="container-fluid">
                
                <div class='container'>
                       
                        <input id='scanInput' type='text' autofocus autocomplete="off" style='opacity:0;'></input>
                         <div id="message" class="mt-3 text-success"></div>
        </div>
        </div>
        @section('rfidscript')
        <script>
    const scanInput = document.getElementById('scanInput');
    const message = document.getElementById('message');

    // Always refocus input in case the user clicks somewhere else
    window.addEventListener('click', () => scanInput.focus());

    scanInput.addEventListener('change', async () => {
        const scannedValue = scanInput.value.trim();
        if (!scannedValue) return;

      // Example: send data to Laravel route
        const response = await fetch('/attendance/log/rfid', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ rfid: scannedValue })
        });

     
        const result = await response.json();

        if (result.success) {
            message.textContent = `Welcome, ${result.employee_name}! (${result.status})`;
        } else {
            message.textContent = 'Invalid RFID or employee not found.';

        }
        // Reset input for next scan
        scanInput.value = '';
        scanInput.focus();
    });

    // Ensure focus stays on the input
    window.onload = () => scanInput.focus();
</script>
        @endsection
        </x-main>
  @else
  
  @include('login');
     
   @endauth
    
