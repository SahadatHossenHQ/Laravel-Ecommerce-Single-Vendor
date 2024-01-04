@extends('layouts.admin.e-commerce.app')

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
             <?php 
                $low_products=\App\Models\Product::where('quantity','<','6')->where('user_id',auth()->id())->count();
                if($low_products>0){
            ?>
            <style>
                .low-warning{
            padding: 8px 30px;
            border-radius: 5px;
            color: white;
            margin-top: 20px;
                }
            </style>
                <a class="btn-danger col-md-12 low-warning" href="{{route('admin.low.product')}}">
                    You have {{$low_products}} low quantity product.
                </a>
        <?php }?>
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                </ol>
            </div>
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
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{$vendor_amount}}</h3>
                    <p>Vendor Amount</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-check-alt"></i>
                </div>
                <a href="{{routeHelper('vendor')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{$vendor_pamount}}</h3>
                    <p>Vendor Pending Amount</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-check-alt"></i>
                </div>
                <a href="{{routeHelper('vendor')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$admin_amount}}</h3>
                    <p>Self Amount</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill-alt"></i>
                </div>
                <a href="{{routeHelper('vendor')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$pending_amount}}</h3>
                    <p>Self Pending</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill-alt"></i>
                </div>
                <a href="{{routeHelper('vendor')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{$vendors}}</h3>
                    <p>Total Vendor</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users-cog"></i>
                </div>
                <a href="{{routeHelper('vendor')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$customers}}</h3>
                    <p>Total Customer</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{routeHelper('customer')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$commission}}</h3>
                    <p>Total Commission</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill"></i>
                </div>
                <a href="{{route('admin.comission')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    
  
</section>
<!-- /.content -->

@endsection

@push('js')
    
@endpush