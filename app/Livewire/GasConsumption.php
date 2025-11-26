<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class GasConsumption extends Component
{

    public $plates = [];
    public $drivers = [];
    public $destinations = [];

    public function mount(){
        $this->plates = DB::table('platenumbers')
                        ->select('id','plate_number')
                        ->get();
        
        $this->drivers = DB::table('drivers')
                        ->select('id','driver')
                        ->get();

        $this->destinations = DB::table('destinations')
                        ->select('id','destination')
                        ->get();

    }

    public $transdate = '';
    public $transnumber = '';
    public $ponumber = '';
    public $vehicle = '';
    public $product = '';
    public $gasqty = '';
    public $gasprice = '';
    public $gastotalamount = '';
    public $driver = '';
    public $destination = '';
    public $company = '';

    public $addRows = [];

    public function sample(){
        $this->addRows = ['transdate' => '','transnumber' => '','ponumber' => '','vehicle' => '','product' => '',
                    'gasqty' => '','gasprice' => '','gastotalamount' => '','driver' => '','destination' => '','company' => '',
                    ];
    }



    public function render()
    {
        return view('livewire.gas-consumption');
    }
}
