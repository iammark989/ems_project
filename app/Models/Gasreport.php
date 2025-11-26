<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gasreport extends Model
{
    use HasFactory;

     protected $fillable = [
        'transdate',
        'transnumber',
        'ponumber',
        'vehicle',
        'product',
        'quantity',
        'price',
        'totalamount',
        'driver',
        'destination',
        'company',
    ];
}
