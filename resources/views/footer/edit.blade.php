@extends('layouts.app')

@push('plugin-styles')
  <!-- <link href="{{ asset('assets/plugins/plugin.css') }}" rel="stylesheet"> -->
@endpush
@section('content')

<section class="content">
<div class="row">
  <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="">Settings</a></li>
            <li class="breadcrumb-item active">Create Footer</li> 
        </ol>
  </div>
<div class="container-fluid">
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0">Footer</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form role="form" action="{{ route('admin.footer.update', $footer->id) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                @method('PATCH')
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Footer Name <span class="text-danger">*</span></label>
                                                <input type="text" name="name" value="{{ $footer->name }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name">
                                                 @error('name')
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
                                                  <label for="image">Upload Photo  </label>
                                                  <div class="custom-file">
                                                      <input type="file" name="image" class="">
                                                  </div>                       
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                <div class="text-right">
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
</div>
</section>
@endsection
@push('plugin-scripts')
@endpush
@push('custom-scripts')
@endpush