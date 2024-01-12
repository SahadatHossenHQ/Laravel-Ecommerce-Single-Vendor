@extends('layouts.admin.e-commerce.app')

@section('title', 'Vendor Information')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Vendor Information</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Vendor Product</li>
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
                        Vendor Details
                    </h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{routeHelper('vendor/'.$vendor->id.'/edit')}}" class="btn btn-info">
                        <i class="fas fa-edit"></i>
                        Edit
                    </a>
                    <a href="{{routeHelper('vendor')}}" class="btn btn-danger">
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
                        <td>{{$vendor->name}}</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>{{$vendor->username}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$vendor->email}}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{$vendor->phone}}</td>
                    </tr>
                    
                    <tr>
                        <th>Shop Name</th>
                        <td>{{$vendor->shop_info->name}}</td>
                    </tr>
                    <tr>
                        <th>Shop Address</th>
                        <td>{{$vendor->shop_info->address}}</td>
                    </tr>
                    <tr>
                        <th>Shop Url</th>
                        <td>{{$vendor->shop_info->url}}</td>
                    </tr>
                    <tr>
                        <th>Bank Account</th>
                        <td>{{$vendor->shop_info->bank_account}}</td>
                    </tr>
                    <tr>
                        <th>Bank Name</th>
                        <td>{{$vendor->shop_info->bank_name}}</td>
                    </tr>
                    <tr>
                        <th>Holder Name</th>
                        <td>{{$vendor->shop_info->holder_name}}</td>
                    </tr>
                    <tr>
                        <th>Branch Name</th>
                        <td>{{$vendor->shop_info->branch_name}}</td>
                    </tr>
                    <tr>
                        <th>Routing</th>
                        <td>{{$vendor->shop_info->routing}}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{$vendor->shop_info->description}}</td>
                    </tr>
                    <tr>
                        <th>Profile</th>
                        <td>
                            <img src="/uploads/shop/profile/{{$vendor->shop_info->profile}}" alt="Profile" width="100px">
                        </td>
                    </tr>
                    <tr>
                        <th>Cover Photo</th>
                        <td>
                            <img src="/uploads/shop/cover/{{$vendor->shop_info->cover_photo}}" alt="Profile" width="100px">
                        </td>
                    </tr>
                    <tr>
                        <th>Nid Photo</th>
                        <td>
                            <img src="/uploads/shop/nid/{{$vendor->shop_info->nid}}" alt="Profile" width="100px">
                        </td>
                    </tr>
                    <tr>
                        <th>Trade Photo</th>
                        <td>
                            <img src="/uploads/shop/trade/{{$vendor->shop_info->trade}}" alt="Profile" width="100px">
                        </td>
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