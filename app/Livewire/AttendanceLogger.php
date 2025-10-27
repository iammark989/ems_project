<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RfidCard;

class AttendanceLogger extends Component
{
  

    public $rfid = '';
   public $result = '';
   public $toastMessage = null;
    public $toastType = null;
    
    public function checkUser($rfid){
        $userCheck = RfidCard::where('rfid_data',$rfid)->first();
        if(!$userCheck){
            $this->result = 'show';
           $this->toastMessage = 'RFID not found!';
        $this->toastType = 'danger';
            
        }else{
            $this->result = 'hide';
            $this->toastMessage = 'Record successfully updated!';
        $this->toastType = 'success';
        }
        $this->rfid = '';
          $this->dispatch('focus-rfid'); // ✅ Livewire v3 way

        
    }
    public function clearToast()
{
    $this->toastMessage = null;
    $this->toastType = null;
}



public function updatedRfid($rfid)
{
    $this->checkUser($rfid);
}


  public function render()
    {
        return view('livewire.attendance-logger');
    }
}
