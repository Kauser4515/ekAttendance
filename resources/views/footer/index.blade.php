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
            <li class="breadcrumb-item active">Footer</li> 
        </ol>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="p-4 border-bottom bg-light">
            <h4 class="card-title mb-0">Manage Footer Table</h4>
            </div>
            <div class="card-body">
                <div class="fluid-container">
                    <div id="printable_area">
                        <table class="table table-hover" id="myTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Footer Name</th>
                                <th>Footer Image</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="tbody">
                            @foreach($footers as $index => $footer)
                            <tr>
                                <td>{{ $footer->id }}</td>
                                <td>{{ $footer->name}}</td>
                                <td>{{ $footer->image}}</td>
                                <td>
                                    <a href="{{ route('admin.footer.edit', $footer->id) }}" class="btn btn-sm btn-warning"><span class="mdi mdi-lead-pencil"></span></a>
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