<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Attendance;

class ViewAttendancePanel extends Component
{

    public $activeView = null;

    public function showView($view){
        $this->activeView = $view;
    }

    


    public function render()
    {
        return view('livewire.view-attendance-panel');
    }
}
