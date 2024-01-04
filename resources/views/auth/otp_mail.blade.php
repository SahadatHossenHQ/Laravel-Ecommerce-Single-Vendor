@extends('layouts.frontend.app')

@section('title', 'Shopping Now')

@section('content')
<style>
    form .form2{
        box-shadow: 0px 0px 5px gainsboro;
padding: 20px;
border-radius: 5px;
margin-top: 50px;
background: white
    }
</style>
 
<div class="wrapper">
   <!--  <p style="text-align: center;">
        <a href="{{route('home')}}">
            <img style="width: 120px;padding: 10px 0px;" src="{{asset('uploads/setting/'.setting('auth_logo'))}}" alt="">
        </a>
    </p> -->
          <form class="col-md-4 offset-md-4" action="{{route('register.new')}}" method="post">
        @csrf
        
            <input type="hidden" value="{{$request->name}}" name="name">
            <input type="hidden" value="{{$request->email}}" name="email">
            <input type="hidden" value="{{$request->phone}}" name="phone">
            <input type="hidden" value="{{$request->password}}" name="password">
                 <input type="hidden" value="{{$request->password}}" name="password_confirmation">
            <div class="form form2">
                <h4 style="color:#002f5f;text-align: left;padding:10px 0px;"><b>Email Verify </b></h4>
                <div class="form-group">
                    <label>You must confirm your account. Please check your Email for the Confirmation Code.<sup style="color: red;">*</sup></label>
                    <input type="text" name="otp" id="otp" class="form-control @error('otp') is-in-valid @enderror" required />
                    @error('otp')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                
                <input  class="form-control" type="submit" value="Sign Up" style="background:#108b3a">
                
            </div>
        </form>
        <br> 
</div>


@endsection