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
<section class="content">
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-info text-center">ekShop <small>New Logo</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <form role="form" action="{{ route('admin.logo.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name_english">Image ait<span class="text-danger">*</span></label>
                                                    <input type="text" name="name_english" class="form-control @error('name_english') is-invalid @enderror" id="name_english" placeholder="Enter name">
                                                     @error('name_english')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
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
                                                    <label for="image"> Small logo</label>
                                                    <div class="custom-file">      
                                                        <input type="file" name="image" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="image"> Logo</label>
                                                    <div class="custom-file">      
                                                        <input type="file" name="image" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="text-right">
                                        <a href="{{ route('admin.logo.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel </a>
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
</div>
@endsection

@push('plugin-scripts')
@endpush
@push('custom-scripts')
@endpush