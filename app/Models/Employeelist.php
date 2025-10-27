<?php

namespace App\Models;

use App\Models\User;
use App\Models\RfidCard;
use App\Models\Attendance;
use App\Models\Employeepayroll;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employeelist extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'employeeID',
        'images',
        'first_name',
        'middle_name',
        'last_name',
        'position',
        'date_hired',
        'daily_rate',
        'allowance',
        'leave_bal_VL',
        'leave_bal_SIL',
        'sss',
        'pagibig',
        'philhealth',
    ];

    protected function images(): Attribute {
        return Attribute::make(get: function($value){
            return $value ? '/storage/images/' . $value : '/fallback-image.jpg';
        });
    }
    
    public function user(){
        return $this->belongsTo(User::class,'employeeID');
    }

    public function rfidcard(){
        return $this->hasMany(RfidCard::class,'employeeID','employeeID');
    }

    public function attendance(){
        return $this->hasMany(Attendance::class,'employeeID','employeeID');
    }

}
