@extends('layouts.app')

@push('plugin-styles')
  <!-- <link href="{{ asset('assets/plugins/plugin.css') }}" rel="stylesheet"> -->
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
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
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="p-4 border-bottom bg-light">
            <h4 class="card-title mb-0"></h4>
            <h3 class="text-info text-center">ekShop <small>Manage Logo Table</small></h3>
            </div>
            <div class="card-body">
                <div class="fluid-container">
                    <div id="printable_area">
                        <table class="table table-hover" id="myTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Logo alt</th>
                                <th>Logo</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="tbody">
                            @foreach($logos as $index => $logo)
                            <tr>
                                <td>{{ $logo->id }}</td>
                                <td>{{ $logo->alt}}</td>
                                <td>{{ $logo->image}}</td>
                                <td>
                                    <a href="{{ route('admin.logo.edit', $logo->id) }}" class="btn btn-sm btn-warning"><span class="mdi mdi-lead-pencil"></span></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>  
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
@endpush
@push('custom-scripts')
<script type="text/javascript" src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endpush