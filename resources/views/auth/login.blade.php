@extends('layouts.frontend.app')

@section('title', 'Shopping Now')

@section('content')
<style>
    form .form2 {
        box-shadow: 0px 0px 5px gainsboro;
        padding: 20px;
        border-radius: 5px;
        margin-top: 50px;
        background: white
    }
</style>
<?php
Session::forget('link');
 if(route('home').'/register'==url()->previous()){
      Session::put(['link' => route('home')]);
 }elseif(route('home').'/join'==url()->previous()){
      Session::put(['link' => route('home')]);
 }elseif(route('home').'/login'==url()->previous()){
      Session::put(['link' => route('home')]);
 }elseif(route('home').'/seller'==url()->previous()){
      Session::put(['link' => route('home')]);
 }
 elseif(route('home').'/password/reset'==url()->previous()){
      Session::put(['link' => route('home')]);
 }
 else{
      Session::put(['link' => url()->previous()]);
 }
 
?>
<div class="wrapper">
    <!--  <p style="text-align: center;">
        <a href="{{route('home')}}">
            <img style="width: 120px;padding: 10px 0px;" src="{{asset('uploads/setting/'.setting('auth_logo'))}}" alt="">
        </a>
    </p> -->
    <form class="col-md-4 offset-md-4" action="{{route('login.get')}}" method="get">

        <div class="form form2">
            <h4 style="color:#002f5f;text-align: left;padding:10px 0px;"><b>Sign in </b></h4>
            <div class="form-group">
                <label>Username / Email / Phone<sup style="color: red;">*</sup></label>
                <input type="text" name="username" id="username"
                    class="form-control @error('username') is-in-valid @enderror" required />
                @error('username')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Password <sup style="color: red;">*</sup>&nbsp;&nbsp;<i id="show_pass" class="fal fa-eye"></i></label>
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-in-valid @enderror" required />
                @error('password')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <input class="form-control" type="submit" value="Login" style="background:var(--primary_color)">


            @if (setting('recovrAC') == "email")
                <span style="display: block;text-align: center;"><a href="{{route('password.request')}}">Forgot Password?</a></span>
            @elseif (setting('recovrAC') == "sms")
                <span style="display: block;text-align: center;"><a href="{{route('password.recover.mobile')}}">Forgot Password?</a></span>
            @else
                <span style="display: block;text-align: center;"><a href="{{route('password.request')}}">Forgot Password?</a></span>
            @endif



        </div>
    </form>
    <br>
    <span style="display: block;text-align: center;">Create a new Account <a href="{{route('register')}}"
            style="color:blue">Sign Up</a></span>
</div>

@push('js')
<script>
    $(document).ready(function () {
        var showPassIcon = $('#show_pass');
        var passwordInput = $('#password');
        var confirmPasswordInput = $('#confirm-password');

        showPassIcon.on('click', function () {
            if (passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
                confirmPasswordInput.attr('type', 'text');
                showPassIcon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                passwordInput.attr('type', 'password');
                confirmPasswordInput.attr('type', 'password');
                showPassIcon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
    });
</script>
@endpush
@push('css')
    <style>
        #show_pass{
            cursor: pointer;
        }
    </style>
@endpush
@endsection