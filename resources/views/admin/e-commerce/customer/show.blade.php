@extends('layouts.admin.e-commerce.app')

@section('title', 'Information')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{$customer->desig!=''?'Staff':'Customer'}} Information</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active"> Details</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="card-title">
                        {{$customer->desig!=''?'Staff':'Customer'}} Details
                    </h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{routeHelper('customer/'.$customer->id.'/edit')}}" class="btn btn-info">
                        <i class="fas fa-edit"></i>
                        Edit
                    </a>
                    <a href="{{routeHelper('customer')}}" class="btn btn-danger">
                        <i class="fas fa-long-arrow-alt-left"></i>
                        Back to List
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{$customer->name}}</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>{{$customer->username}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$customer->email}}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{$customer->phone}}</td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td>{{$customer->customer_info->country}}</td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td>{{$customer->customer_info->city}}</td>
                    </tr>
                    <tr>
                        <th>Street</th>
                        <td>{{$customer->customer_info->street}}</td>
                    </tr>
                    <tr>
                        <th>Post Code</th>
                        <td>{{$customer->customer_info->post_code}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

</section>
<!-- /.content -->

@endsection