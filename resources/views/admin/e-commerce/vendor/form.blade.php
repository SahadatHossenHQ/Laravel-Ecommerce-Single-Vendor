@extends('layouts.admin.e-commerce.app')

@section('title')
    @isset($vendor)
        Edit Vendor 
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
                        Edit Vendor 
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
                            Edit Vendor 
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
                            Edit Vendor
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
        <form action="{{ isset($vendor) ? routeHelper('vendor/'. $vendor->id) : routeHelper('vendor') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @isset($vendor)
                @method('PUT')
            @endisset
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" placeholder="Write name" class="form-control @error('name') is-invalid @enderror" value="{{ $vendor->name ?? old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="username">Username (unique):</label>
                        <input type="text" name="username" id="username" placeholder="Write username" class="form-control @error('username') is-invalid @enderror" value="{{ $vendor->username ?? old('username') }}" required>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" placeholder="example@gmail.com" class="form-control @error('email') is-invalid @enderror" value="{{ $vendor->email ?? old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Phone:</label>
                        <input type="text" name="phone" id="phone" placeholder="write phone number" class="form-control @error('phone') is-invalid @enderror" value="{{ $vendor->phone ?? old('phone') }}" required>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="shop_name">Shop Name:</label>
                        <input type="text" name="shop_name" id="shop_name" placeholder="write shop name" class="form-control @error('shop_name') is-invalid @enderror" value="{{ $vendor->shop_info->name ?? old('shop_name') }}" required>
                        @error('shop_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="url">Fb page Url:</label>
                        <input type="text" name="url" id="url" placeholder="write shop url" class="form-control @error('url') is-invalid @enderror" value="{{ $vendor->shop_info->url ?? old('url') }}">
                        @error('url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bank_account">Bank Account:</label>
                        <input type="text" name="bank_account" id="bank_account" placeholder="write bank account" class="form-control @error('bank_account') is-invalid @enderror" value="{{ $vendor->shop_info->bank_account ?? old('bank_account') }}" required>
                        @error('bank_account')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bank_name">Bank Name:</label>
                        <input type="text" name="bank_name" id="bank_name" placeholder="write bank name" class="form-control @error('bank_name') is-invalid @enderror" value="{{ $vendor->shop_info->bank_name ?? old('bank_name') }}" required>
                        @error('bank_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="holder_name">Holder Name:</label>
                        <input type="text" name="holder_name" id="holder_name" placeholder="write holder name" class="form-control @error('holder_name') is-invalid @enderror" value="{{ $vendor->shop_info->holder_name ?? old('holder_name') }}" required>
                        @error('holder_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="branch_name">Branch Name:</label>
                        <input type="text" name="branch_name" id="branch_name" placeholder="write bank branch name" class="form-control @error('branch_name') is-invalid @enderror" value="{{ $vendor->shop_info->branch_name ?? old('branch_name') }}" required>
                        @error('branch_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="routing">Routing:</label>
                        <input type="text" name="routing" id="routing" placeholder="write routing" class="form-control @error('routing') is-invalid @enderror" value="{{ $vendor->shop_info->routing ?? old('routing') }}" required>
                        @error('routing')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address">Address:</label>
                        <input type="text" name="address" id="address" placeholder="write shop address" class="form-control @error('address') is-invalid @enderror" value="{{ $vendor->shop_info->address ?? old('address') }}" required>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="commission">Commission(Optional):</label>
                        <input type="number" name="commission" id="commission" placeholder="write commission" class="form-control @error('commission') is-invalid @enderror" value="{{ $vendor->shop_info->commission ?? old('commission') }}" >
                        @error('commission')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" rows="4" placeholder="write shop description" class="form-control @error('description') is-invalid @enderror">{{$vendor->shop_info->description ?? old('description')}}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @isset($vendor)
                    
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
                    <div class="form-group col-md-6">
                        <label for="profile">Shop Profile:</label>
                        <input type="file" name="profile" id="profile" accept="image/*" class="form-control dropify @error('profile') is-invalid @enderror" data-default-file="@isset($vendor) /uploads/shop/profile/{{$vendor->shop_info->profile}}@enderror">
                        @error('profile')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cover_photo">Shop Cover Photo:</label>
                        <input type="file" name="cover_photo" id="cover_photo" accept="image/*" class="form-control dropify @error('cover_photo') is-invalid @enderror" data-default-file="@isset($vendor) /uploads/shop/cover/{{$vendor->shop_info->cover_photo}}@enderror">
                        @error('cover_photo')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                     <div class="form-group col-md-6">
                        <label for="nid">Nid Card:</label>
                        <input type="file" name="nid" id="nid" accept="image/*" class="form-control dropify @error('nid') is-invalid @enderror" data-default-file="@isset($vendor) /uploads/shop/nid/{{$vendor->shop_info->nid}}@enderror">
                        @error('nid')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    
                     <div class="form-group col-md-6">
                        <label for="trade">Trade license:</label>
                        <input type="file" name="trade" id="trade" accept="image/*" class="form-control dropify @error('trade') is-invalid @enderror" data-default-file="@isset($vendor) /uploads/shop/trade/{{$vendor->shop_info->trade}}@enderror">
                        @error('trade')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
            </div>
            <div class="card-footer">
                <div class="form-group">
                    <button class="mt-1 btn btn-primary">
                        @isset($vendor)
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

@push('js')
    <script src="{{ asset('/assets/plugins/dropify/dropify.min.js') }}"></script>
    <script>
        $(function () {
            $('.dropify').dropify();
        });
    </script>
@endpush