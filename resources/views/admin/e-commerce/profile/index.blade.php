@extends('layouts.admin.e-commerce.app')

@section('title', 'Your Information')

@push('css')
    <style>
        .contact-title {
            display: inline-block;
            padding-bottom: 9px;
            width: 170px;
            font-size: 14px;
            color: #868e96;
        }
    </style>
@endpush

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>My Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">My Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card" style="background:transparent;">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="card-title">My Profile</h3>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">

                    <div class="card" style="background:transparent;">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="card-title">Your Information</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="user-profile">
                                <div class="row">
                
                                    <div class="col-lg-12">
                
                                        <h4 class="card-title">Image information</h4>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="user-photo m-b-30">
                                                    <img src="{{Auth::user()->avatar != 'default.png' ? '/uploads/admin/'.Auth::user()->avatar:'/default/user.jpg'}}" class="img-fluid" width="250px" alt="User Image">
                                                </div>
                                            </div>
                                            @if(auth()->user()->desig==1)
                                            <div class="col-md-4">
                                                <div class="user-photo m-b-30">
                                                    <img src="{{'/uploads/shop/profile/'.Auth::user()->shop_info->profile}}" class="img-fluid" alt="User Image" class="img-fluid" width="250px">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="user-photo m-b-30">
                                                    <img src="{{'/uploads/shop/cover/'.Auth::user()->shop_info->cover_photo}}" class="img-fluid" alt="User Image" class="img-fluid" width="250px">
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        

                                        <h4 class="card-title">Basic information</h4>
                                        <br>
                                        <div class="mb-1">
                                            <span class="contact-title">Username:</span>
                                            <span>{{Auth::user()->username}}</span>
                                        </div>
                                        <div class="">
                                            <span class="contact-title">Name:</span>
                                            <span>{{Auth::user()->name}}</span>
                                        </div>
                                        <div class="">
                                            <span class="contact-title">Phone:</span>
                                            <span>{{Auth::user()->phone}}</span>
                                        </div>
                                        <div class="">
                                            <span class="contact-title">Email:</span>
                                            <span>{{Auth::user()->email}}</span>
                                        </div>
                                        <div class="">
                                            <span class="contact-title">Status:</span>
                                            @if (Auth::user()->status)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Disable</span>
                                            @endif
                                        </div>
 @if(auth()->user()->desig==1)
                                        <h4 class="card-title">Shop information</h4>
                                        <br>
                                        <div class="mb-1">
                                            <span class="contact-title">Shop Name:</span>
                                            <span>{{Auth::user()->shop_info->name}}</span>
                                        </div>
                                        <div class="mb-1">
                                            <span class="contact-title">Shop URL:</span>
                                            <span>{{Auth::user()->shop_info->url}}</span>
                                        </div>
                                        <div class="mb-1">
                                            <span class="contact-title">Bank Account:</span>
                                            <span>{{Auth::user()->shop_info->bank_account}}</span>
                                        </div>
                                        <div class="mb-1">
                                            <span class="contact-title">Bank Name:</span>
                                            <span>{{Auth::user()->shop_info->bank_name}}</span>
                                        </div>
                                        <div class="mb-1">
                                            <span class="contact-title">Holder Name:</span>
                                            <span>{{Auth::user()->shop_info->holder_name}}</span>
                                        </div>
                                        <div class="mb-1">
                                            <span class="contact-title">Branch Name:</span>
                                            <span>{{Auth::user()->shop_info->branch_name}}</span>
                                        </div>
                                        <div class="mb-1">
                                            <span class="contact-title">Routing:</span>
                                            <span>{{Auth::user()->shop_info->routing}}</span>
                                        </div>
@endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                <a href="{{routeHelper('profile/update')}}" class="mt-1 btn btn-primary">
                                    
                                    <i class="fas fa-arrow-circle-up"></i>
                                    Update
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

@endsection
