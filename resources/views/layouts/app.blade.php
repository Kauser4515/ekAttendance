<!DOCTYPE html>
<head>
  <title>ekShop Attendance</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">
  
  <link rel="shortcut icon" href="{{ asset('/fav.PNG') }}">
  <!-- plugin css -->
  <!-- Yajra -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/@mdi/font/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}">
  <!-- end plugin css -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" /> -->
  @stack('plugin-styles')

  <!-- common css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
  <!-- end common css -->

  @stack('style')

</head>
<body data-base-url="{{url('/')}}">


  <div class="container-scroller" id="app">
@if (auth()->check() && request()->route()->getName() != "")
    @include('layouts.partial.header')
    <div class="container-fluid page-body-wrapper">
      @include('layouts.partial.sidebar')
@endif
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        @if (auth()->check() && request()->route()->getName() != "")
        @include('layouts.partial.footer')
        @endif
      </div>
    </div>
  </div>

  <!-- base js -->
@push('script')

<script type="text/javascript" src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

   <script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!-- <script type="text/javascript" src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script> -->
  <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

  <!-- end base js -->
  <!-- Select2 JS -->
 
  <!-- plugin js -->
  @stack('plugin-scripts')
  <!-- end plugin js -->
    <!-- yajra -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
  </script>
  <!-- common js -->
  <script type="text/javascript" src="{{ asset('assets/js/off-canvas.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/dashboard.js') }}" ></script>
  <script type="text/javascript" src="{{ asset('assets/js/misc.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/settings.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/todolist.js') }}"></script>

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script> -->
  <!-- end common js -->

  @endpush
  @stack('custom-scripts')
  @stack('script')
</body>
</html>