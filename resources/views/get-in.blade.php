@extends('layouts.app')

@push('plugin-styles')
  <!-- <link href="{{ asset('assets/plugins/plugin.css') }}" rel="stylesheet"> -->
@endpush
@section('content')
<div class="row">
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="">Settings</a></li>
            <li class="breadcrumb-item active">Logos</li> 
        </ol>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-info text-center">ekShop <small>Attendance</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="pt-5">
                <div class="col-sm-6">
                    <div style="float: right" id="time"></div>
                </div>
                <br>

                @if(session()->has('message'))
                    <div class="alert {{session('alert') ?? 'alert-info'}}">
                        {{ session('message') }}
                    </div>
                @endif

                <form action="{{url('check-auth')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mobile number </label>
                        <input value="{{ old('mobileNo') }}" required="required" name="mobileNo" type="text"
                               class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername">PIN </label>
                        <input value="{{ old('pincode') }}" required="required" name="pincode" type="password"
                               class="form-control" id="exampleInputUsername">
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                    <button type="submit" class="btn btn-primary">Verify</button>
                </form>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    function showTime() {
        var date = new Date(),
            utc = new Date(Date.UTC(
                date.getFullYear(),
                date.getMonth(),
                date.getDate(),
                date.getHours() - 6,
                date.getMinutes(),
                date.getSeconds()
            ));

        document.getElementById('time').innerHTML = utc.toLocaleTimeString();
    }

    setInterval(showTime, 1000);
</script>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection

@push('plugin-scripts')
@endpush
@push('custom-scripts')

@endpush