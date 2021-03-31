@extends('layouts.app')

@push('plugin-styles')
@endpush
@section('content')
    <title>Attendance Report | {{$monthName}}</title>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-info text-center">ekShop <small>Attendance Report</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 table-responsive">
            <div class="text-center">
                <span style="font-weight: bold; color:blueviolet;">Month: {{$monthName}}</span>
            </div>
            <table id="myTable" class="display compact nowrap table  table-bordered table-striped table-hover" width="100%">
                <thead class="text-info">
                <tr>
                    <th style="color:white;background-color:#04595B" >Name</th>
                    <?php $i = 0;
                    $color = ['E3F9FC','F2E4FB','FBF3E4','fbdecf','E9F9FA','F2E4FK','F1F3E9','fGdecJ','E8J9FC','L6E4GB'];
                    ?>
                    @foreach($date as $eachDate )
                        <th style="font-size: smaller; min-width:45px !important; color:white; background-color:#04595B"
                        >{{($date[$i++])}}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr style="font-size: smaller; background-color:<? echo  '#' . $color[rand(0,9)]; ?>;">
                        <td>{{$user->username}}</td>
                        @foreach($date as $eachDate )
                            @php
                                $lastActive = \App\Http\Controllers\AttendanceController::getLastActive($user->id, $eachDate);
                                $inTime = \App\Http\Controllers\AttendanceController::getAttendance($user->id, $eachDate);
                                $checkTime = '11:00 AM';
                            @endphp
                            <td style="text-align: center;">
                                @if (\Carbon\Carbon::parse($inTime)->gte(\Carbon\Carbon::parse($checkTime)))
                                    <span class="text-danger font-weight-bold">{{$inTime}}</span>
                                @else
                                    <span>{{$inTime}}</span>
                                @endif

                                @if(!empty($lastActive))
                                    <span style="font-size: 7px; color:darkviolet">
                                        {{$lastActive}}
                                    </span>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div><br>
    <button class="btn btn-primary" onclick="window.print()">Print this page</button>
</div>
@endsection

@push('plugin-scripts')
@endpush
@push('custom-scripts')
@endpush
