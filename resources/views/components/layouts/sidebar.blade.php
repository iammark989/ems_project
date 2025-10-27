<!-- sidebar start -->
<aside class="sidebar" id='sidebar'>
     <nav class="mt-2">
        <ul class='navi'>
        
        <li class='nav-headname'>
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <span class='text-uppercase'>{{Auth()->user()->username}}</span>
        </li>
        <li class='nav-link-head'><a href='/'>Dashboard</a></li>

            <!-- employee -->
            @can('hrdAdmin')
         <li class='nav-link-head'>Employee</li>
        <li class='nav-link'><a href="/employeelist"> Employee Masterlist</a></li>
        <li class='nav-link'><a href="/attendance"> Employee Attendance</a></li>
        <li class='nav-link'><a href="#"> Employee Request</a></li>
        <li class='nav-link'><a href="/employee_registration"> Employee Registration</a></li>
            @endcan
        
        <!-- reports -->
        @can('acctgAdmin')
        <li class='nav-link-head'>Reports</li>
        <li class='nav-link'><a href="#"> Sales Report</a></li>
        <li class='nav-link'><a href="#"> Gas Consumption Report</a></li>
        <li class='nav-link'><a href="#"> Inventory Sales Report</a></li>
        @endcan

         <!-- Services -->
        <li class='nav-link-head'>Services</li>
        <li class='nav-link'><a href="/view_payslip/{{ Auth()->user()->employeeID }}"> View Payslip</a></li>
        <li class='nav-link'><a href="#"> File Leave</a></li>
        <li class='nav-link'><a href="#"> Change Pin</a></li>

    </ul>

    <form method="POST" action="/logout" class="logout-form">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>

</aside>
    <!-- sidebar end -->
