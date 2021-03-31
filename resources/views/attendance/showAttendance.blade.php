<!DOCTYPE html>
<html>
<head>
    <title>Attendance Report | {{$monthName}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Bootstrap-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <!--Jquery-->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>         
    <!--Datatables bootstrap-->
    <script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"
            type="text/javascript"></script>         
    <script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"
            type="text/javascript"></script>      
    <script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"
            type="text/javascript"></script>       
    <script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"
            type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css"/>
    <!-- Datatables buttons -->
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://datatables.net/media/css/site-examples.css">
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
</head>
<body>

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
    </div>
</div>

<script>
    var auth = <?php echo json_encode($authStatus); ?>;

    if (auth !== null) {
        $('#myTable').DataTable({
            "lengthChange": true,
            "pageLength": 50,
            "dom": 'Bfrtip',
            "scrollX": true,
            "scrollY": "400px",
            "scrollCollapse": true,
            "buttons": [
                'excel'
            ]
        });
    } else {
        $('#myTable').DataTable({
            "lengthChange": true,
            "pageLength": 50,
            "scrollX": true,
            "scrollY": "400px",
            "scrollCollapse": true,
        });
    }

</script>

</body>

</html>
