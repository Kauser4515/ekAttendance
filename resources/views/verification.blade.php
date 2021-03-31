<!DOCTYPE html>
<html>
<head>
    <title>ekShop Attendance</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <script language="JavaScript" src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
    <script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"
            type="text/javascript"></script>
    <script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"
            type="text/javascript"></script>
    <script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"
            type="text/javascript"></script>
    <script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"
            type="text/javascript"></script>

    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css"/>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br>
            <h3 class="text-info text-center">EKSHOP Attendance </h3>
        </div>

    </div>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <div class="pt-5">
                <br><br><br>

                @if(session()->has('message'))
                    <div class="alert {{session('alert') ?? 'alert-info'}}">
                        {{ session('message') }}
                    </div>
                @endif

                <form action="{{url('set-attendance')}}" method="post">
                    <div class="form-group">


                        <label for="exampleInputEmail1">Name </label>
                        <input readonly value="{{session('name')}}" required="required" type="text"
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Mobile</label>
                        <input readonly value="{{session('mobile_no')}}" required="required" type="text"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter Your OTP </label>
                        <input autofocus  value="{{ old('otp') }}" name="otp" type="text"
                               class="form-control" id="exampleInputEmail1">
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                    <a href="{{url('get-in')}}" type="submit" style= "float: left" class="btn btn-secondary">Back</a>
                    <button type="submit" style= "float: right" class="btn btn-primary">Set Attendance</button>
                </form>
            </div>

        </div>
    </div>
</div>

</body>
</html>
