@extends('layouts.app')
@section('title', 'Users')
 
@push('style')
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
@endpush
 
@section('content')

 <section class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active">Create users</li> 
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="container-fluid">
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                        <h3 class="text-info text-center">ekShop <small>Create New User</small></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form role="form" action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Name <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                <strong></strong>
                                                </span>
                                                @enderror 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="nav-item">
                                                <label for="phone">Phone <span class="text-danger">*</span></label>
                                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone">
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                <strong></strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="nav-item">
                                                <label for="email">Email </label>
                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="" placeholder="Enter email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                <strong></strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="password">Password </label>
                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="" placeholder="Enter password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                <strong></strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                  <div class="row">
                                    <div class="col-md-4">
                                            <div class="nav-item">
                                                <label for="employee_id">Job Status</label>
                                                <select class="nav-link @error('job_status') is-invalid @enderror" name="job_status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                                @error('job_status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                      <div class="col-md-8">
                                          <div class="nav-item">
                                              <label for="image">   Upload Logo</label>
                                              <div class="custom-file">
                                                  <input type="file" name="image" class="nav-link">
                                              </div>                       
                                          </div>
                                      </div>
                                  </div>
                                </div><br>
                                <div class="text-right">
                                    <a href="" class="btn btn-danger"><i class="fas fa-times"></i> Cancel </a>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit </button>
                                </div>
                            </form>
                        </div>
                    </div>
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
@push('script')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endpush