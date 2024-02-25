@extends('layouts.admin.e-commerce.app')

@section('title')
    @isset($vendor)
        Change Password 
    @else 
        Add Vendor
    @endisset
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" />
    <style>
        .dropify-wrapper .dropify-message p {
            font-size: initial;
        }
   </style>
@endpush

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    @isset($vendor)
                        Change Password
                    @else 
                        Add Vendor
                    @endisset
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        @isset($vendor)
                            Change Password 
                        @else 
                            Add Vendor
                        @endisset
                    </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    @if($errors->any())
        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
    @endif
    <div class="card">
        <div class="card-header">
            
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="card-title">
                        @isset($vendor)
                            Change Password
                        @else 
                            Add New Vendor
                        @endisset
                    </h3>
                </div>
                <div class="col-sm-6 text-right">
                    @isset($vendor)
                    <a href="{{routeHelper('vendor/'. $vendor->id)}}" class="btn btn-info">
                        <i class="fas fa-eye"></i>
                        Show
                    </a>
                    @endisset
                    <a href="{{routeHelper('vendor')}}" class="btn btn-danger">
                        <i class="fas fa-long-arrow-alt-left"></i>
                        Back to List
                    </a>
                </div>
            </div>
        </div>
        <form action="{{ route('admin.vendor.change_pass', ['id'=>$vendor->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @isset($vendor)
                @method('PUT')
            @endisset
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        Name: {{ $vendor->name ?? old('name') }}<br/>
                        Username: {{ $vendor->username ?? old('username') }}<br/>
                        Shop Name: {{ $vendor->shop_info->name ?? old('shop_name') }}<br/>
                        E-mail {{ $vendor->email ?? old('email') }}<br/>
                        Phone: {{ $vendor->phone ?? old('phone') }}<br/>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" placeholder="********" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password-confirm">Confirm Password:</label>
                        <input type="password" name="password_confirmation" id="password-confirm" placeholder="********" class="form-control" required>
                    </div>
                </div>
                
            </div>
            <div class="card-footer">
                <div class="form-group">
                    <button class="mt-1 btn btn-primary">
                        <i class="fas fa-arrow-circle-up"></i>
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card -->
    
</section>
<!-- /.content -->

@endsection