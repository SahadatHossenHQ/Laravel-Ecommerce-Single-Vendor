@extends('layouts.admin.e-commerce.app')

@section('title', 'Shop Details')

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
                <h1>Shop Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Shop Details</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Shop Details</h3>
        </div>

        <form action="{{routeHelper('shop/update')}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <a class="btn btn-primary" href="{{route('admin.setting.site_info')}}">Update Shop Information <i class="fas fa-caret-right"></i></a><br><br>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="shop_name">Shop Name:</label>
                            <input type="text" name="shop_name" id="shop_name" placeholder="write shop name" class="form-control @error('shop_name') is-invalid @enderror" value="{{ $shop_info->name ?? old('shop_name') }}" required>
                            @error('shop_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="url">Shop Url:</label>
                            <input type="text" name="url" id="url" placeholder="write shop url" class="form-control @error('url') is-invalid @enderror" value="{{ $shop_info->url ?? old('url') }}" required>
                            @error('url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bank_account">Bank Account:</label>
                            <input type="text" name="bank_account" id="bank_account" placeholder="write bank account" class="form-control @error('bank_account') is-invalid @enderror" value="{{ $shop_info->bank_account ?? old('bank_account') }}" required>
                            @error('bank_account')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bank_name">Bank Name:</label>
                            <input type="text" name="bank_name" id="bank_name" placeholder="write bank name" class="form-control @error('bank_name') is-invalid @enderror" value="{{ $shop_info->bank_name ?? old('bank_name') }}" required>
                            @error('bank_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="holder_name">Holder Name:</label>
                            <input type="text" name="holder_name" id="holder_name" placeholder="write holder name" class="form-control @error('holder_name') is-invalid @enderror" value="{{ $shop_info->holder_name ?? old('holder_name') }}" required>
                            @error('holder_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="branch_name">Branch Name:</label>
                            <input type="text" name="branch_name" id="branch_name" placeholder="write bank branch name" class="form-control @error('branch_name') is-invalid @enderror" value="{{ $shop_info->branch_name ?? old('branch_name') }}" required>
                            @error('branch_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="routing">Routing:</label>
                            <input type="text" name="routing" id="routing" placeholder="write routing" class="form-control @error('routing') is-invalid @enderror" value="{{ $shop_info->routing ?? old('routing') }}" required>
                            @error('routing')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Address:</label>
                            <input type="text" name="address" id="address" placeholder="write shop address" class="form-control @error('address') is-invalid @enderror" value="{{ $shop_info->address ?? old('address') }}" required>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" rows="4" placeholder="write shop description" class="form-control @error('description') is-invalid @enderror">{{$shop_info->description ?? old('description')}}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="profile">Profile:</label>
                            <input type="file" name="profile" id="profile" accept="image/*" class="form-control dropify @error('profile') is-invalid @enderror" data-default-file="/uploads/shop/profile/{{$shop_info->profile}}">
                            @error('profile')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cover_photo">Cover Photo:</label>
                            <input type="file" name="cover_photo" id="cover_photo" accept="image/*" class="form-control dropify @error('cover_photo') is-invalid @enderror" data-default-file="/uploads/shop/cover/{{$shop_info->cover_photo}}">
                            @error('cover_photo')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-arrow-circle-up"></i>
                    Update
                </button>
            </div>
            <!-- /.card-footer -->
        </form>
</div>
    
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