@extends('layouts.frontend.app')

@section('title', 'Shopping Now')

@section('content')
<style>
    form .form2{
        box-shadow: 0px 0px 5px gainsboro;
padding: 20px;
border-radius: 5px;
margin-top: 50px;
    }
</style>
<div class="wrapper">
   <!--  <p style="text-align: center;">
        <img style="width: 120px;padding: 10px 0px;" src="{{asset('uploads/setting/'.setting('auth_logo'))}}" alt="">
    </p> -->
    <form class="col-md-4 offset-md-4" action="{{route('password.send')}}" method="post">
        @csrf
        <div class="form form2">
            <h4 style="color:#002f5f;text-align: left;padding:10px 0px;"><b>Forgot Password </b></h4>
            <input type="hidden" value="Email" name="method">
           
            <div class="form-group">
                <label> Email <sup style="color: red;">*</sup></label>
                <input type="email" name="username" id="username" class="form-control @error('username') is-in-valid @enderror" required />
                @error('username')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <input  class="form-control" type="submit" value="Submit">
            <br>
        </div>
    </form>
    <br>
    <div class="text-center py-3 text-bold">
        <a href="{{route('login')}}">Go Back to Sign In</a>
    </div>
</div>

@endsection
