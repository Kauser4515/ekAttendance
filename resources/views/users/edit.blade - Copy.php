@extends('layouts.app')
@section('title', 'userEdit')
@push('style')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User Edit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                   <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active">Edit User</li> 
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Edit User Info</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <form name="user-edit-form" role="form" action="#" method="post" enctype="multipart/form-data">
                                         @csrf
                                        @method('PATCH')
                                        <div class="container">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name_english">Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $user->name }}" placeholder="Enter name">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong></strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="id"> User ID <span class="text-danger">*</span></label>
                                                    <input type="text" name="id" class="form-control @error('id') is-invalid @enderror" id="id" value="{{ $user->id }}" placeholder="Enter user id" readonly>
                                                    @error('user_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="email">Email </label>
                                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $user->email }}" placeholder="Enter email">
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="container">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="password">Password </label>
                                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="" placeholder="Enter password">
                                                </div>
                                            </div>                                
                                        </div>
                                        <div class="container">
                                        <div class="row">
                                                <div class="col-sm-6">
                                                <label for="inputEmail3" class=" col-form-label">User Role<i class="text-danger">*</i> </label>
                                                    <select class="select2 " name = "role_id">
                                                        <option value="">Please Select</option>
                                                        @foreach($user_roles as $user_role)
                                                            <option value="{{ $user_role }}" {{ $user->id == $user_role->user_id ? 'selected' : '' }}>{{ $user_role->role_id }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <a href="#" class="btn btn-danger"><i class="fas fa-times"></i> Cancel </a>
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update </button>
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
    <script type="text/javascript">
        document.forms['user-edit-form'].elements['id'].value = "{{ $user->id }}";
    </script>
   <script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush

