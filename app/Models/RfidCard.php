<?php

namespace App\Models;

use App\Models\User;
use App\Models\Attendance;
use App\Models\Employeelist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RfidCard extends Model
{
       use HasFactory;

    protected $fillable = [
        'employeeID',
        'rfid_data',
        'is_active',
    ];

    public function user(){
        return $this->belongsTo(User::class,'employeeID');
    }

    public function attendance(){
        return $this->hasMany(Attendance::class,'employeeID','employeeID');
    }

    public function employeelist(){
        return $this->hasMany(Employeelist::class,'employeeID','employeeID');
    }
}
