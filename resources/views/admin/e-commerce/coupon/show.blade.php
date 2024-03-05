@extends('layouts.admin.e-commerce.app')

@section('title', 'Coupon Information')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Coupon Information</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Show Coupon</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="card-title">Coupon Information</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{routeHelper('coupon/'.$coupon->id.'/edit')}}" class="btn btn-info">
                        <i class="fas fa-edit"></i>
                        Edit
                    </a>
                    <a href="{{routeHelper('coupon')}}" class="btn btn-danger">
                        
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
                        <th width="20%">Coupon Code</th>
                        <td width="80%">{{$coupon->code}}</td>
                    </tr>
                    <tr>
                        <th width="15%">Discount Type</th>
                        <td width="85%">{{$coupon->discount_type}}</td>
                    </tr>
                    <tr>
                        <th width="15%">Discount Amount/Percent</th>
                        <td width="85%">
                            @if ($coupon->discount_type == 'percent')
                                {{$coupon->discount.' %'}}
                            @else
                                {{$coupon->discount}} {{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th width="15%">Use Limit Per User</th>
                        <td width="85%">{{$coupon->limit_per_user}}</td>
                    </tr>
                    <tr>
                        <th width="15%">Total Use Limit</th>
                        <td width="85%">{{$coupon->total_use_limit}}</td>
                    </tr>
                    <tr>
                        <th width="15%">Expire Date</th>
                        <td width="85%">{{date('d M Y', strtotime($coupon->expire_date))}}</td>
                    </tr>
                    <tr>
                        <th width="15%">Description</th>
                        <td width="85%">{{$coupon->description}}</td>
                    </tr>
                    <tr>
                        <th width="15%">Status</th>
                        <td width="85%">
                            @if ($coupon->status)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Disable</span>
                            @endif    
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

@endsection