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
                <div class="card" style="padding: 20px;margin-top: 20px;">
                    @php
                                    if(isset($email)){
                                        $email=$email;
                                    }else{
                                        $email='';
                                    }
                                 @endphp
                     @if($email=='')
                    <form action="{{route('account.email.otp')}}" method="post" enctype="multipart/form-data">
                        @else
                         <form action="{{route('account.email.confirm')}}" method="post" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <div class="form form2">
                            <div class="form-row">
                                 
                                 @if($email=='')
                                <div class="form-group col-12">
                                    <label>Email <sup style="color: red;">*</sup></label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" autocomplete="off" required value="{{auth()->user()->email}}"/>
                                    @error('email')
                                        <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                @else
                                       <div class="form-group col-md-8">
                                    <label>Please check your Email for the Verification Code.<sup style="color: red;">*</sup></label>
                                    <input type="otp" name="otp" id="otp" class="form-control @error('otp') is-invalid @enderror" autocomplete="off" required />
                                    @error('otp')
                                        <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                @endif
                                
                                
                               
                            </div>
                            <button type="submit" class="mt-1 btn btn-primary btn-block">
                                <i class="fas fa-arrow-circle-up"></i>
                                Next
                            </button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

