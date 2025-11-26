<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function viewgasconsumption(){
        return view('/reportsgasconsumption');
    }
}
