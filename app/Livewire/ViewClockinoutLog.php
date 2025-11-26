<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Attendance;

class ViewClockinoutLog extends Component
{
    
public $datefrom;
public $dateto;
public $results = [];

    public function viewResult(){
            $this->results = Attendance::with('user')->whereBetween('recordDate',[$this->datefrom,$this->dateto])->get();
        }
    
    public function render()
    {
        return view('livewire.view-clockinout-log');
    }
}
