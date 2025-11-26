<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Schedule;

class PayrollSettings extends Component
{
    
    public $shifts = [];
    public $selectedShift = null;
    
    public function mount(){
        $this->shifts = Schedule::orderBy('id','asc')->get();
        
    }


    public function render()
    {
        return view('livewire.payroll-settings');
    }
}
