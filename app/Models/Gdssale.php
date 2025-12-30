<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gdssale extends Model
{
    use HasFactory;

     protected $fillable = [
        'itemno',
        'description',
        'quantity',
        'salesamount',
        'gprofit',
        'gprofitpercent',
        'itemcode',
        'monthname',
        'fiscalyear',
        'vendorcode',
    ];
}
