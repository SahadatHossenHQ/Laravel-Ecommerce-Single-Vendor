@extends('layouts.vendor.app')

@section('title', 'Change Password')

@push('css')
    
@endpush

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Change Password</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Change Password</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Change Password</h3>
        
                </div>
                
                <form action="{{ routeHelper('profile/password/update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="current_password" class="">Current Password:</label>
                            <input type="password" name="current_password" id="current_password" placeholder="Current Password" class="form-control @error('current_password') is-invalid @enderror">
                            @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="password" class="">New Password:</label>
                            <input type="password" name="password" id="password" placeholder="New Password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="password_confirmation" class="">Confirm Password:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="form-control"> 
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="form-group">
                            <button class="mt-1 btn btn-primary">
                                <i class="fas fa-arrow-circle-up"></i>
                                Change Password
                            </button>
                        </div>
                    </div>
                    <!-- /.card-footer-->
                </form>
                
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- Default box -->

</section>
<!-- /.content -->

@endsection

@push('js')
    
@endpush