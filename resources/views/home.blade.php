



   @auth
   <x-main>
        @if(auth()->user()->userlevel == "1")
        <div class='container-fluid' style='border:2px solid;background-color:white;width:100%;height:150px;'>
                <div>
                        <div>
                            <span>GARBES DIZON SUPERMARKET EMPLOYEE MANAGEMENT SYSTEM</span>
                        </div>
                </div>
        </div>
        @elseif (auth()->user()->userlevel == "2")
         <div class='container-fluid' style='border:2px solid;background-color:white;width:100%;height:150px;'>
                <div>
                        <div>
                            <span>LEVEL 2</span>
                        </div>
                </div>
        </div>
        @elseif (auth()->user()->userlevel == "3")
         <div class='container-fluid' style='border:2px solid;background-color:white;width:100%;height:150px;'>
                <div>
                        <div>
                            <span>LEVEL 3</span>
                        </div>
                </div>
        </div>

        <!--  ADMIN -->
        @elseif (auth()->user()->userlevel == "4")
        <div class='container-fluid'>
        
            <div class="container">
                <div class='row'>
                    <div class='col-lg-12'>
                                <div class='col-md-6 border p-1'>
                                <h2>Employee Salary Dashboard</h2>
                                <p>Total Net Pay Salary for Year 
                                    <strong>{{$currentYear}}</strong>
                                </p>

                                <div class="chart-container shadow rounded bg-light p-4">
                                <canvas id="salaryChart" height="auto"></canvas>
                                </div>
                                </div>
                    </div>
                </div>
            </div>


        @section('scripts')
                            <script type="module">
                                const month = @json($theMonth);
                                const netpay = @json($theNetpay);

                                const ctx = document.getElementById('salaryChart').getContext('2d');
                                const salaryChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: month,
                                        datasets: [{
                                            label: 'Total Salary (₱)',
                                            data: netpay,
                                            backgroundColor: 'rgba(54, 162, 235, 0.6)',
                                            borderColor: 'rgba(54, 162, 235, 1)',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        plugins: {
                                                datalabels: {
                                                anchor: 'end',     // position: 'end' puts it above the bar
                                                align: 'top',      // aligns labels to the top
                                                color: '#333',     // label text color
                                                font: {
                                                    weight: 'bold',
                                                    size: 8
                                                },
                                                formatter: (value) => value.toLocaleString() // format numbers nicely
                                                },
                                                legend: {
                                                position: 'top'
                                                },
                                                title: {
                                                display: true,
                                                text: 'Employee Salary Overview'
                                                }
                                            },
                                        responsive: true,
                                        locale:'en-PH',
                                        maintainAspectRatio: false, // Important for flexible height
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                ticks: {
                                                    callback: function(value) {
                                                        return '₱' + value.toLocaleString();
                                                    }
                                                }
                                            }
                                        }
                                    }
                                });
                            </script>
        @endsection
                                    
        </div>
        @endif
</x-main>
  


@else
  
  @include('login');
     
   @endauth
    
