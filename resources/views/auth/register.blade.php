@extends('layouts.frontend.app')

@section('title', 'Shopping Now')

@section('content')
<style>
    form .form2{
        box-shadow: 0px 0px 5px gainsboro;
padding: 20px;
border-radius: 5px;
    }
      ul.cc li{
            display: inline-block;
text-align: center;
background: #108b3a;
padding: 7px;
        }
        ul.cc li a{
            color: white;
            display: block;
        }
        ul.cc{
            padding: 0;
            margin: 0;
        }
</style>
@push('css')
    <style>
        span.select2.select2-container{width: 100% !important}
        .login-box, .register-box {
            width: 450px !important;
        }
        @media (max-width: 576px) {
            .login-box, .register-box {
                margin-top: .5rem;
                width: 90% !important;
            }
        }
    </style>
@endpush



<div class="wrapper">
  <!--   <p style="text-align: center;">
        <a href="{{route('home')}}">
            <img style="width: 120px;padding: 10px 0px;" src="{{asset('uploads/setting/'.setting('auth_logo'))}}" alt="">
        </a>
    </p> -->
    <br>
    <br>
    <form class="col-md-4 offset-md-4" action="{{route('register.otp')}}" method="get">
      
        <ul class="cc row">
        <li class="col-6" ><a href="{{route('login')}}">Login</a></li>
        <li class="col-6"  style="background:#07421c;color: white;"><a>Register</a></li>
    </ul>
    <?php
        $id='admin';
        if(isset($_GET['code'])){
            $id=$_GET['code'];
        }
    ?>
        <div class="form form2 ">
             <input type="hidden" name="refer" id="refer" class="form-control @error('refer') is-invalid @enderror"  value="{{$id}}"/>
             <div class="form-group col-md-12">
                <label for="name">Name <sup style="color: red;">*</sup></label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required />
                @error('name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
           <!--  <div class="form-group col-md-6">
                <label for="username">Username (unique) <sup style="color: red;">*</sup></label>
                <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" required />
                @error('username')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div> -->
            <div class="form-group col-md-12">
                <label for="email">Email <sup style="color: red;">*</sup></label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required />
                @error('email')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="password">Phone <sup style="color: red;">*</sup></label>
                <input type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" required />
                @error('phone')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
             <input type="hidden" value="12345" name="otp" id="otp" class="form-control @error('otp') is-invalid @enderror"  required />
            <!-- <div class="form-group col-md-4">-->

            <!--    <div type="submit" id="otp-send" style="margin-top: 33px" class="btn btn-primary">Send Otp</div>-->
            <!--</div>-->
            <!--<div class="form-group col-md-12">-->
            <!--    <label for="otp">Otp (Check Your Phone) <sup style="color: red;">*</sup></label>-->
            <!--    <input type="number" name="otp" id="otp" class="form-control @error('otp') is-invalid @enderror"  required />-->
            <!--    <p id="sm"></p>-->
            <!--    @error('otp')-->
            <!--        <span class="invalid-feedback" role="alert">{{ $message }}</span>-->
            <!--    @enderror-->
            <!--</div>-->
            <div class="form-group col-md-12">
                <label for="password">Password <sup style="color: red;">*</sup></label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required />
                @error('password')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="confirm-password">Confirm Password <sup style="color: red;">*</sup></label>
                <input type="password" name="password_confirmation" id="confirm-password" class="form-control" required />
                
            </div>
            <input  class="form-control" type="submit" value="Submit" style="background:#108b3a">
               
        </div>
        
    </form>
    <br>
    <span style="display: block;text-align: center;">Already have an Account? <a href="{{route('login')}}">Sign In</a></span>
</div>
<input type="hidden" value="{{ csrf_token() }}" name="cr" id="cr">
@endsection

@push('js')
<script>
   $(document).on('click', '#otp-send', function() {
                
                var number = document.getElementById('phone').value;
                var cr = document.getElementById('cr').value;
                $.ajax({
                    type: 'POST',
                    url: 'register/send-otp',
                    data: {
                        'number': number,
                        '_token': cr,
                    },
                    dataType: "JSON",
                    success: function (response) {
                        $('#sm').html(response);
                   }
                });
            });

</script>

@endpush