@extends('layouts.vendor.app')

@section('title', 'Dashboard')

@push('css')
    <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                </ol>
            </div>
             @if(auth()->user()->shop_info->name == 'null_wait')
            <div class="col-md-12">
                <a style="background: #c00b0b;width: 100%;display: block;color: white;padding: 10px;border-radius: 10px;text-align: center;font-size: 20px;font-weight: 800;" href="profile/update">Please Complete Your profile.</a>
            </div>
            @endif
            @if(auth()->user()->is_approved == 0)
<p style="font-size: 24px;padding: 20px;text-align: center;margin: auto;color: red;font-family: auto;">Your Account is Under Review.You Cant Upload Product At This Time</p>
@endif
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$products}}</h3>
                    <p>Total Products</p>
                </div>
                <div class="icon">
                    <i class="fas fa-procedures"></i>
                </div>
                <a href="{{routeHelper('product')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$quantity}}</h3>
                    <p>Product Qty</p>
                </div>
                <div class="icon">
                    <i class="fas fa-sort-numeric-down-alt"></i>
                </div>
                <a href="{{routeHelper('product')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$orders}}</h3>
                    <p>Total Orders</p>
                </div>
                <div class="icon">
                    <i class="fab fa-jedi-order"></i>
                </div>
                <a href="{{routeHelper('order')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$pending_orders}}</h3>
                    <p>Pending Orders</p>
                </div>
                <div class="icon">
                    <i class="fas fa-hourglass-start"></i>
                </div>
                <a href="{{routeHelper('order/pending')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{$processing_orders}}</h3>
                    <p>Processing Orders</p>
                </div>
                <div class="icon">
                    <i class="fas fa-running"></i>
                </div>
                <a href="{{routeHelper('order/processing')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$cancel_orders}}</h3>
                    <p>Cancel Orders</p>
                </div>
                <div class="icon">
                    <i class="fas fa-window-close"></i>
                </div>
                <a href="{{routeHelper('order/cancel')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{$sihpping_order}}</h3>
                    <p>Shipping Orders</p>
                </div>
                <div class="icon">
                    <i class="fas fa-plane"></i>
                </div>
                <a href="{{routeHelper('order/')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$refund_orders}}</h3>
                    <p>Reund Orders</p>
                </div>
                <div class="icon">
                    <i class="fas fa-running"></i>
                </div>
                <a href="{{routeHelper('order/')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$delivered_orders}}</h3>
                    <p>Delivered Orders</p>
                </div>
                <div class="icon">
                    <i class="fas fa-thumbs-up"></i>
                </div>
                <a href="{{routeHelper('order/delivered')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$amount}}</h3>
                    <p>Total Amount</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill-alt"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$pending_amount}}</h3>
                    <p>Pending Amount</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill-alt"></i>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

@endsection

@push('js')
    
@endpush