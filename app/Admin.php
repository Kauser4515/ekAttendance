<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Admin extends Model
{
    use Notifiable;

    protected $guard = 'driver';

    protected $fillable = [
        'name', 'phone', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
