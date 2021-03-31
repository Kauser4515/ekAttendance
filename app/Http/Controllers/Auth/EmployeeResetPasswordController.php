<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Password;
use Auth;

class EmployeeResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/employee';

    public function __construct()
    {
        $this->middleware('guest:employee');
    }

    public function showResetForm(Request $request, $token = null) {
        return view('auth.passwords.employee_reset')
            ->with(['token' => $token, 'email' => $request->email]
            );
    }

    //defining which guard to use in our case, it's the employee guard
    protected function guard()
    {
        return Auth::guard('employee');
    }

    //defining our password broker function
    protected function broker() {
        return Password::broker('employees');
    }
}
