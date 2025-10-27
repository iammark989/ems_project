@auth
	

<x-topbar>


<h5>View Paylip</h5>
<hr>
<div class="row">
	
	<div class="container-fluid" >
		<div class="card card-outline card-primary" >
		
		<form id="viewpayslip" action="/view_payslip/{{ $userDetails->employeeID }}" method="get">
		<div class="card-header" >
						@if($payrollDetails !== null)
						<span> Month : </span>
							<select name="month">
								<option value="JANUARY" {{ $payrollDetails->month == "JANUARY" ? 'selected' : '' }}>JANUARY</option>
								<option value="FEBRUARY" {{ $payrollDetails->month == "FEBRUARY" ? 'selected' : '' }}>FEBRUARY</option>
								<option value="MARCH" {{ $payrollDetails->month == "MARCH" ? 'selected' : '' }}>MARCH</option>
								<option value="APRIL" {{ $payrollDetails->month == "APRIL" ? 'selected' : '' }}>APRIL</option>
								<option value="MAY" {{ $payrollDetails->month == "MAY" ? 'selected' : '' }}>MAY</option>
								<option value="JUNE" {{ $payrollDetails->month == "JUNE" ? 'selected' : '' }}>JUNE</option>
								<option value="JULY" {{ $payrollDetails->month == "JULY" ? 'selected' : '' }}>JULY</option>
								<option value="AUGUST" {{ $payrollDetails->month == "AUGUST" ? 'selected' : '' }}>AUGUST</option>
								<option value="SEPTEMBER" {{ $payrollDetails->month == "SEPTEMBER" ? 'selected' : '' }}>SEPTEMBER</option>
								<option value="OCTOBER" {{ $payrollDetails->month == "OCTOBER" ? 'selected' : '' }}>OCTOBER</option>
								<option value="NOVEMBER" {{ $payrollDetails->month == "NOVEMBER" ? 'selected' : '' }}>NOVEMBER</option>
								<option value="DECEMBER" {{ $payrollDetails->month == "DECEMBER" ? 'selected' : '' }}>DECEMBER</option>
							</select>
				
						<span> Year : </span>
							<select name="year">
                                <option value="2025" {{ $payrollDetails->month == "2025" ? 'selected' : '' }}>2025</option>
                                <option value="2024" {{ $payrollDetails->month == "2024" ? 'selected' : '' }}>2024</option>
								<option value="2023" {{ $payrollDetails->month == "2023" ? 'selected' : '' }}>2023</option>                              
							</select>
		
						<span> Cutoff period : </span>
							<select name="cutoff" id="paydateval">
								<option value="1" {{ $payrollDetails->month == "1" ? 'selected' : '' }}>1</option>
								<option value="2" {{ $payrollDetails->month == "2" ? 'selected' : '' }}>2</option>
							</select>

						@else

						<span> Month : </span>
							<select name="month">
								<option value="JANUARY" >JANUARY</option>
								<option value="FEBRUARY">FEBRUARY</option>
								<option value="MARCH">MARCH</option>
								<option value="APRIL">APRIL</option>
								<option value="MAY">MAY</option>
								<option value="JUNE">JUNE</option>
								<option value="JULY">JULY</option>
								<option value="AUGUST">AUGUST</option>
								<option value="SEPTEMBER">SEPTEMBER</option>
								<option value="OCTOBER">OCTOBER</option>
								<option value="NOVEMBER">NOVEMBER</option>
								<option value="DECEMBER">DECEMBER</option>
							</select>
				
						<span> Year : </span>
							<select name="year">
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
								<option value="2023">2023</option>                              
							</select>
		
						<span> Cutoff period : </span>
							<select name="cutoff" id="paydateval">
								<option value="1">1</option>
								<option value="2">2</option>
							</select>
						@endif
						<button class="btn btn-flat btn-primary" id="btn_viewpayslip" type="submit">View</button>
						<div class="noresult mt-1">
						@if (isset($result))
							<div class='container container--narrow'>
						<div class='alert-sm alert-success  text-center'>
							Record Found
						</div>
						</div>
						@elseif(!isset($result))
						<div class='container container--narrow'>
						<div class='alert-sm alert-danger  text-center'>
							No Record Found
						</div>
						</div>
						@endif
						
		</form>

		@if($payrollDetails != null)
		</div>

		<div id="printArea">
		<div id="appending">
		<div class="card-body">
							
							<div class="container">
							<div class="row">
							

							<div class="col-lg-1" style="background-color:lavender;">LOGO</div>
							<div class="col-lg-11" style="background-color:lavender;"><h2 class="text-center"><i>GARBES DIZON SUPERMARKET</i></h2></div>
							<div class="col-lg-12"><hr></div>
							
									<div class="col-lg-2">
										<div class="row">
											<div class="col-12 border border-secondary" style="background-color:#dadada;">
											<h6 class="text-center" style="font-family:Serif;font-weight:bold;">EMPLOYEE NO.</h6>
											</div>
											<div class="col-12 border border-secondary text-center" id="empnumber">
											{{ $userDetails->employeeID }}
											</div>
										</div>
									</div>

									<div class="col-lg-4">
										<div class="row">
											<div class="col-12 border border-secondary" style="background-color:#dadada;">
											<h6 class="text-center" style="font-family:Serif;font-weight:bold;">NAME</h6>
												
											</div>
											<div class="col-12 border border-secondary text-center" id="empname">
											{{ $payrollDetails->employee_name }}
											</div>
										</div>
									</div>

									<div class="col-lg-2">
										<div class="row">
											<div class="col-12 border border-secondary" style="background-color:#dadada;">
											<h6 class="text-center" style="font-family:Serif;font-weight:bold;">POSITION</h6>
											</div>
											<div class="col-12 border border-secondary text-center" id="position" >
											{{ $employeeDetails->position }}
											</div>
										</div>
									</div>

									<div class="col-lg-2">
										<div class="row">
											<div class="col-12 border border-secondary" style="background-color:#dadada;">
											<h6 class="text-center" style="font-family:Serif;font-weight:bold;">PERIOD</h6>
											</div>
											<div class="col-12 border border-secondary text-center" id="period">
											{{ $payrollDetails->period }}
											</div>
										</div>
									</div>

									<div class="col-lg-2">
										<div class="row">
											<div class="col-12 border border-secondary" style="background-color:#dadada;">
												<h6 class="text-center" style="font-family:Serif;font-weight:bold;">PAY DATE</h6>
											</div>
											<div class="col-12 border border-secondary text-center" id="paydate">
											@if ($payrollDetails->cutoff == "1")
											15th of the month
											@else
											End of the month
											@endif
											</div>
										</div>
									</div>
							
											<!-- earnings -->
									<div class="col-lg-6">
										<div class="row">
											<div class="col-12 border border-secondary" style="background-color:#dadada;"><h6 class="text-center" style="font-family:Serif;font-weight:bold;">EARNINGS</h6></div>
											<div class="col-3 border border-secondary">BASIC PAY</div>  <div class="col-3 border border-secondary text-center" id="days">{{ number_format($payrollDetails->days_attendance,2,'.',',') }}</div>  <div class="col-6 border border-secondary text-center" id="basicpay">{{ number_format($payrollDetails->total_basic_salary,2,'.',',') }}</div>
											<div class="col-6 border border-secondary">ALLOWANCE</div>   <div class="col-6 border border-secondary text-center" id="allowance">{{ number_format($payrollDetails->allowance,2,'.',',') }}</div>
											<div class="col-6 border border-secondary">ADJUSTMENT</div>   <div class="col-6 border border-secondary text-center" id="adjustment">{{ number_format($payrollDetails->adjustment,2,'.',',') }}</div>
											<div class="col-6 border border-secondary">COMMISION</div>   <div class="col-6 border border-secondary text-center" id="commision">{{ number_format($payrollDetails->comsheme,2,'.',',') }}</div>
											<div class="col-6 border border-secondary">OVERTIME</div>   <div class="col-6 border border-secondary text-center" id="overtime">{{ number_format($payrollDetails->ot_pay,2,'.',',') }}</div>
											<div class="col-6 border border-secondary">LEAVE SL/VL</div>   <div class="col-6 border border-secondary text-center" id="leave">{{ number_format($payrollDetails->total_used_leave,2,'.',',') }}</div>
											<div class="col-6 border border-secondary">HOLIDAY</div>   <div class="col-6 border border-secondary text-center" id="holiday1">{{ number_format($payrollDetails->holiday1,2,'.',',') }}</div>
											<div class="col-6 border border-secondary">HOLIDAY</div>   <div class="col-6 border border-secondary text-center" id="holiday2">{{ number_format($payrollDetails->holiday2,2,'.',',') }}</div>
											<div class="col-6 border border-secondary">HOLIDAY</div>   <div class="col-6 border border-secondary text-center" id="holiday3">{{ number_format($payrollDetails->holiday3,2,'.',',') }}</div>
											<div class="col-6 border border-secondary"><i style="color:transparent;">a</i></div>  <div class="col-6 border border-secondary text-center" id="backup2"></div>
											<div class="col-6 border border-secondary"><b>TOTAL PAYMENT</b></div>   <div class="col-6 border border-secondary text-center" id="totalpayment">{{ number_format($payrollDetails->total_salary,2,'.',',') }}</div>
										</div>
									</div>
											<!-- deductions -->
									<div class="col-lg-6">
										<div class="row">
											<div class="col-12 border border-secondary" style="background-color:#dadada;"><h6 class="text-center" style="font-family:Serif;font-weight:bold;">DEDUCTIONS</h6></div>
											<div class="col-6 border border-secondary">SSS</div>  <div class="col-6 border border-secondary text-center" id="sss">{{ number_format($payrollDetails->sss,2,'.',',') }}</div>
											<div class="col-6 border border-secondary">PHILHEALTH</div>  <div class="col-6 border border-secondary text-center" id="philhealth">{{ number_format($payrollDetails->philhealth,2,'.',',') }}</div>
											<div class="col-6 border border-secondary">PAGIBIG</div>  <div class="col-6 border border-secondary text-center" id="pagibig">{{ number_format($payrollDetails->pagibig,2,'.',',') }}</div>
											<div class="col-6 border border-secondary">SSS LOAN</div>  <div class="col-6 border border-secondary text-center" id="sssloan">{{ number_format($payrollDetails->sss_loan,2,'.',',') }}</div>
											<div class="col-6 border border-secondary">PAGIBIG LOAN</div>  <div class="col-6 border border-secondary text-center" id="pagibigloan">{{ number_format($payrollDetails->hdmf_loan,2,'.',',') }}</div>
											<div class="col-6 border border-secondary">LATE</div>  <div class="col-6 border border-secondary text-center" id="late">{{ number_format($payrollDetails->late_deduction,2,'.',',') }}</div>
											<div class="col-6 border border-secondary">UNDERTIME</div>  <div class="col-6 border border-secondary text-center" id="undertime">{{ number_format($payrollDetails->ut_deduction,2,'.',',') }}</div>
											<div class="col-6 border border-secondary">CASH ADVANCE</div>  <div class="col-6 border border-secondary text-center" id="cashadvance">{{ number_format($payrollDetails->cash_advance,2,'.',',') }}</div>
											<div class="col-6 border border-secondary">OTHER DEDUCTIONS</div>  <div class="col-6 border border-secondary text-center" id="otherdeductions">{{ number_format($payrollDetails->other_deduction,2,'.',',') }}</div>
											<div class="col-6 border border-secondary"><i style="color:transparent;">a</i></div>  <div class="col-6 border border-secondary text-center" id="backup"></div>
											<div class="col-6 border border-secondary"><b>TOTAL DEDUCTIONS</b></div>  <div class="col-6 border border-secondary text-center" id="totaldeductions">{{ number_format($payrollDetails->total_deductions,2,'.',',') }}</div>
										</div>
									</div>
									<!-- netpay -->
									<div class="col-lg-12">
										<div class="row">
											<div class="col-3 border border-secondary"><b>NET PAY</b></div>
											<div class="col-9 text-center border border-secondary" style="color:red;" id="netpay">{{ number_format($payrollDetails->net_pay,2,'.',',') }}</div>
										</div>
									</div>


							</div>
							</div>
			</div>
		</div>
		</div>

		<div class="card-footer">
		<button class="btn btn-flat btn-primary" onclick="printResult('printArea')" id="print_payslip">Print</button>
		</div>
		</div>


		@else
		@endif

		@section('printpayslip')
<script>
function printResult(divId) {
    // Get the HTML of the print area
    let printContents = document.getElementById(divId).innerHTML;

    // Open a new blank window (keeps layout cleaner)
    let printWindow = window.open('', '', 'height=800,width=1000');
    printWindow.document.write('<html><head><title>Print</title>');

    // Include Bootstrap CSS for styling
    printWindow.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">');
    printWindow.document.write(`
  <style>
    @page {
      size: A4 portrait; /* or landscape */
      margin:10mm;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

     /* Make the printed content fit the A5 page area */
    .print-container {
      width: 100%;
      height: 100%;
      box-sizing: border-box;
      transform-origin: top center;
    }

	 /* Scale content down automatically if it’s too wide */
    @media print {
      html, body {
        width: 100%;
        height: 100%;
      }

      .print-container {
        transform: scale(0.5); /* Adjust if needed: 0.8–1.0 */
      }
    }

    /* Hide elements you don't want to print */
    .no-print {
      display: none;
    }
  </style>
`);
    printWindow.document.write('</head><body>');
	printWindow.document.write('<div class="print-container">');
	printWindow.document.write(printContents);
	printWindow.document.write('</div>');
    printWindow.document.write('</body></html>');

    // Wait for content to load, then print
    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
    printWindow.close();
}
</script>
@endsection

	</div>
</div>

</x-topbar>

@else

 @include('login');

@endauth


