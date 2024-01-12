@extends('layouts.frontend.app')

@push('meta')
    
@endpush

@push('css')
    
@endpush
@section('title', 'Vendor Setup')
@section('content')

<div class="customar-dashboard">
    <div class="container">
        <div class="customar-access row">
            <div class="customar-menu col-md-3">
                <h5 style="margin-top: 20px;"><b><i>Hello {{auth()->user()->name}}</i></b></h5>
                <ul class="mt-2">
                    <li><a href="">Dashboard</a></li>
                    @auth
                        @if(auth()->user()->role_id == 3)
                            <li><a class="vendor-button" href="{{route('setup.vendor.form')}}">Setup Vendor</a></li>
                        @endif
                    @endauth
                    
                    @auth
                        @if(auth()->user()->role_id == 2)
                            <li><a class="vendor-button" href="{{routeHelper('dashboard')}}">Go TO Vendor Dashboard</a></li>
                        @endif
                    @endauth
                    
                </ul>
            </div>
            <div class="col-md-9">
                <div class="card" style="padding: 20px;margin-top: 20px;">
                    <form action="{{route('setup.vendor')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form form2">
                            <div class="form-row">
                                <div class="col-md-12" style="text-align:center;"><h3><b>Basic Info</b></h3></div>
                                <div class="form-group col-md-6">
                                    <label for="shop_name">Shop Name:</label>
                                    <input type="text" name="shop_name" id="shop_name" placeholder="write shop name" class="form-control @error('shop_name') is-invalid @enderror" value="{{old('shop_name')}}" required>
                                    @error('shop_name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="url">Facebook Page Link:</label>
                                    <input type="text" name="url" id="url" placeholder="write shop url" class="form-control @error('url') is-invalid @enderror" value="{{old('url')}}" >
                                    @error('url')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="address">Shop Address:</label>
                                    <input type="text" name="address" id="address" placeholder="write shop address" class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}" required>
                                    @error('address')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="address">Perosal Gmail:</label>
                                    <input type="text" name="pgmail" id="pgmail" placeholder="write your gmail" class="form-control @error('pgmail') is-invalid @enderror" value="{{old('pgmail')}}" required>
                                    @error('pgmail')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="mobile">Mobile Number:</label>
                                    <input type="text" name="mobile" id="mobile" placeholder="write mobile" class="form-control @error('mobile') is-invalid @enderror" value="{{old('mobile')}}" >
                                    @error('mobile')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12"><hr></div>
                                <div class="form-group col-md-6">
                                    <label for="selfi">own selfi:</label>
                                    <input type="file" name="selfi" id="selfi" accept="image/*" class="form-control dropify @error('selfi') is-invalid @enderror" data-default-file="@isset($vendor) /uploads/shop/nid/{{$vendor->shop_info->selfi}}@enderror">
                                    @error('selfi')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nid">Nid Card Front:</label>
                                    <input type="file" name="nid" id="nid" accept="image/*" class="form-control dropify @error('nid') is-invalid @enderror" data-default-file="@isset($vendor) /uploads/shop/nid/{{$vendor->shop_info->nid}}@enderror">
                                    @error('nid')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nid">Nid Card Back:</label>
                                    <input type="file" name="nidb" id="nidb" accept="image/*" class="form-control dropify @error('nidb') is-invalid @enderror" data-default-file="@isset($vendor) /uploads/shop/nidb/{{$vendor->shop_info->nidb}}@enderror">
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
                                 <div class="form-group col-md-6">
                                    <label for="profile">Shop Profile:</label>
                                    <input type="file" name="profile" id="profile" accept="image/*" class="form-control-file @error('profile') is-invalid @enderror" required>
                                    @error('profile')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cover_photo">Shop Cover Photo:</label>
                                    <input type="file" name="cover_photo" id="cover_photo" accept="image/*" class="form-control-file @error('cover_photo') is-invalid @enderror" required>
                                    @error('cover_photo')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12" style="text-align:center;"><h3><b>Mobile Banking</b></h3></div>
                                <div class="col-md-12"><hr></div> 
                                 <div class="form-group col-md-6">
                                    <label for="mobile">Bkash Number:</label>
                                    <input type="text" name="Bkash" id="Bkash" placeholder="Bkash Number" class="form-control @error('Bkash') is-invalid @enderror" value="{{old('Bkash')}}" >
                                    @error('Bkash')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="mobile">Nagad Number:</label>
                                    <input type="text" name="Nagad" id="Nagad" placeholder="Nagad Number" class="form-control @error('mobile') is-invalid @enderror" value="{{old('Nagad')}}" >
                                    @error('Nagad')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="mobile">Rocket Number:</label>
                                    <input type="text" name="Rocket" id="Rocket" placeholder="Rocket Number" class="form-control @error('Rocket') is-invalid @enderror" value="{{old('Rocket')}}" >
                                    @error('Rocket')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12" style="text-align:center;"><h3><b>Bank Info</b></h3></div>
                                <div class="col-md-12"><hr></div>
                                <div class="form-group col-md-6">
                                    <label for="bank_account">Bank Account:</label>
                                    <input type="text" name="bank_account" id="bank_account" placeholder="write bank account" class="form-control @error('bank_account') is-invalid @enderror" value="{{old('bank_account')}}" >
                                    @error('bank_account')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="bank_name">Bank Name:</label>
                                    <input type="text" name="bank_name" id="bank_name" placeholder="write bank name" class="form-control @error('bank_name') is-invalid @enderror" value="{{old('bank_name')}}" >
                                    @error('bank_name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="holder_name">Holder Name:</label>
                                    <input type="text" name="holder_name" id="holder_name" placeholder="write holder name" class="form-control @error('holder_name') is-invalid @enderror" value="{{old('holder_name')}}" >
                                    @error('holder_name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="branch_name">Branch Name:</label>
                                    <input type="text" name="branch_name" id="branch_name" placeholder="write bank branch name" class="form-control @error('branch_name') is-invalid @enderror" value="{{old('branch_name')}}" >
                                    @error('branch_name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="routing">Routing:</label>
                                    <input type="text" name="routing" id="routing" placeholder="write routing" class="form-control @error('routing') is-invalid @enderror" value="{{old('routing')}}" >
                                    @error('routing')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                               
                                <div class="form-group col-md-12">
                                    <label for="description">Shop Description:</label>
                                    <textarea name="description" id="description" rows="4" placeholder="write shop description" class="form-control @error('description') is-invalid @enderror" required>{{old('description')}}</textarea>
                                    @error('description')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                               
                                
                            </div>
                            <button type="submit" class="mt-1 btn btn-primary btn-block">
                                <i class="fas fa-plus-circle"></i>
                                Submit
                            </button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
    
@endpush