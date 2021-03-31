<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
	Route::get('/', "Auth\LoginController@showLoginForm");
	Auth::routes();
	Route::get('/login/employee', 'Auth\LoginController@showEmployeeLoginForm')->name('login.employee');
	Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
	// Route::get('getIn', 'AttendanceController@getIn')->name('getIn');
	// Route::get('report/{month?}', 'AttendanceController@showAttendance')->name('attendance.report');
	// Route::post('check-auth', 'AttendanceController@checkAuth')->name('check-auth');
	// Route::post('set-attendance', 'AttendanceController@setAttendance');
	// Route::get('mac-alive', 'AttendanceController@setAttendanceByMacId');
Route::group(['prefix'=>'admin', 'as' => 'admin.'], function()
{ 
    Route::resource('user', 'UserController');
    Route::resource('payment', 'PaymentController');
    Route::resource('logo', 'LogoController');
    Route::resource('footer', 'FooterController');
	Route::get('getin', 'AttendanceController@getIn')->name('attendance');
	Route::get('report/{month?}', 'AttendanceController@showAttendance')->name('attendance.report');
	Route::post('check-auth', 'AttendanceController@checkAuth')->name('check-auth');
	Route::post('set-attendance', 'AttendanceController@setAttendance');
	Route::get('mac-alive', 'AttendanceController@setAttendanceByMacId');
});
Route::post('/login/employee', 'Auth\LoginController@employeeLogin');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
