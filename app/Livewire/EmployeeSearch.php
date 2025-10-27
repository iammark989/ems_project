<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Employeelist;

class EmployeeSearch extends Component
{

    public $query =''; //$query — stores what the user types.
    public $employees =[];
    //Fetches employees whose names start with the input letters.
    public function updatedQuery(){ // updatedQuery() — automatically runs whenever the input changes
        $this->employees = User::where('username','like',$this->query . '%')
            ->where('employeeID','!=','000')
            ->take(5)
            ->get();
    }



    public function render()
    {
        return view('livewire.employee-search');
    }
}
