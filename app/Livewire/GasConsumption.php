<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Gasreport;
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
    public $quantity = '';
    public $price = '';
    public $totalamount = '';
    public $driver = '';
    public $destination = '';
    public $company = '';

    public $toastType = '';

    public $toastMessage='';

    public $incomingFields = [];

    public function save(){
        if(($this->quantity == '' && $this->price =='')){

        }else{
            $this->totalamount = $this->quantity * $this->price;
        }
        $this->validate([
            'transdate' => 'required',
             'transnumber' => 'required',
              'ponumber' => 'required',
               'vehicle' => 'required',
                'product' => 'required',
                 'quantity' => 'required',
                  'price' => 'required',
                   'totalamount' => 'required',
                    'driver' => 'required',
                    'destination' => 'required',
                    'company' => 'required'
        ]);

        $this->incomingFields = ['transdate' => $this->transdate,
             'transnumber' => $this->transnumber,
              'ponumber' => $this->ponumber,
               'vehicle' => $this->vehicle,
                'product' => $this->product,
                 'quantity' => $this->quantity,
                  'price' => $this->price,
                   'totalamount' => $this->totalamount,
                    'driver' => $this->driver,
                    'destination' => $this->destination,
                    'company' => $this->company
                ];
        
        Gasreport::create($this->incomingFields);
   
        $this->dispatch('success'); // call js on livewire
        $this->reset(); // clear public input on livewire
       
    }



    public function render()
    {
        return view('livewire.gas-consumption');
    }
}
