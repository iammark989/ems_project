<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EMS</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">    
</head>
<style>html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}
</style>
<body style="height: auto;">
<div class="layout">
   

@include('components.layouts.sidebar')
@include('components.layouts.topbar')
    


        <section class='content' id='content'>
        {{ $slot }}
        </section>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    @yield('scripts')
    @yield('rscripts')
    @yield('printpayslip')
    @yield('rfidscript')
    @yield('rfidregistration')
    @yield('fpregistration')
    @yield('rfidmodalscript')
    @yield('makeschedule')
    @yield('schedulescript')
     @yield('makecutoffperiod')
    @yield('cutoffperiodscript')
    @yield('editclockinout')
    @yield('gstoast')
    

</body>


<x-toast />
</html>