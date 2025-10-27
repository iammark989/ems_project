<?php

namespace App\Models;

use App\Models\User;
use App\Models\RfidCard;
use App\Models\Employeelist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{

    use HasFactory;
    
    protected $table = 'attendance';

    protected $fillable = [
        'employeeID',
        'date',
        'clockRecord',
        'stat',
        'remarks',
    ];

    public function user(){
        return $this->belongsTo(User::class,'employeeID');
    }

    public function RfidCard(){
        return $this->hasMany(RfidCard::class,'employeeID','employeeID');
    }

    public function employeelist(){
        return $this->hasMany(Employeelist::class,'employeeID','employeeID');
    }

}
