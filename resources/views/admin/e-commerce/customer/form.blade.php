@extends('layouts.admin.e-commerce.app')

@section('title')
    @isset($customer)
        Edit Customer 
    @else 
        Add Customer
    @endisset
@endsection


@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    @isset($customer)
                        Edit Customer 
                    @else 
                        Add Customer
                    @endisset
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        @isset($customer)
                            Edit Customer 
                        @else 
                            Add Customer
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
                        @isset($customer)
                            Edit customer
                        @else 
                            Add New customer
                        @endisset
                    </h3>
                </div>
                <div class="col-sm-6 text-right">
                    @isset($product)
                    <a href="{{routeHelper('customer/'. $product->id)}}" class="btn btn-info">
                        <i class="fas fa-eye"></i>
                        Show
                    </a>
                    @endisset
                    <a href="{{routeHelper('customer')}}" class="btn btn-danger">
                        <i class="fas fa-long-arrow-alt-left"></i>
                        Back to List
                    </a>
                </div>
            </div>
        </div>
        <form action="{{ isset($customer) ? routeHelper('customer/'. $customer->id) : routeHelper('customer') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @isset($customer)
                @method('PUT')
            @endisset
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" placeholder="Write customer name" class="form-control @error('name') is-invalid @enderror" value="{{ $customer->name ?? old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="username">Username (unique):</label>
                        <input type="text" name="username" id="username" placeholder="Write customer username" class="form-control @error('username') is-invalid @enderror" value="{{ $customer->username ?? old('username') }}" required>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" placeholder="example@gmail.com" class="form-control @error('email') is-invalid @enderror" value="{{ $customer->email ?? old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                   <?php
                        $number='';
                        if(isset($customer)){
                            if($customer->phone!='null'){
                                $number=$customer->phone;
                            }
                        }
                   ?>
                    <div class="form-group col-md-6">
                        <label for="phone">Phone:</label>
                        <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"  value="{{$number}}"  placeholder="Enter Your Phone Number"   required>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="country">Country:</label>
                        <input type="text" name="country" id="country" placeholder="write customer country name" class="form-control @error('country') is-invalid @enderror" value="{{ $customer->customer_info->country ?? old('country') }}" required>
                        @error('country')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="city">City:</label>
                        <input type="text" name="city" id="city" placeholder="write customer city name" class="form-control @error('city') is-invalid @enderror" value="{{ $customer->customer_info->city ?? old('city') }}" required>
                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="street">Street:</label>
                        <input type="text" name="street" id="street" placeholder="write customer street" class="form-control @error('street') is-invalid @enderror" value="{{ $customer->customer_info->street ?? old('street') }}" required>
                        @error('street')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="post_code">Post Code:</label>
                        <input type="text" name="post_code" id="post_code" placeholder="write customer post code" class="form-control @error('post_code') is-invalid @enderror" value="{{ $customer->customer_info->post_code ?? old('post_code') }}" required>
                        @error('post_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @isset($customer)
                    
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
                        @isset($customer)
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
