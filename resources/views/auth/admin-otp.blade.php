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
  
        <form class="col-md-4 offset-md-4" action="{{route('super.login.confirm')}}" method="post">
            @csrf
            <div class="form form2">
               
                <div class="form-group">
                    <label>Otp<sup style="color: red;">*</sup></label>
                    <input type="text" name="otp" id="otp" class="form-control @error('otp') is-in-valid @enderror" required />
                    @error('otp')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
               
                <input  class="form-control" type="submit" value="Login">
           
            </div>
        </form>
</div>


@endsection