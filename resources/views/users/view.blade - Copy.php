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
                        <th>Id</th>
                        <td>{{ $employee->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $employee->name_english }}</td>
                    </tr>
                    <tr> 
                        <th>Name (বাংলা)</th>
                        <td>{{ $employee->name_bangla }}</td>
                    </tr>   
                    <tr>
                        <th>Father / Husband</th>
                        <td>{{ $employee->father_husband}}</td>
                    </tr>
                    <tr>
                        <th>Employee ID</th>
                        <td>{{ $employee->employee_id}}</td>
                    </tr>
                    <tr>
                        <th>Birth Date</th>
                        <td>{{ $employee->dob}}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>
                            {{ $employee->gender }}
                        </td>
                    </tr> 
                    <tr>
                        <th>Designation</th>
                        <td>
                            @foreach($designations as $designation)
                            <?php 
                            if($employee->designation_id == $designation->designation_id){

                                echo $designation->designation_name ;
                            }
                        ?>
                        @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $employee->phone}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $employee->email }}</td>
                    </tr>
                    <tr>
                        <th>NID</th>
                        <td>{{ $employee->nid}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $employee->address}}, {{ $employee->address1}}</td>
                    </tr>
                    <tr>
                        <th>Qualifications</th>
                        <td>{{ $employee->qualifications}}</td> 
                    </tr>
                    <tr>
                        <th>Join_date</th>
                        <td>{{ $employee->join_date}}
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($employee->status == 1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Block</span>
                    @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Job Status</th>
                        <td>
                            @if($employee->job_status == 1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Block</span>
                    @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Details</th>
                        <td>{{ $employee->details }}</td>
                    </tr>
                    <tr>
                        <th>Created By</th>
                        <td>{{ $employee->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $employee->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $employee->updated_at }}</td>
                    </tr>
                    <tr>
                        <th>Actions</th>
                        <td>
                            <a href="{{ route('admin.hrm.employees.edit', $employee->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
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