<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> 
</head>

<body>
        <!-- Employee Info Container -->
<div id="employeeInfo" 
     class="container bg-light rounded shadow p-4 my-4 d-flex flex-column flex-md-row align-items-center justify-content-center"
     style="max-width: 700px; opacity: 0; transform: translateY(20px); transition: all 0.5s ease;">
  
  <!-- Employee Picture -->
  <div class="text-center border border-secondary rounded p-2 bg-white mb-3 mb-md-0 me-md-4">
    <img src="/images/default.png" 
         alt="Employee Picture"
         class="border border-dark rounded"
         style="width: 200px; height: 200px; object-fit: cover;">
    <div class="fw-semibold mt-2 text-muted">EMPLOYEE PICTURE</div>
  </div>

  <!-- Employee Details -->
  <div class="d-flex flex-column w-100">
    <div class="border border-secondary rounded p-2 text-center mb-3 bg-white fw-semibold">
      EMPLOYEE ID
    </div>
    <div class="border border-secondary rounded p-2 text-center mb-3 bg-white fw-semibold">
      EMPLOYEE NAME
    </div>
    <div class="border border-secondary rounded p-2 text-center bg-white fw-semibold">
      STATUS
    </div>
  </div>
</div>

<!-- Animation Script -->
<script>
  // Example: Trigger fade-in when data is loaded or after successful scan
  function showEmployeeInfo() {
    const info = document.getElementById('employeeInfo');
    info.style.opacity = '1';
    info.style.transform = 'translateY(0)';
  }

  // Example trigger (you can replace this with your RFID success event)
  // Simulate delay
  setTimeout(showEmployeeInfo, 500);
</script>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</body>
</html>