<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SalesAnalysis extends Component
{

        public $y2023Sales = '';
        public $y2024Sales = '';
        public $y2025Sales = '';

        public $resulta = [];


        public function mount(){
            $this->y2023Sales = DB::table('gdssales')
                                ->where('fiscalyear','2023')
                                ->sum('salesamount');

             $this->y2024Sales = DB::table('gdssales')
                                ->where('fiscalyear','2024')
                                ->sum('salesamount');
            
             $this->y2025Sales = DB::table('gdssales')
                                ->where('fiscalyear','2025')
                                ->sum('salesamount');

            $this->a();

        }

        public function a(){

        }



    public function render()
    {
        return view('livewire.sales-analysis');
    }
}
