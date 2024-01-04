@extends('auth.layouts.app')

@section('content')

<div class="wrapper">
    <p style="text-align: center;">
        <img style="width: 120px;padding: 10px 0px;" src="{{asset('uploads/setting/'.setting('auth_logo'))}}" alt="">
    </p>
    <form action="{{route('password.update')}}" method="post">
        @csrf
        <div class="form form2">
            <h4 style="color:#002f5f;text-align: left;padding:10px 0px;"><b>Sign in </b></h4>
            <div class="form-group">
                <label for="username">Username <sup style="color: red;">*</sup></label>
                <input type="text" name="username" id="username" class="form-control @error('username') is-in-valid @enderror" value="{{ $username ?? old('username') }}" required/>
                @error('username')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password <sup style="color: red;">*</sup></label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-in-valid @enderror" required/>
                @error('password')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password-confirm">Password <sup style="color: red;">*</sup></label>
                <input type="password" name="password_confirmation" id="password-confirm" class="form-control" required/>
                
            </div>
            <input  class="form-control" type="submit" value="Submit">
            <br>
        </div>
    </form>
    <br>
    <div class="text-center py-3 text-bold">
        <a href="{{route('login')}}">Go back to sign in</a>
    </div>
</div>
{{-- <div class="login-box">
    <div class="login-logo">
        <img src="/uploads/setting/{{setting('auth_logo')}}" alt="Logo" width="200px" height="75px">
    </div>
    <p class="login-box-msg pb-2" style="font-weight: normal; font-size:20px; text-align: center;">Reset Password</p>
    <!-- /.login-logo -->
    <div class="card">
        
        @if (session('status'))
            <div class="card-header">
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            </div>
        @endif
        
        <div class="card-body login-card-body">
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $username ?? old('username') }}" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Change password</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            
            <div class="text-center text-bold mt-1">
                <a href="{{route('login')}}">Login</a>
            </div>
        </div>
      <!-- /.login-card-body -->
    </div>
</div> --}}


@endsection
