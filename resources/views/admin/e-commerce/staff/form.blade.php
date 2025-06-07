@extends('layouts.admin.e-commerce.app')

@section('title')
    @isset($staff)
        Edit staff 
    @else 
        Add staff
    @endisset
@endsection


@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    @isset($staff)
                        Edit staff 
                    @else 
                        Add staff
                    @endisset
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        @isset($staff)
                            Edit staff 
                        @else 
                            Add staff
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
    <div class="card" style="background:transparent;">
        <div class="card-header">
            
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="card-title">
                        @isset($staff)
                            Edit staff
                        @else 
                            Add New staff
                        @endisset
                    </h3>
                </div>
                <div class="col-sm-6 text-right">
                   
                    <a href="{{routeHelper('staff')}}" class="btn btn-danger">
                        <i class="fas fa-long-arrow-alt-left"></i>
                        Back to List
                    </a>
                </div>
            </div>
        </div>
        <form action="{{ isset($staff) ? routeHelper('staff/'. $staff->id) : route('admin.staff.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" placeholder="Write staff name" class="form-control @error('name') is-invalid @enderror" value="{{ $staff->name ?? old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="username">Username (unique):</label>
                        <input type="text" name="username" id="username" placeholder="Write staff username" class="form-control @error('username') is-invalid @enderror" value="{{ $staff->username ?? old('username') }}" required>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" placeholder="example@gmail.com" class="form-control @error('email') is-invalid @enderror" value="{{ $staff->email ?? old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Phone:</label>
                        <input type="text" name="phone" id="phone" placeholder="write staff phone number" class="form-control @error('phone') is-invalid @enderror" value="{{ $staff->phone ?? old('phone') }}" required>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                     <div class="form-group col-md-6">
                        <label for="profile">Profile:</label>
                        <input type="file" name="profile" id="profile"  class="form-control @error('profile') is-invalid @enderror" required>
                        @error('profile')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                            <label for="method">Select Role:</label>
                            <select name="position"  class="form-control @error('method') is-invalid @enderror" required>
                                <option value="1">Admin</option>
                                <option value="2">Manager</option>
                                <option value="3">Product Manager</option>
                                <option value="4">Delivery Manager</option>
                            </select>
                            @error('method')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                  <!--   <div class="form-group col-md-6">
                        <label for="country">Country:</label>
                        <input type="text" name="country" id="country" placeholder="write staff country name" class="form-control @error('country') is-invalid @enderror" value="{{ $staff->staff_info->country ?? old('country') }}" required>
                        @error('country')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> -->
                   <!--  <div class="form-group col-md-6">
                        <label for="city">City:</label>
                        <input type="text" name="city" id="city" placeholder="write staff city name" class="form-control @error('city') is-invalid @enderror" value="{{ $staff->staff_info->city ?? old('city') }}" required>
                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> -->
                   <!--  <div class="form-group col-md-6">
                        <label for="street">Street:</label>
                        <input type="text" name="street" id="street" placeholder="write staff street" class="form-control @error('street') is-invalid @enderror" value="{{ $staff->staff_info->street ?? old('street') }}" required>
                        @error('street')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> -->
                  <!--   <div class="form-group col-md-6">
                        <label for="post_code">Post Code:</label>
                        <input type="text" name="post_code" id="post_code" placeholder="write staff post code" class="form-control @error('post_code') is-invalid @enderror" value="{{ $staff->staff_info->post_code ?? old('post_code') }}" required>
                        @error('post_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> -->
                    @isset($staff)
                    
                    @else
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
                    @endisset
                    
                </div>
                
            </div>
            <div class="card-footer">
                <div class="form-group">
                    <button class="mt-1 btn btn-primary">
                        @isset($staff)
                            <i class="fas fa-arrow-circle-up"></i>
                            Update
                        @else
                            <i class="fas fa-plus-circle"></i>
                            Submit
                        @endisset
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card -->
    

</section>
<!-- /.content -->

@endsection
