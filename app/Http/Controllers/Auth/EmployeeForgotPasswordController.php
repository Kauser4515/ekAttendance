<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;

class EmployeeForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:employee');
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.employee_email');
    }

    protected function broker() {
        return Password::broker('employees');
    }

    public function showResetForm(){
        return view('auth.passwords.employee_reset');
    }
}
