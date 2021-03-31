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

                    <div class="alert alert-warning">
                        Attendance can only be given from office premises
                    </div>


                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mobile number </label>
                        <input readonly value="{{ old('mobileNo') }}" required="required" name="mobileNo" type="text"
                               class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername">PIN </label>
                        <input readonly value="{{ old('pincode') }}" required="required" name="pincode" type="password"
                               class="form-control" id="exampleInputUsername">
                    </div>

{{--                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>--}}

                    <button disabled type="submit" class="btn btn-primary">Verify</button>
                </form>
            </div>

        </div>
    </div>
</div>

</body>
</html>
