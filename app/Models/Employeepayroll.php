<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Employeepayroll extends Model
{
    public function User()
    {
    return $this->belongsTo(User::class, 'employeeID', 'employeeID');
    }
}
