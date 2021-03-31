<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'employee_id',
        'date',
        'loggedin_at',
        'loggedout_at',
        'otp'
    ];
}
