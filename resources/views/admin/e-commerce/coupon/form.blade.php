@extends('layouts.admin.e-commerce.app')

@section('title')
    @isset($coupon)
        Edit Coupon 
    @else 
        Add Coupon
    @endisset
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    @isset($coupon)
                        Edit Coupon 
                    @else 
                        Add Coupon
                    @endisset
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        @isset($coupon)
                            Edit Coupon 
                        @else 
                            Add Coupon
                        @endisset
                    </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="card-title">
                                @isset($coupon)
                                    Edit Coupon
                                @else 
                                    Add New Coupon
                                @endisset
                            </h3>
                        </div>
                        <div class="col-sm-6 text-right">
                            @isset($coupon)
                            <a href="{{routeHelper('coupon/'.$coupon->id)}}" class="btn btn-info">
                                <i class="fas fa-eye"></i>
                                Show
                            </a>
                            @endisset
                            <a href="{{routeHelper('coupon')}}" class="btn btn-danger">
                                <i class="fas fa-long-arrow-alt-left"></i>
                                Back to List
                            </a>
                        </div>
                    </div>
                </div>
                <form action="{{ isset($coupon) ? routeHelper('coupon/'.$coupon->id) : routeHelper('coupon') }}" method="POST">
                    @csrf
                    @isset($coupon)
                        @method('PUT')
                    @endisset
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Coupon Code:</label>
                                <input type="text" name="code" id="code" placeholder="Write coupon code" class="form-control @error('code') is-invalid @enderror" value="{{ $coupon->code ?? old('code') }}" required autocomplete="off">
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Discount Type:</label>
                                <select name="discount_type" id="discount_type" class="form-control @error('discount_type') is-invalid @enderror">
                                    <option value="percent">Percent</option>
                                    <option value="amount">Fixed Amount</option>
                                </select>
                                @error('discount_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="discount">Discount Amount/Percent:</label>
                                <input type="text" name="discount" id="discount" placeholder="Write discount amount/percent" class="form-control @error('discount') is-invalid @enderror" value="{{ $coupon->discount ?? old('discount') }}" required>
                                @error('discount')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="limit_per_user">Use Limit Per User:</label>
                                <input type="number" name="limit_per_user" id="limit_per_user" placeholder="Enter use limit per user" class="form-control @error('limit_per_user') is-invalid @enderror" value="{{ $coupon->limit_per_user ?? old('limit_per_user') }}" required>
                                @error('limit_per_user')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="total_use_limit">Total Use Limit:</label>
                                <input type="number" name="total_use_limit" id="total_use_limit" placeholder="Enter total use limit" class="form-control @error('total_use_limit') is-invalid @enderror" value="{{ $coupon->total_use_limit ?? old('total_use_limit') }}" required>
                                @error('total_use_limit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="expire_date">Expire Date:</label>
                                <input type="date" name="expire_date" id="expire_date" class="form-control @error('expire_date') is-invalid @enderror" value="{{ $coupon->expire_date ?? old('expire_date') }}" required>
                                @error('expire_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" cols="5" placeholder="Write coupon description" class="form-control @error('description') is-invalid @enderror">{{ $coupon->description ?? old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="status" id="status" @isset ($size) {{ $size->status ? 'checked':'' }} @else checked @endisset>
                                <label class="custom-control-label" for="status">Status</label>
                            </div>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button class="mt-1 btn btn-primary">
                                @isset($tag)
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
        </div>
    </div>
    

</section>
<!-- /.content -->

@endsection
