<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class GasconsumptionReports extends Component
{
    
    public $peryearamount = [];
    public $peryearqty = [];
    public $yearlyVc = []; // yearly vehicle consumption qty
    public $pervehicle = [];
    public $moPerVehicle = [];

    public $selectedMonthB = ''; //per month and year vehicle
    public $selectedYearB = ''; //per month and year vehicle


    public $selectedYear = '';
 

    public function mount(){

        $this->peryearamount = DB::table('gasreports')
                        ->select(
                            DB::raw('YEAR(transdate) as YEAR'),
                            DB::raw('SUM(totalamount) as TOTAL_AMOUNT'),
                             DB::raw('SUM(quantity) AS TOTAL_QTY')
                        )
                        ->WHERE('product','DIESEL')
                        ->groupBy('YEAR')
                        ->orderBy('YEAR')
                        ->get();
        
        $this->peryearqty = DB::table('gasreports')
                            ->select(
                                DB::raw('YEAR(transdate) as YEAR'),
                                DB::raw('SUM(quantity) AS TOTAL_QTY')
                            )
                        ->WHERE('product','DIESEL')
                        ->groupBy('YEAR')
                        ->orderBy('YEAR')
                        ->get();
        
                        // yearly vehicle consumption qty
         $this->yearlyVc = DB::table('gasreports')
                            ->select(
                                DB::raw('SUM(CASE WHEN YEAR(transdate)=2023 THEN quantity END) AS Y2023'),
                                DB::raw('SUM(CASE WHEN YEAR(transdate)=2024 THEN quantity END) AS Y2024'),
                                DB::raw('SUM(CASE WHEN YEAR(transdate)=2025 THEN quantity END) AS Y2025'),
                                DB::raw('SUM(CASE WHEN YEAR(transdate)=2023 THEN totalamount END) AS A2023'),
                                DB::raw('SUM(CASE WHEN YEAR(transdate)=2024 THEN totalamount END) AS A2024'),
                                DB::raw('SUM(CASE WHEN YEAR(transdate)=2025 THEN totalamount END) AS A2025'),
                                DB::raw('vehicle AS VEHICLE')
                            )
                        ->WHERE('product','DIESEL')
                        ->groupBy('VEHICLE')
                        ->get();
        



           // default year              
        $this->selectedYear = date('Y');
        // load data for the default year
        $this->loadPerDriverData();

        
        //per month and year vehicle
        $this->selectedMonthB = date('m');
        $this->selectedYearB = date('Y');

        $this->loadPerMonthYearVehicle();

    }

    public function updatedSelectedYear(){
         // when dropdown changes, reload data
       
        $this->loadPerDriverData();
        
         
    }


    public function loadPerDriverData(){
        $this->pervehicle = DB::table('gasreports')
                        ->select(
                            DB::raw('vehicle as VEHICLE'),
                            DB::raw('sum(quantity) as QUANTITY'),
                            DB::raw('YEAR(transdate) as FISCALYEAR')
                        )
                        ->WHERE('product','DIESEL')
                        ->whereYear('transdate', $this->selectedYear)
                        ->groupBy('VEHICLE')
                        ->groupBy('FISCALYEAR')
                        ->get();
                         // Tell JS to update the chart
   $this->dispatch('update-perVehicleChart', pervehicle: $this->pervehicle);
    }

    public function loadPerMonthYearVehicle(){
        $this->moPerVehicle = DB::table('gasreports')
                            ->select(
                                DB::raw('vehicle AS VEHICLE'),
                                DB::raw('SUM(quantity) AS QUANTITY') 
                                )
                            ->where(DB::raw('YEAR(transdate)'),$this->selectedYearB)
                            ->where(DB::raw('MONTH(transdate)'),$this->selectedMonthB)
                            ->groupBy('VEHICLE')
                            ->get();
                             // Tell JS to update the chart
   $this->dispatch('update-monthlyVehicleChart', moPerVehicle: $this->moPerVehicle);
    }

    public function updatedselectedYearB(){
        $this->loadPerMonthYearVehicle();
    }
    public function updatedselectedMonthB(){
        $this->loadPerMonthYearVehicle();
    }




    public function render()
    {
        return view('livewire.gasconsumption-reports');
    }
}
