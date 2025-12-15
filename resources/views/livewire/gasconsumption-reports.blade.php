<div>

    <div class='container'>
        <div class='row justify-content-center'>

             <div class='row mt-3'>

                                <!-- TOTAL CONSUMPTION PER VEHICLE / CHART A -->
                                <div wire:ignore class='col-md-6 mx-auto border p-3'>
                                    <label class='label'>Select Year</label> 
                                    <select class="form-control" wire:model.live='selectedYear'>
                                        <option value='2025'>2025</option>
                                            <option value='2024'>2024</option>
                                                <option value='2023'>2023</option>
                                    </select>
                                    <div class='border mx-auto mt-2' style="height: 250px;width:auto;">
                                        <canvas id="perVehicleChart" height="auto"></canvas>
                                    </div>
                                </div>
            
                                <!-- TOTAL CONSUMPTION PER VEHICLE / CHART B -->
                                <div wire:ignore class='col-md-6 mx-auto border p-3'>
                                    <label class='label'>Select Year and Month</label> 
                                    <select  class="form-control mb-1" wire:model.live='selectedYearB'>
                                        <option value='2025'>2025</option>
                                            <option value='2024'>2024</option>
                                                <option value='2023'>2023</option>
                                    </select>
                                    <select name="month" class="form-control" wire:model.live='selectedMonthB'>
                                        @foreach (range(1, 12) as $m)
                                            <option value="{{ $m }}">
                                                {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div style="height: 250px;width:auto;">
                                        <canvas id="monthlyVehicleChart" height="auto"></canvas>
                                    </div>
                                </div>

                </div>


                <!-- TOTAL AMOUNT PER YEAR / CHART C -->
            <div class='chart col-md-6 border m-3 mx-auto' wire:ignore style="height: 250px;width:auto;">
                <canvas id="perYearChart" height="auto"></canvas>
            </div>

            <!-- TOTAL LITER PER YEAR / CHART D -->
            <div class='chart col-md-6 border m-3 mx-auto' wire:ignore style="height: 250px;width:auto;">
                <canvas id="perYearQtyChart" height="auto"></canvas>
            </div>

            

        </div>

        <div class='row justify-content-center'>
             <!-- TOTAL LITER PER YEAR AND VECHILE / CHART E -->
            <div class='chart col-md-10 border m-3 mx-auto' wire:ignore style="height: 250px;width:900px;">
                <canvas id="yearlyPerVehicleChart" height="auto"></canvas>
            </div>
        </div>

        <div class='row justify-content-center'>
             <!-- TOTAL LITER PER YEAR AND VECHILE / CHART F -->
            <div class='chart col-md-10 border m-3 mx-auto' wire:ignore style="height: 250px;width:900px;">
                <canvas id="yearlyAmountChart" height="auto"></canvas>
            </div>
        </div>
    


       
    </div>

</div>
 
 @section('rscripts')

                            <!-- CHART A -->
                            <script type="module">
                                 // YEARLY PER VEHICLE //
                                let perVehicleChart;
                                document.addEventListener('livewire:init', () => {
                                Livewire.on('update-perVehicleChart', data => {
                                //console.log('Received:', data.pervehicle);
                                let pervehicle = data.pervehicle;
                                //let perVehicle = @js($pervehicle);
                                const vehicle = pervehicle.map(item => item.VEHICLE);
                                const qty = pervehicle.map(item => item.QUANTITY);

                                const ctx = document.getElementById('perVehicleChart').getContext('2d');

                                      if(perVehicleChart){
                                    perVehicleChart.destroy();
                                }
                                perVehicleChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: vehicle,
                                        datasets: [{
                                            label: 'Total Liters Per Year',
                                            data: qty,
                                            backgroundColor: 'rgba(54, 162, 235, 0.6)',
                                            borderColor: 'rgba(54, 162, 235, 1)',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        plugins: {
                                                 datalabels: {
                                                display:false,
                                                anchor: 'end',     // position: 'end' puts it above the bar
                                                align: 'bottom',      // aligns labels to the top
                                                color: '#333',     // label text color
                                                 font: {
                                                   weight: 'bold',
                                                   size: 7
                                                },
                                                
                                                formatter: (value) => value.toLocaleString() // format numbers nicely
                                                },
                                                legend: {
                                                position: 'top'
                                                },
                                                title: {
                                                display: true,
                                                text: 'TOTAL GAS CONSUMPTION (LITER)'
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
                                                        return value.toLocaleString();
                                                    }
                                                }
                                            }
                                        }
                                    }
                                });
                                });
                                });
                            </script>


                            <!-- CHART B -->
                            <script type="module">
                                 // MONTHLY PER VEHICLE //
                                let monthlyVehicleChart;
                                document.addEventListener('livewire:init', () => {
                                Livewire.on('update-monthlyVehicleChart', data => {
                               // console.log('Received:', data.pervehicle);
                                let moPerVehicle = data.moPerVehicle;
                               // let monthlyPerVehicle = @js($moPerVehicle);
                                const vehicle = moPerVehicle.map(item => item.VEHICLE);
                                const qty = moPerVehicle.map(item => item.QUANTITY);

                                const ctx = document.getElementById('monthlyVehicleChart').getContext('2d');

                                      if(monthlyVehicleChart){
                                    monthlyVehicleChart.destroy();
                                }
                                monthlyVehicleChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: vehicle,
                                        datasets: [{
                                            label: 'Total Liters Per Year',
                                            data: qty,
                                            backgroundColor: 'rgba(54, 162, 235, 0.6)',
                                            borderColor: 'rgba(54, 162, 235, 1)',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        plugins: {
                                                 datalabels: {
                                                display:false,
                                                anchor: 'end',     // position: 'end' puts it above the bar
                                                align: 'bottom',      // aligns labels to the top
                                                color: '#333',     // label text color
                                                 font: {
                                                   weight: 'bold',
                                                   size: 7
                                                },
                                                
                                                formatter: (value) => value.toLocaleString() // format numbers nicely
                                                },
                                                legend: {
                                                position: 'top'
                                                },
                                                title: {
                                                display: true,
                                                text: 'TOTAL GAS CONSUMPTION (LITER)'
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
                                                        return value.toLocaleString();
                                                    }
                                                }
                                            }
                                        }
                                    }
                                });
                                });
                                });
                            </script>



                                <!-- CHART C -->
                            <script type="module">
                            
                                // AMOUNT PER YEAR //
                                let perYear = @js($peryearamount);
                                const year = perYear.map(item => item.YEAR);
                                const amount = perYear.map(item => item.TOTAL_AMOUNT);
                                 const tqty = perYear.map(item => item.TOTAL_QTY);

                                const ctx = document.getElementById('perYearChart').getContext('2d');
                                const perYearChart = new Chart(ctx, {
                                    type: 'bar', // bar, 'bar' + indexAxis:'y' line, pie, doughnut ,polarArea, radar, bubble, scatter
                                    data: {
                                        labels: year,
                                        datasets: [{
                                            label: 'Total Amount (₱)',
                                            data: amount,
                                            backgroundColor: 'rgba(54, 162, 235, 0.6)',
                                            borderColor: 'rgba(54, 162, 235, 1)',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        
                                        plugins: {
                                            locale:'en-PH',
                                                datalabels: {
                                                display:false,
                                                anchor: 'end',     // position: 'end' puts it above the bar
                                                align: 'bottom',      // aligns labels to the top
                                                color: '#333',     // label text color
                                                font: {
                                                    weight: 'bold',
                                                    size: 7
                                                },
                                                formatter:  (value) => value.toLocaleString() // format numbers nicely
                                                },
                                                legend: {
                                                position: 'top'
                                                },
                                                title: {
                                                display: true,
                                                text: 'TOTAL GAS CONSUMPTION (AMOUNT)'
                                                }
                                            },
                                        responsive: true,
                                        
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
                                
                                
                               <!-- CHART D -->
                                <script type="module">
                                 // QUANTITY PER YEAR //
                                let perYearQty = @js($peryearqty);
                                const yearqty = perYearQty.map(item => item.YEAR);
                                const yearlyqty = perYearQty.map(item => item.TOTAL_QTY);

                                const ctx = document.getElementById('perYearQtyChart').getContext('2d');
                                const perYearQtyChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: yearqty,
                                        datasets: [{
                                            label: 'Total Liters Per Year',
                                            data: yearlyqty,
                                            backgroundColor: 'rgba(54, 162, 235, 0.6)',
                                            borderColor: 'rgba(54, 162, 235, 1)',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        plugins: {
                                                datalabels: {
                                                display:false,
                                                anchor: 'end',     // position: 'end' puts it above the bar
                                                align: 'bottom',      // aligns labels to the top
                                                color: '#333',     // label text color
                                             font: {
                                                   weight: 'bold',
                                                   size: 7
                                                },
                                                formatter: (value) => value.toLocaleString() // format numbers nicely
                                                },
                                                legend: {
                                                position: 'top'
                                                },
                                                title: {
                                                display: true,
                                                text: 'TOTAL GAS CONSUMPTION (LITER)'
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
                                                        return value.toLocaleString();
                                                    }
                                                }
                                            }
                                        }
                                    }
                                });
                            </script>


                             <!-- CHART E -->
                             <script type="module">
                                 // YEARLY QUANTITY PER VEHICLE COMPARISON //
                                let yearlyQty = @js($yearlyVc);
                                const y2023 = yearlyQty.map(item => item.Y2023);
                                const y2024 = yearlyQty.map(item => item.Y2024);
                                const y2025 = yearlyQty.map(item => item.Y2025);
                                const vehicle = yearlyQty.map(item => item.VEHICLE);

                                const ctx = document.getElementById('yearlyPerVehicleChart').getContext('2d');
                                const perYearQtyChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: vehicle,
                                        datasets: [
                                            {
                                            label: '2023',
                                            data: y2023,
                                            backgroundColor: 'rgba(204, 245, 99, 0.8)',
                                            borderColor: 'rgba(204, 245, 99, 0.8)',
                                            borderWidth: 1
                                            },
                                            {
                                            label: '2024',
                                            data: y2024,
                                            backgroundColor: 'rgba(90, 255, 170, 0.8)',
                                            borderColor: 'rgba(90, 255, 170, 0.8)',
                                            borderWidth: 1
                                            },
                                            {
                                            label: '2025',
                                            data: y2025,
                                            backgroundColor: 'rgba(70, 160, 240, 0.8)',
                                            borderColor: 'rgba(70, 160, 240, 0.8)',
                                            borderWidth: 1
                                            },
                                    ]
                                        
                                    },
                               
                                    options: {
                                      plugins: {
                                                datalabels: {
                                                display:false,
                                                anchor: 'end',     // position: 'end' puts it above the bar
                                                align: 'bottom',      // aligns labels to the top
                                                color: '#333',     // label text color
                                                 font: {
                                                   weight: 'bold',
                                                   size: 7
                                                },
                                                
                                                formatter: (value) => value.toLocaleString() // format numbers nicely
                                                },
                                                legend: {
                                                position: 'top'
                                                },
                                                title: {
                                                display: true,
                                                text: 'TOTAL GAS CONSUMPTION (LITER)'
                                                }
                                                
                                            },

                                        responsive: true,
                                     
                                        maintainAspectRatio: false, // Important for flexible height
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                ticks: {
                                                    callback: function(value) {
                                                        return value.toLocaleString();
                                                    }
                                                }
                                            }
                                        }
                                    }
                                });
                            </script>


                                <!-- CHART F -->
                             <script type="module">
                                 // YEARLY AMOUNT PER VEHICLE COMPARISON //
                                let yearlyAmount = @js($yearlyVc);
                                const y2023 = yearlyAmount.map(item => item.A2023);
                                const y2024 = yearlyAmount.map(item => item.A2024);
                                const y2025 = yearlyAmount.map(item => item.A2025);
                                const vehicle = yearlyAmount.map(item => item.VEHICLE);

                                const ctx = document.getElementById('yearlyAmountChart').getContext('2d');
                                const perYearQtyChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: vehicle,
                                        datasets: [
                                            {
                                            label: '2023 ₱',
                                            data: y2023,
                                            backgroundColor: 'rgba(204, 245, 99, 0.8)',
                                            borderColor: 'rgba(204, 245, 99, 0.8)',
                                            borderWidth: 1
                                            },
                                            {
                                            label: '2024 ₱',
                                            data: y2024,
                                            backgroundColor: 'rgba(90, 255, 170, 0.8)',
                                            borderColor: 'rgba(90, 255, 170, 0.8)',
                                            borderWidth: 1
                                            },
                                            {
                                            label: '2025 ₱',
                                            data: y2025,
                                            backgroundColor: 'rgba(70, 160, 240, 0.8)',
                                            borderColor: 'rgba(70, 160, 240, 0.8)',
                                            borderWidth: 1
                                            },
                                    ]
                                        
                                    },
                               
                                    options: {
                                        
                                        plugins: {
                                            locale:'en-PH',
                                                datalabels: {
                                                display:false,
                                                anchor: 'end',     // position: 'end' puts it above the bar
                                                align: 'bottom',      // aligns labels to the top
                                                color: '#333',     // label text color
                                                font: {
                                                    weight: 'bold',
                                                    size: 7
                                                },
                                                formatter:  (value) => value.toLocaleString() // format numbers nicely
                                                },
                                                legend: {
                                                position: 'top'
                                                },
                                                title: {
                                                display: true,
                                                text: 'TOTAL GAS CONSUMPTION (AMOUNT)'
                                                }
                                            },
                                        responsive: true,
                                        
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
       