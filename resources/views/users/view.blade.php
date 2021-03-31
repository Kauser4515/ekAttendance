@extends('layouts.app')

@push('plugin-styles')
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
                        <h3 class="text-info text-center">ekShop <small>Manage User Table</small></h3>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                <div class="col-md-6 table-responsive p-0">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th>Id</th>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $user->address}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($user->status == 1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Block</span>
                    @endif
                        </td>
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
                            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-warning"><i class="mdi mdi-lead-pencil"></i></a>
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