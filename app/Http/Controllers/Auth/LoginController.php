<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
// use Brian2694\Toastr\Facades\Toastr;
// use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:employee')->except('logout');
    }

        public function showEmployeeLoginForm()
        {
            return view('auth.login', ['url' => 'employee']);
        }

        public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {

            if (Auth::check() && auth()->user()->user_role_id == 1) {
                // Toastr::success('Post Successfully Updated :)','Success');
                return redirect()->route('home');
            }
            elseif (Auth::check() && auth()->user()->user_role_id !== 1) {
                return redirect()->route('home');
            }
            else
            {
                 return 'You have not admin access';
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }

    }


        public function employeeLogin(Request $request)
    {
         $input = $request->all();
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
         // if (Auth()->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            // $user = Auth::guard('employee')->user();
            // $this->setSession([
            //     'id' => $user->id,
            //     'name' => $user->name,
            //     'email' => $user->email,
            //     'role' => $user->role,
            //     'guard' => 'employee'
            // ]);
            return redirect()->route('home');
            // return redirect()->intended('home');
         }
         //else{
        // // return back()->withInput($request->only('email', 'remember'));
        //      return redirect()->route('home')
        //         ->with('error','Email-Address And Password Are Wrong.');
        // }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
        private function setSession($arr){
        Session::put('user', $arr);
    }
}
