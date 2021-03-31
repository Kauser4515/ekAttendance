@extends('layouts.app')

@push('plugin-styles')
  <!-- <link href="{{ asset('assets/plugins/plugin.css') }}" rel="stylesheet"> -->
@endpush
@section('content')

<div class="row">
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="">Users</a></li>
            <li class="breadcrumb-item active">All Users</li> 
        </ol>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="p-4 border-bottom bg-light">
            <h4 class="card-title mb-0">Manage User Table</h4>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                <div class="col-md-6 table-responsive p-0">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th>Alt</th>
                        <td>{{ $logo->alt }}</td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td>{{ $logo->image }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $logo->mainImage }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                    <tr>
                        <th>Actions</th>
                        <td>
                            <a href="{{ route('admin.logo.edit', $logo->id) }}" class="btn btn-sm btn-warning"><i class="mdi mdi-lead-pencil"></i></a>
                        </td>
                    </tr>
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
@endpush