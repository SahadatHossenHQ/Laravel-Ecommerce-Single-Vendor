@extends('layouts.frontend.app')


@section('title', 'Account')

@section('content')

<div class="customar-dashboard">
    <div class="container">
        <div class="customar-access row">
            <div class="customar-menu col-md-3">
                  @include('layouts.frontend.partials.userside')
            </div>
            <div class="col-md-9">
                <div class="card" style="background:transparent;" style="padding: 20px;margin-top: 20px;">
                    <form action="{{route('account.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form form2">
                            <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="avatar">Profile Image</label>
                                        <input type="file" name="avatar" id="avatar"class="form-control  @error('avatar') is-invalid @enderror" data-default-file="{{'/uploads/admin/'.auth()->user()->avatar}}">
                                        @error('avatar')
                                            <div class="invalid-feedback text-danger d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                <div class="form-group col-md-6">
                                    <label>Name <sup style="color: red;">*</sup></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" autocomplete="off" required value="{{auth()->user()->name}}"/>
                                    @error('name')
                                        <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Username <sup style="color: red;">*</sup></label>
                                    <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" autocomplete="off" required value="{{auth()->user()->username}}" readonly />
                                    @error('username')
                                        <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email <sup style="color: red;">*</sup></label>
                                    <input readonly type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" autocomplete="off" required value="{{auth()->user()->email}}"/>
                                    @error('email')
                                        <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Phone <sup style="color: red;">*</sup></label>
                                    <input  type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" autocomplete="off" placeholder="Enter Your Phone Number"  value="@if(auth()->user()->phone!='null'){{auth()->user()->phone}}@endif"/>
                                    @error('phone')
                                        <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                
                                @isset(auth()->user()->customer_info)
                                <div class="form-group col-md-6">
                                    <label>Country <sup style="color: red;">*</sup></label>
                                    <input type="text" name="country" id="country" class="form-control @error('country') is-invalid @enderror" autocomplete="off" required value="{{ setting('COUNTRY_SERVE') ?? 'Bangladesh' }}" readonly/>
                                    @error('country')
                                        <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="city">Division <sup style="color: red;">*</sup></label>
                                    <select name="city" id="divisions"  class="form-control @error('city') is-invalid @enderror"  onchange="divisionsList();">
                                        <option disabled selected>Select Division</option>
                                        <option @if(auth()->user()->customer_info->city=='Barishal')selected @endif value="Barishal">Barishal</option>
                                        <option @if(auth()->user()->customer_info->city=='Chattogram')selected @endif value="Chattogram">Chattogram</option>
                                        <option @if(auth()->user()->customer_info->city=='Dhaka')selected @endif value="Dhaka">Dhaka</option>
                                        <option @if(auth()->user()->customer_info->city=='Khulna')selected @endif value="Khulna">Khulna</option>
                                        <option @if(auth()->user()->customer_info->city=='Mymensingh')selected @endif value="Mymensingh">Mymensingh</option>
                                        <option @if(auth()->user()->customer_info->city=='Rajshahi')selected @endif value="Rajshahi">Rajshahi</option>
                                        <option @if(auth()->user()->customer_info->city=='Rangpur')selected @endif value="Rangpur">Rangpur</option>
                                        <option @if(auth()->user()->customer_info->city=='Sylhet')selected @endif value="Sylhet">Sylhet</option>
                                    </select><!--/ Division Section-->
                                    
                                    @error('city')
                                        <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="district">District <sup style="color: red;">*</sup></label>
                                    <select name="distric"  class="form-control @error('district') is-invalid @enderror"  id="distr" onchange="thanaList();">
                                        <option @if(auth()->user()->customer_info->distric==Null) selected @endif disabled>Select District</option>
                                        <option @if(auth()->user()->customer_info->distric!=Null) selected value="{{auth()->user()->customer_info->distric}}" @endif> {{auth()->user()->customer_info->distric}}</option>
                                    </select><!--/ Districts Section-->
                                    @error('district')
                                        <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="district">Thana <sup style="color: red;">*</sup></label>
                                    <select name="thana"  class="form-control @error('district') is-invalid @enderror"  id="polic_sta">
                                        <option disabled @if(auth()->user()->customer_info->thana==Null) selected @endif>Select Thana</option>
                                        <option @if(auth()->user()->customer_info->thana!=Null) selected value="{{auth()->user()->customer_info->thana}}" @endif> {{auth()->user()->customer_info->thana}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Street <sup style="color: red;">*</sup></label>
                                    <input type="text" placeholder="For Example: House# 123, Street# 123, ABC Road" name="street" id="street" class="form-control @error('street') is-invalid @enderror" autocomplete="off" required value="{{auth()->user()->customer_info->street}}"/>
                                    @error('street')
                                        <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Post Code <sup style="color: red;">*</sup></label>
                                    <input type="text" name="post_code" id="post_code" class="form-control @error('post_code') is-invalid @enderror" autocomplete="off" required value="{{auth()->user()->customer_info->post_code}}"/>
                                    @error('post_code')
                                        <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                @endisset
                                
                            </div>
                            <button type="submit" class="mt-1 btn btn-primary btn-block">
                                <i class="fas fa-arrow-circle-up"></i>
                                Update
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
    
<script src="{{asset('/')}}assets/frontend/js/city.js"></script>

    <script src="{{ asset('/assets/plugins/dropify/dropify.min.js') }}"></script>
    <script>
        
        $(document).ready(function() {
            $('.dropify').dropify();
        });

    </script>
@endpush