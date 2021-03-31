<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\EmployeeResetPasswordNotification;

class Employee extends Authenticatable
{

    use Notifiable;

    protected $guard = 'employee';

    protected $fillable = [
        'id', 'name', 'username', 'mobile_no', 'email', 'pincode', 'mac_address',
    ];
}
