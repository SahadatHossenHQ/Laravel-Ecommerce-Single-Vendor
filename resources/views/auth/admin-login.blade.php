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
<?php
Session::forget('link');
 Session::put(['link' => url()->previous()]);
?>
<div class="wrapper">
   <!--  <p style="text-align: center;">
        <a href="{{route('home')}}">
            <img style="width: 120px;padding: 10px 0px;" src="{{asset('uploads/setting/'.setting('auth_logo'))}}" alt="">
        </a>
    </p> -->
        <form class="col-md-4 offset-md-4" action="{{route('super.login')}}" method="post">
           @csrf
            <div class="form form2">
                <h4 style="color:#002f5f;text-align: left;padding:10px 0px;"><b>Sign in </b></h4>
                <div class="form-group">
                    <label>Username or Phone<sup style="color: red;">*</sup></label>
                    <input type="text" name="username" id="username" class="form-control @error('username') is-in-valid @enderror" required />
                    @error('username')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password <sup style="color: red;">*</sup></label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-in-valid @enderror" required />
                    @error('password')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <input  class="form-control" type="submit" value="Login">
                 <p style="text-align: center;margin: 10px 0px !important;margin-bottom: 0 !important;">Or</p>
               
                <span style="display: block;text-align: center;"><a href="{{route('password.request')}}">Forgot Password?</a></span>
            </div>
        </form>
        <br>
      
</div>


@endsection