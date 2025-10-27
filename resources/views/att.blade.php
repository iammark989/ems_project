<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
        <div class="page-content">
 

                
        <div class="container-fluid">
                
                <div class='container'>
                       
                        <input id='scanInput' type='text' autofocus autocomplete="off" style='opacity:0;'></input>
                         <div id="message" class="mt-3 text-success"></div>
        </div>
        </div>

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
</body>
</html>