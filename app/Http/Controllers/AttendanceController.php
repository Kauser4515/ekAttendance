<?php

namespace App\Http\Controllers;

use App\Attendance;
use Illuminate\Http\Request;
use \RouterOS\Client as OsClient;
use \RouterOS\Query;
use App\Employee;
use Carbon\Carbon;
use GuzzleHttp\Client;

date_default_timezone_set('Asia/Dhaka');

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $attendances = Attendance::all();
        return view('attendance.create', compact('attendances, employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }



        public function getIn()
    {

        $allowedIpArr = [
            '123.49.48.154',
            '27.147.203.222',
            '127.0.0.1'
        ];

        if (!in_array(request()->ip(), $allowedIpArr)) {
            return view('restriced');
        }

        return view('get-in');
    }

    public function checkAuth(Request $request)
    {

//       return $request;

        if (!isset($request->mobileNo) || empty($request->mobileNo) || !isset($request->pincode) || empty($request->pincode)) {
            return back()->withInput()->with(['message' => 'Invalid Input', 'alert' => 'alert-danger']);
        }

        $auth = Employee::where('mobile_no', 'like', '%' . $request->mobileNo . '%')->first();

//        return $auth;

        if (empty($auth)) {
            return back()->withInput()->with(['message' => 'Not found', 'alert' => 'alert-danger']);
        }

        if ($auth->pincode != $request->pincode) {

            return back()->withInput()->with(['message' => 'PIN not matched', 'alert' => 'alert-danger']);
        }

        $data = Attendance::where('employee_id', $auth->id)
            ->whereDate('date', Carbon::today())->orderByDesc('id')
            ->first();


        $request->session()->put('name', $auth['name']);
        $request->session()->put('mobile_no', $auth['mobile_no']);
        $request->session()->put('id', $auth['id']);


        $otp = rand(1000, 9999);
        $request->session()->put('otp_code', $otp);

        $dataArr = [
            'date' => Carbon::today(),
            'employee_id' => $auth->id,
            'otp' => $otp
        ];

        if (empty($data)) {

            Attendance::create($dataArr);

            $msg = 'Dear ' . $auth->username . ', Attendance confirmaion code: ' . $otp . " - EKSHOP";
            $url = url('http://smsc.ekshop.world/ekshop') . '?passkey=Open1234&number=' . $request->mobileNo . '&smsText=' . $msg;
            $client = new Client();
            $promise1 = $client->getAsync($url)->then(
                function ($response) {
                    return $response->getBody();
                }, function ($exception) {
                $exception->getMessage();
            }
            );
            $promise1->wait();

            return redirect('verify-otp')->with(['message' => 'Enter OTP', 'alert' => 'alert-info']);
        } else if ($data->loggedin_at == NULL) {

            if ($data->updated_at->diffInSeconds(Carbon::now()) < 60) {
                return redirect('get-in')->withInput()->with(['message' => 'You have to wait at least 60 secons to resend OTP', 'alert' => 'alert-warning']);
            }

            Attendance::where('employee_id', $auth->id)->whereDate('date', Carbon::today())->orderByDesc('id')
                ->update([
                    'otp' => $otp
                ]);

            $msg = 'Dear ' . $auth->username . ', Attendance confirmaion code: ' . $otp . " - EKSHOP";
            $url = url('http://smsc.ekshop.world/ekshop') . '?passkey=Open1234&number=' . $request->mobileNo . '&smsText=' . $msg;
            $client = new Client();
            $promise1 = $client->getAsync($url)->then(
                function ($response) {
                    return $response->getBody();
                }, function ($exception) {
                $exception->getMessage();
            }
            );
            $promise1->wait();

            return redirect('verify-otp')->with(['message' => 'Enter OTP', 'alert' => 'alert-info']);
        } else {
            return redirect('get-in')->with(['message' => 'Attendance already recorded for today ', 'alert' => 'alert-info']);
        }

    }

    public function setAttendance(Request $request)
    {

        if (!isset($request->otp) || is_null($request->otp)) {
            return redirect('verify-otp')->withInput()->with(['message' => 'Invalid OTP', 'alert' => 'alert-danger']);
        }

        if (session('otp_code') == $request->otp) {
            Attendance::where('employee_id', session('id'))
                ->where('otp', $request->otp)
                ->orderByDesc('id')
                ->update([
                    'loggedin_at' => Carbon::now()
                ]);
            return redirect('get-in')->with(['message' => 'Attendance Saved today at ' . Carbon::now()->format('h:i:s A') . ' ', 'alert' => 'alert-info']);
        }
        return redirect('verify-otp')->withInput()->with(['message' => 'Invalid OTP', 'alert' => 'alert-danger']);


    }

    public function setAttendanceByMacId()
    {
        $client = new \RouterOS\Client([
            'host' => '123.49.48.154',
            'user' => 'ekShop',
            'pass' => 'ekShop@2021',
            'port' => 80
        ]);

        // Create "where" Query object for RouterOS
        $query = (new Query('/ip/arp/print'));

        $responses = (array)$client->query($query)->read();


        $i = 0;
        $macArr[] = '';

        foreach ($responses as $response) {

            if (sizeof($response) < 10 || $response['complete'] == "false") {
                continue;
            }

            $macArr[$i] = $response['mac-address'];

            $i++;
        }

        /*
        $macArr = [
            'D0:9C:7A:E5:87:E9',
            'F4:8C:50:EF:49:53'
        ];

        return $macArr;
        */


        $empMacObj = Employee::select('mac_address','mac_address_2', 'id', 'username', 'mobile_no')->get();


        foreach ($empMacObj as $empMac) {


            if (in_array($empMac['mac_address'], $macArr) || in_array($empMac['mac_address_2'], $macArr)) {

                $data = Attendance::where('employee_id', $empMac['id'])
                    ->whereDate('date', Carbon::today())
                    ->orderByDesc('id')
                    ->first();


                $dataArr = [
                    'date' => Carbon::today(),
                    'employee_id' => $empMac['id'],
                    'loggedin_at' => Carbon::now()
                ];

                if (empty($data)) {
                    Attendance::create($dataArr);
                    $msg = 'Dear ' . $empMac['username'] . ', Your attendance recorded at ' . Carbon::now()->format('h:i:s A') . " - EKSHOP";
                    $url = url('http://smsc.ekshop.world/ekshop') . '?passkey=Open1234&number=' . $empMac['mobile_no'] . '&smsText=' . $msg;
                    $client = new Client();
                    $promise1 = $client->getAsync($url)->then(
                        function ($response) {
                            return $response->getBody();
                        }, function ($exception) {
                        $exception->getMessage();
                    }
                    );
                    $promise1->wait();
                } else {
                    Attendance::where('employee_id', $empMac['id'])->whereNotNull('loggedin_at')->whereDate('date', Carbon::today())->orderByDesc('id')
                        ->update([
                            'loggedout_at' => Carbon::now()
                        ]);
                }

            }

        }

    }

    public function showAttendance(Request $request, $inputMonth = null)
    {
        $authStatus = null;
        if (!is_null($request->auth) && $request->auth == 'seerat') {
            $authStatus = 'authenticated';
        }

        $users = Employee::all('id', 'username');

        $input = now();
        $month = Carbon::parse($input)->format('m');

        if (!is_null($inputMonth)) {
            $month = $inputMonth;
        }

        $monthName = date('F', mktime(0, 0, 0, $month, 10)); // March
        $year = Carbon::parse($input)->format('Y');
        $start_date = "01-" . $month . "-" . $year;
        $start_time = strtotime($start_date);
        $end_time = strtotime("+1 month", $start_time);
        for ($i = $start_time; $i < $end_time; $i += 86400) {
            $date[] = date('d D', $i);
        }

        global $qDate;
        $qDate = $year . '-' . $month;

        return view('showAttendance', compact('date', 'users', 'monthName','authStatus'));
    }


    public static function getAttendance($userid, $date)
    {
        global $qDate;
        $date = substr($date, 0, 2);
        $SetOfDate = $qDate . '-' . $date;
//        return $SetOfDate;

        $check = Attendance::where('date', $SetOfDate)
            ->where('employee_id', $userid)
            ->select('loggedin_at')
            ->first();

        $input = $check['loggedin_at'];
        if (is_null($input)) {
            return '';
        }
        return Carbon::parse($input)->format('h:i A');
    }

    public static function getLastActive($userid, $date)
    {
        global $qDate;
        $date = substr($date, 0, 2);
        $SetOfDate = $qDate . '-' . $date;

        $check = Attendance::where('date', $SetOfDate)
            ->where('employee_id', $userid)
            ->select('loggedout_at')
            ->first();

        $input = $check['loggedout_at'];
        if (is_null($input)) {
            return '';
        }
        return Carbon::parse($input)->format('h:i A');
    }
}
