<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\RfidCard;
use App\Models\Attendance;
use Illuminate\Support\Str;
use App\Models\Employeelist;
use App\Models\Employeepayroll;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'userlevel',
        'status',
        'employeeID',
        'images',
    ];

    protected function images(): Attribute {
        return Attribute::make(get: function($value){
            return $value ? '/storage/images/' . $value : '/fallback-image.jpg';
        });
    }

    public function employeelist(){
        return $this->hasOne(Employeelist::class,'employeeID','employeeID');
    }
    public function employeepayroll(){
        return $this->hasMany(Employeepayroll::class,'employeeID','employeeID');
    }
    public function rfidcard(){
        return $this->hasMany(RfidCard::class,'employeeID','employeeID');
    }
    public function attendance(){
        return $this->hasMany(Attendance::class,'employeeID','employeeID');
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }
}
